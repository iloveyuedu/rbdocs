# Internals

## PDO types

**RedBeanPHP** is a weakly typed <abbr title="Object Relational Mapping">ORM</abbr>. It accepts all kinds of types in beans;
integers, strings, booleans and NULL values. After a bean has been retrieved from the
**database** each property of the bean contains a value of one of the following types:
string, NULL, array or [RedBean_OODBBean (object)](http://www.redbeanphp.com/api/class_red_bean___o_o_d_b.html "OODB API"). RedBeanPHP will never return long values,
booleans or integers. In fact, most values are returned as a string, with the exception of
NULL which remains NULL. Composite types are also preserved and are limited to arrays and
RedBean_OODBBean objects (embedded beans).

## Value conversion in PDO binding

**RedBeanPHP** tries to convert data types by itself to preserve information.
It's very important that you understand how RedBeanPHP deals with data types.
If a value is numeric, the value will be bound to a prepared statement as an integer.
However this is only the case if the integer representation is the same as a string
representation. So while RedBeanPHP will bind 1900 as an integer, it will bind
007 as a string to preserve the padding zeros. Null values will be bound to statements
using the NULL type. Also be careful with fractions. RedBean stores floats and doubles as
doubles (bound as string). If you dont want this (to enable a higher level of data precision)
I recommend to bypass RedBeanPHP and store these values yourself. Also consider using a
proper Math library if working with high precision calculations.

Note that we talk here about PDO bindings, to set 007 in a bean property and preserve the zeros
set the meta property: $agent-&gt;setMeta(&quot;cast.agentname&quot;,&quot;string&quot;); -- where agentname is
the property and $agent is the bean.

## Objects

If you don't like static methods, you can use
the objects behind the facade directly.
Every method of the R-class is available through
the original RedBeanPHP objects as well. The facade
is just that: a thin layer on top of these objects.
Here is an overview of the most important R-methods
and how to use them 'the non-static way'.

Note that there are three important objects in RedBeanPHP:
the adapter (RedBean_Adapter), the query writer (RedBean_QueryWriter)
and the RedBeanPHP object database (RedBean_OODB).
We call these objects the core objects, because together they
represent the foundation on which RedBeanPHP has been built.
Other objects need these core objects, that's why they are bundled in
a toolbox (RedBean_ToolBox). So, if you need let's say an instance
of the Tag Manager class (RedBean_TagManager) you'll have to
pass an instance of the toolbox to the contructor.

## Starting RedBeanPHP in Object Mode

To start RedBeanPHP in object mode you can use the
RedBeanPHP **Kickstarter**.

```php
$toolbox = RedBean_Setup::kickstart($dsn, $user, $pass, $frozen);
```

This is how you obtain a toolbox. Yes, still static methods. If you really
want to not use any static method at all, you can manually assemble your toolbox
like this:

```php
$pdo = new RedBean_Driver_PDO($dsn);
$adapter = new RedBean_Adapter_DBAdapter($pdo);
$writer = new RedBean_QueryWriter_MySQL($adapter);
$oodb = new RedBean_OODB($writer);
$tb = new RedBean_ToolBox($oodb, $adapter, $writer);
```

The purpose of the Kickstarter becomes quite obvious now; if you do this
manually you have to decide which driver to use (PDO or OCI) and which
writer to use (MySQL, MariaDB, Postgres, CUBRID or SQLiteT).
The Kickstarter acts as a _factory_, inferring the appropriate toolbox
from your <abbr title="Data Source Name">DSN</abbr>.

## Wiring

RedBeanPHP has a very decoupled architecture, which makes it very flexibile.
However this means you need to introduce some objects to eachother.
First we need to tell RedBeanPHP how beans can obtain the toolbox, this
means we need to define our own BeanHelper:

```php
class BeanHelper extends RedBean_BeanHelper_Facade {
		private $toolbox;
		public function getToolbox() {
				return $this->toolbox;
		}
		public function setToolbox($toolbox) {
				$this->toolbox = $toolbox;
		}
}
```

Now let's do the wiring:

```php
$r = $tb->getRedBean();

//A helper for OODB to give to its beans
$b = new BeanHelper;
$b->setToolbox($tb);
$r->setBeanHelper($b);

//allow OODB to associate beans
$r->setAssociationManager(new RedBean_AssociationManager($tb));

//enable FUSE
$h = new RedBean_ModelHelper;
$h->attachEventListeners($r);

```

Normally the facade does all this dull work for you.
You can also let the facade do this work and still work with instances;
simply steal the toolbox from the facade after it has been configured:

```php
R::setup(...);
$toolbox = R::$toolbox; //give it to me!
```

## Creating a service object

Many methods in the R-facade are just _wrappers_ around calls to
methods on one of these core objects: **OODB**, **Writer** and **Adapter**. However
many static methods in R also call so-called service objects. Service
objects offer secondary functionality. To instantiate a _service object_
you need to pass the toolbox to its constructor. The toolbox contains the tools a
service object needs to operate: the adapter to connect to the
database, the OODB object to call basic ORM methods and the writer
to write queries for the database.

Let's consider an example. Let's say we want to use a function like
**R::find()** to find a bean, but we want to use objects rather than
static methods. How do we accomplish this ?

First, we glance
at the table to discover we need to have an instance of the _Finder_ to
use this method. Finder is a service object, specialized in well,...
finding stuff!

```php
$f = new RedBean_Finder($tb);
```

That's it. Now we have an instance of the Finder service object.
Now to find a bean use:

```php
$x = $f->find('music', ' composer = ? ', 'Bach');
```

Now **$x** contains all compositions by Bach. Like the result
of R::find(), $x contains a collection of beans. Unlike
R::find() we had to build the service object ourselves.

## Conversion table

Here is a kind of conversion table to look up R-methods
and find the corresponding methods on objects behind
the facade.

<table class="matrix">
<thead>
	<tr>
		<th>R::method()</th>
		<th>Class and Method</th>
		<th>Description</th>
	</tr>
</thead>
<tbody>
	<tr><td>R::dispense   </td><td>RedBean_OODB : dispense  </td><td>Dispense a bean</td></tr>
	<tr><td>R::load       </td><td>RedBean_OODB : load      </td><td>Load a bean</td></tr>
	<tr><td>R::store      </td><td>RedBean_OODB : store     </td><td>Store a bean</td></tr>
	<tr><td>R::trash      </td><td>RedBean_OODB : trash     </td><td>Delete a bean</td></tr>
	<tr><td>R::find       </td><td>RedBean_Finder : find    </td><td>Finds a bean</td></tr>
	<tr><td>R::exec       </td><td>RedBean_Adapter_DBAdapter<sup>[1]</sup> : exec</td><td>Executes SQL</td></tr>
	<tr><td>R::getAll     </td><td>RedBean_Adapter_DBAdapter<sup>[1]</sup> : get</td><td>Query the database</td></tr>
	<tr><td>R::dup        </td><td>RedBean_DuplicationManager : setFilters, dup</td><td>Duplicate a bean</td></tr>
	<tr><td>R::exportAll  </td><td>RedBean_DuplicationManager : exportAll</td><td>Export beans</td></tr>
	<tr><td>R::associate  </td><td>RedBean_AssociationManager<sup>[2]</sup> : associate</td><td>Associate two beans</td></tr>
	<tr><td>R::tag        </td><td>RedBean_TagManager : tag</td><td>Tag a bean</td></tr>
	<tr><td>R::related    </td><td>RedBean_AssociationManager : relatedSimple</td><td>Retrieve related beans</td></tr>
	<tr><td>R::commit     </td><td>RedBean_Adapter_DBAdapter<sup>[3]</sup> : commit</td><td>Commits transaction</td></tr>
	<tr><td>R::begin      </td><td>RedBean_Adapter_DBAdapter<sup>[3]</sup> : startTransaction</td><td>Begins transaction</td></tr>
	<tr><td>R::rollback   </td><td>RedBean_Adapter_DBAdapter<sup>[3]</sup> : rollback</td><td>Rolls back a transaction</td></tr>
	<tr><td>R::nuke       </td><td>RedBean_QueryWriter<sup>[4]</sup> : wipeAll</td><td>Destroys database</td></tr>
	<tr><td>R::dependencies</td><td>RedBean_OODB : setDepList</td><td>Sets dependent beans</td></tr>
	<tr><td>R::getColumns </td><td>RedBean_QueryWriter : getColumns</td><td>List columns of a table</td></tr>
	<tr><td>R::genSlots   </td><td>RedBean_SQLHelper<sup>[5]</sup> : genSlots</td><td>Generates slots</td></tr>
	<tr><td>R::freeze     </td><td>RedBean_OODB : freeze</td><td>Freezes the schema</td></tr>
</tbody>
<tfoot>
	<tr><td colspan="3"><sup>1</sup>In fluid mode the facade suppresses table/column not found exceptions.</td></tr>
	<tr><td colspan="3"><sup>2</sup>If you pass a base bean (3rd param) facade will use RedBean_AssociationManager_ExtAssociationManager.</td></tr>
	<tr><td colspan="3"><sup>3</sup>Facade ignores these calls in fluid mode (to avoid exceptions in some DB systems).</td></tr>
	<tr><td colspan="3"><sup>4</sup>Be careful, Facade ignores this method in Frozen mode!</td></tr>
	<tr><td colspan="3"><sup>5</sup>SQLHelper constructor requires only the Adapter, not the entire toolbox.</td></tr>
</tfoot>
</table>

Note that R::dup() first sets filters (if any)
and then calls the dup() method on the Duplication Manager service object.

## Facade-only methods

While most Facade methods are also available in instances, there are some exceptions.
First there are some batch methods like StoreAll and trashAll, these are just loops around store() and trash() but they
are only available in the facade. Similarly, R::transaction is just a wrapper around the transaction methods (commit,begin and rollback).
Some methods just deal with the facade itself: configureFacadeWithToolbox(), addDatabase(), selectDatabase() - these methods
occur only in the facade of course.
Finally there the loadMulti method is a facade-only method because it's actually just a loop around R::load.

## Why static methods in the first place?

The purpose of RedBeanPHP is to boost productivity and maintainability.
Static methods have certain advantages: they are **short** (no need to instantiate a class) and
**always available** (no need to pass them around). This is great for developers in
a dynamic environment (like me).

## Plugins

In RedBeanPHP ORM, plugins serve a dual purpose. First they provide additional functionality.
Second they keep the core clean.

A plugin is simply an additional PHP file residing in the **/plugin** folder.
For your convenience, all plugins discussed here are included in the _all-in-one_ package.

**Since 3.3**: Plugins can define additional static methods to be included in the _R-facade class_. This can
be done by adding a line of code after the **@plugin** directive in the plugin source file.

For more information on how to build a custom all-in-one package please consult the manual
page about the build script: [Replica](/replica#replica_and_plugins).
