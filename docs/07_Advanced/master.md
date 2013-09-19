<category>Advanced</category>

# Association API

Another way to use **many-to-many** relations is to use the **R::associate()** function. This function takes two beans
and associates them. To get all beans related to a certain bean you can use its counterpart **R::related()**.

```php
R::associate( $book, $page );
R::related( $page, 'book' );
R::relatedOne( $page, 'book'); //just the first bean
```

To **break** the association between the two:

```php
R::unassociate( $book, $page );
```

To **unassociate** all related beans:

```php
R::clearRelations( $book, 'page' );
```

From version 3.3 on you can use multiple beans with (un)associate, like this:
R::associate($wines, $barrels);

## Are Related

To find out whether two specific beans are **related**, use the
R::areRelated() function.

```php
R::areRelated( $husband, $wife );
```

This function returns TRUE if the two beans have been associated using
a many-to-many relation (associate) and FALSE otherwise.

## Association and SQL

With the Association API it's possible to include some <abbr title="Structured Query Language">SQL</abbr> in your relational
query:

```php
R::related( $album, 'track', ' length > ? ', array($seconds) );
```

## Extended Associations

**Extended Many-to-many relations** are _deprecated_ as of RedBeanPHP 3.4.

As of RedBeanPHP 3.4 you really don't need this functionality anymore. Instead use the
[intermediate bean notation](/shared_lists#link "Use the intermediate bean notation to store extended N-M relations").

An **extended association** is a **many-to-many** association with some extra information.

```php
R::associate($track,$album,array('sequencenumber'=>$s));
```

<abbr title="Javascript Object Notation">JSON</abbr> is also allowed:

```php
R::associate($track,$album,'{\"order\":\"2\"}');
```

Or just a **string**:

```php
R::associate($track,$album,'2'); //stored in property 'extra'
```

To **load** a association link:

```php
$keys = R::$extAssocManager->related($album,'track');
```

## Be careful with extended relations

Note that you almost never need extended associations at all. In most cases
an intermediate bean is better.
For instance, imagine a **project** bean and a **person** bean.
You want to connect a
**person** to a **project** so maybe you think:

```php
R::associate($project,$person);
```

But then you realize you need to specify
a role as well. It's tempting to switch to an extended association now, however this is not a good idea.
What you are really looking at is an **intermediate bean**. Don't try to obscure this bean in a relation. In this
case we have to differentiate between a **person** and a **participant**.

```php
$participant->person = $person;
$participant->role = 'developer';
$project->ownParticipant[] = $participant;
```

This approach has several advantages; you can easily add more information to the participant bean:

```php
$participant->leader = true;
```

You can model the fact that participants can be represented by multiple persons (for instance if someone gets ill):

```php
$participant->person = $replace;
```

...and it's also easy to find out how frequently someone is
participating in projects:

```php
$activities = $person->ownParticipant;
```

It would be cumbersome hide all this in a link table by using extended associations.

## Rule of thumb&hellip;

Here is my rule of thumb: if you need to **qualify** a relationship you
**probably** need to use an intermediate bean.

# Copy Beans

**R::dup()** makes a deep copy of a bean properly and without storing the bean. All own-beans will be copied as well. And
all shared beans will be shared with the bean.
The bean will not be stored so you have the chance to modify it before saving. Usage:

```php
//entire bean hierarchy
$book->sharedReader[] = $reader;
$book->ownPage[] =$page;
$duplicated = R::dup($book);
//..change something...
$book->name = 'copy!';
//..then store...
R::store($duplicated);
```

## Performance

Both dup() and exportAll() need to query the database schema which is slow. To speed up the process you can
pass a database schema:

```php
R::$duplicationManager->setTables($schema);
```

To obtain the schema use:

```php
$schema = R::$duplicationManager->getSchema();
```

You can now use this schema to feed it to setTables(). R::dup() and R::exportAll() both use this schema.

# Import and Export

You can **import** an array into a bean using:

```php
$book->import($_POST);
```

The code above is handy if your **$_POST** request array only contains book data. It will
simply load all data into the book bean. You can also add a selection filter:

```php
$book->import($_POST, 'title,subtitle,summary,price');
```

This will restrict the import to the fields specified. Note that this does not
apply any form of validation to the bean. Validation rules have to be written in the [model](/models_and_fuse "Models and FUSE")
or the controller.

You can **export** the data inside a bean to an array like this:

```php
$bookArray = $book->export();
```

Calling **export()** on a bean will export the data of a single bean into an array.
R::beansToArray takes an array of beans and returns an array containing their values (requires version 3.5 or higher).

## Recursive Export

To recursively export one or an array of beans use:

```php
$arrays = R::exportAll( $beans );
```

Bean lists in exports have keyless.

## Performance

Both dup() and exportAll() need to query the database schema which is slow. To speed up the process you can
pass a database schema:

```php
R::$duplicationManager->setTables($schema);
```

To obtain the schema use:

```php
$schema = R::$duplicationManager->getSchema();
```

You can now use this schema to feed it to setTables(). R::dup() and R::exportAll() both use this schema.

Since version 3.3: R::exportAll( $beans, true ) -- exports parent beans as well.

Since version 3.3: to only export a specific set of bean types:
R::exportAll( $beans, true, $filters ); here $filters contains the list of
types to be exported.

If the exportAll() function does not export enough related beans (for instance you also want to load some of the
shared relations) you can do a R::preload() first (RedBeanPHP 3.4+).

## Careful&hellip;

Import functions do not validate user input.

exportAll() is **slow**. You can speed up by passing an array of cache tables:

R::$duplicationManager->setTables($tables); (**3.3+**)
or export manually using the bean->export() functions.

## Swap

It's very common in real life applications to swap properties.
For instance, in a <abbr title="Content Management System">CMS</abbr> you often have a feature to change the order of pages or menu items.
To swap a property use:

```php
$books = R::batch('book',array($id1,$id2));
R::swap($books,'rating');
```

We simply load two books using the [batch loader](/loading_a_bean "Learn how to load a batch of beans"), then we pass the array with two books to swap() as well as the
name of the property we which to swap values of.

# Debug and log

RedBeanPHP offers excellent
[logging](#logging "Logs drifing on a sea of beans.")
and
[debugging](#debugging "Bugging the beans!") tools.

## Logging

Sometimes you want to log what's going on in the adapter. This is known as query logging.
Of course you could use a simple R::debug() but that just dumps all the queries directly
on your screen which might not be exactly what you want. Maybe you want to write the logged queries
to a file or analyze them directly. To start logging queries simply use:

```php
$queryLogger = RedBean_Plugin_QueryLogger::getInstanceAndAttach(
	R::getDatabaseAdapter()
);
```

This will create an instance of the default Query Logger plugin and return it.
This also attaches an event listener to the database adapter. To obtain the current database
adapter use: R::getDatabaseAdapter() or simply: R::$adapter. To get the logs:

```php
$queryLogger->getLogs();
```

This will return an array containing all the queries that have been processed since the
logger has been attached to the adapter. For example, the output of R::nuke() on an SQLite
database looks like this:

<kbd>
[0] =&gt; PRAGMA foreign_keys = 0

[1] =&gt; SELECT name FROM sqlite_master
		WHERE type='table' AND name!='sqlite_sequence';

[2] =&gt; drop table if exists bean

[3] =&gt; drop view if exists bean

[4] =&gt; PRAGMA foreign_keys = 1

</kbd>

You can also search for specific queries with grep():

```php
$queryLogger->grep('DROP');
```

The code above will return an array of all queries containing the word 'DROP'. Finally,
to clear the logs use:

```php
$querLogger->clear();
```

## Manual Logging

You can write your own query logger by extending the Query Logger class:

```php
class MyLogger extends RedBean_Plugin_QueryLogger { .. }
```

Attach the logger like this:

```php
$adapter->addEventListener('sql_exec',new MyLogger);
```

This will add your own logger as an event listener / observer to the adapter.
Your logger will listen for the event with id 'sql_exec'. Make sure you implement the
onEvent() method defined in the QueryLogger class.

## Debugging

The **RedBeanPHP** debugger displays all queries on screen. Activate the
debugger using the **R::debug()** function:

```php
R::debug(true);
```

To turn the debugger off:

```php
R::debug(false);
```

## Tainted

Sometimes its useful to know whether a bean has been modified or not. The current state of the bean is stored in a Meta property called **tainted**. To get the state of the bean use:

```php
$bean->getMeta('tainted');
```

If the bean has been modified this will return boolean TRUE, otherwise it will return FALSE.

# Meta Data

Beans contain meta information; for instance the type of the bean.
This information is hidden in a meta information field.
You can use simple accessors to get and modify this meta information.
<p>
<p>
To get a meta property value:

```php
$value = $bean->getMeta('my.property', $defaultIfNotExists);
```

The default default value is NULL.

To set a meta property:

```php
$bean->setMeta('foo', 'bar');
```

The type (in 3.0+ this is always the same as the database table)
of the bean is stored in meta property 'type' and can be retrieved as follows:

```php
$bean->getMeta('type');
```

**Since 3.0:** Meta data can be used for explicit casts. For instance if you want to store something
as a POINT datatype:

```php
$bean->setMeta('cast.myproperty','point');
```

## Public Meta properties

Here is an overview of all public meta properties used by the system. These
meta properties are safe to read and can be used reliably to extract information
about beans. Don't change them though!

<table>
	<thead><tr><th>Property</th><th>Function</th></tr></thead>
	<tbody>
		<tr><td>type</td><td>(string) Determines the type of the bean, don't change!</td></tr>
		<tr><td>tainted</td><td>(boolean) Whether the bean has been modified.</td></tr>
		<tr><td>cast.*</td><td>Used for explicit casting</td></tr>
	</tbody>
</table>

## Private Meta properties

Here is an overview of all system meta properties. These
meta properties should not be relied on, they are only for RedBeanPHP internal subsystems.

<table>
	<thead><tr><th>Property</th><th>Function</th></tr></thead>
	<tbody>
		<tr><td>buildcommand.indexes</td><td>issues extra options for query writer, for internal use only</td></tr>
		<tr><td>buildreport.flags.*</td><td>Information about internal processes</td></tr>
		<tr><td>sys.*</td><td>System information, never touch!</td></tr>
		<tr><td>idfield</td><td>Deprecated. Don't touch!</td></tr>
		<tr><td>buildcommand.unique</td><td>issues an extra option for query writer, use with care</td></tr>

	</tbody>
</table>

# Labels

A Label is a bean with just a name property. You can generate a batch of labels of a certain type
using:

```php
$labels = R::dispenseLabels('meals',
	array('pizza', 'pasta', 'hamburger')
);
```

This will create three meal objects. Each bean will have a name property
that corresponds to one of the strings mentioned in the comma separated list.

You can also collect the strings from label beans using:

```php
$array = R::gatherLabels($meals);
```

The gatherLabels() function returns an alphabetically sorted array of strings each
containing one name property of a bean in the bean list provided.

# Cooker

The cooker is a tool to turn arrays (forms, XML, JSON) into beans.
An array has to contain a key named 'type' containing the type of bean it represents.
Further more an array can contain own-lists and shared-lists as nested arrays.

```php
$bandMemberArr = array(
	'type' => 'bandmember',
	'name' => 'Duke',
	'ownInstrument' => array(
		'type'=>'instrument',
		'name'=>'kazoo'
	)
);

$bandMemberBean = R::graph($bandMemberArr);
```

In this example we convert the array 'bandMemberArr' to a bean of type
'bandmember'. The bean can now be stored in the database.

```php
R::store($bandMemberBean);
```

If an array has a field with key 'id', the Cooker will try to load
the bean instead of dispensing a fresh bean. This means you can also update parts of beans.

The fact that the Cooker also automatically loads beans can become a security issue if
you don't verify ID integrity. From RedBeanPHP 3.4 on the Cooker will have an extra
safety setting; if you want to enable bean loading you need to invoke:

RedBean_Plugin_Cooker::enableBeanLoading(true);

first. Otherwise the Cooker will not load and/or update existing beans.

R::graph($array,**TRUE**) will ignore all beans that appear to be empty (You can use this if you build
forms; it makes it possible to add an empty form entry to add a new entity of something).

# Cache

There are two caching mechanisms in RedBeanPHP, the
[Query Cache](#querycache "Easy caching for RedBeanPHP!") and the
[Bean Cache](#beancache "Advanced caching for RedBeanPHP!").
I recommend to use the Query Cache, the Bean Cache is a plugin and it makes RedBeanPHP somewhat more
complex to use.

## Query Cache

In RedBeanPHP 3.4 you can use a very **easy-to-use** caching system: the **Query Writer Cache**.
This _caching_ mechanism will return the same result set for identical _query-value_ pairs.
The cache gets automatically _flushed_ everytime something other than a _select_ query is fired (i.e. an INSERT or DELETE).
This means that this is a relatively safe cache to use. Issue the following statement to activate the Query Writer Cache:

```php
R::$writer->setUseCache(true);
```

## Bean Cache

RedBeanPHP offers a Bean Cache. The bean cache can be configured like this:

```php
$cachedOODB = new RedBean_Plugin_Cache($t->getWriter());
")?>

To allow the facade to use the cache (note that $t is a toolbox instance RedBean_ToolBox):

```php
$t = R::$toolbox; //obtain old toolbox
R::configureFacadeWithToolbox(new RedBean_ToolBox(
$cachedOODB,
$t->getDatabaseAdapter(),
$t->getWriter()));
```

To flush cache:

```php
$cache->flushAll();
```

You can also choose to flush cached beans of a given type:

```php
$cache->flush($type);
```

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
