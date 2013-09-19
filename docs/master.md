<category>Getting started</category>

# Welcome

RedBeanPHP is a **lightweight**, **configuration-less**
<abbr title="Object Relational Mapper">ORM</abbr> library for PHP.
Let's look at the code, this is how you do
<abbr style="font-weight:bold;" title="Create Retrieve Update and Delete">CRUD</abbr> in RedBeanPHP:

```php
$post = R::dispense('post');
$post->text = 'Hello World';

$id = R::store($post);       //Create or Update
$post = R::load('post',$id); //Retrieve
R::trash($post);             //Delete
```

This code creates, stores, loads and deletes a single post object.
This code will run without any prior configuration.
RedBeanPHP **automatically generates** the database, tables and columns **on-the-fly**.
RedBeanPHP infers relations based on naming conventions.

## News

<time>2013-09-13</time>: It's Friday the 13th, let's test some beans! [RedBeanPHP 3.5 beta 6](/beta_testing "RedBeanPHP 3.5 Beta 6") is out!

<time>2013-09-10</time>: [RedBeanPHP 3.5 Beta 5](/beta_testing "RedBeanPHP 3.5 Beta 5") has been released!

<time>2013-09-07</time>: [RedBeanPHP 3.5 Beta 4](/beta_testing "RedBeanPHP 3.5 Beta 4") has been released!

<time>2013-09-04</time>: [RedBeanPHP 3.5 Beta 3](/beta_testing "RedBeanPHP 3.5 Beta 3") has been released!

<time>2013-09-03</time>: [RedBeanPHP 3.5 Beta 2](/beta_testing "RedBeanPHP 3.5 Beta 2") has been released!

<time>2013-08-31</time>: [RedBeanPHP 3.5 Beta 1](/beta_testing "RedBeanPHP 3.5 Beta 1") has been released!

<time>2013-08-17</time>: [RedBeanPHP 3.5 Alpha 7](/beta_testing "RedBeanPHP 3.5 Alpha 7") has been released!

<time>2013-08-15</time>: [RedBeanPHP 3.5 Alpha 6](/beta_testing "RedBeanPHP 3.5 Alpha 6") has been released!

<time>2013-08-13</time>: [RedBeanPHP 3.5 Alpha 4](/beta_testing "RedBeanPHP 3.5 Alpha 4") has been released!

<time>2013-07-25</time>: [Alpha release](/beta_testing "RedBeanPHP 3.5 Alpha 1") of RedBeanPHP 3.5!

## Why RedBeanPHP

RedBeanPHP is a simple, easy-to-use, on-the-fly object mapper, especially suited for
<abbr title="Rapid Application Development - in other words, insane deadlines">RAD</abbr>,
prototyping and people
with deadlines. RedBeanPHP creates tables, columns, constraints and indexes automatically
so you don't have to switch between your database client (phpMyAdmin) and your
editor all the time (this does not mean you will never have to use phpMyAdmin or SQL though, read on... ).
Also you don't have to write configuration files because RedBeanPHP
simply infers the database schema from naming conventions. Because RedBeanPHP saves a lot of
time you can spend more time developing the rest of the application.

## No Configuration

Most ORMs use configuration files (XML, INI or YAML) or some sort of annotation system
to define mappings. These systems force you to map records to objects upfront. RedBeanPHP is different.
Instead of using
configuration it uses conventions; a very small set of rules. RedBeanPHP uses these conventions
to infer relationships and to automate mappings. RedBeanPHP also helps you to follow these
conventions by automatically building the initial tables and columns for you - which also saves
a lot of time. This means there is no configuration, less boilerplate code and more time left
to focus on the business logic, testing and documentation, thus boosting development productivity and
code quality.

## A bridge between objects and records

<abbr title="SQL (structured query language) is the most common query language for most relational database systems.">SQL</abbr>
is a powerful query language for relational databases. Most ORMs act like a wall,
hiding SQL from you. RedBeanPHP on the other hand tries
to integrate both technologies, thus acting more like a bridge.
For instance, RedBeanPHP allows you to embed SQL snippets in ORM methods to tune
the retrieval of related beans from the database. RedBeanPHP seeks to strike a balance
between object oriented programming and relational database querying.

## Code Quality

RedBeanPHP has been carefully architected to be concise and maintainable.
The core codebase is tested daily using about 20.000 unit tests (100% test coverage)
on local servers and a
<abbr title="Travis CI is the continous integration solution used for RedBeanPHP.">Travis CI</abbr>
environment. The codebase contains a lot of inline documentation, is fully object oriented and
improves security by promoting PDO based prepared statements and parameter binding.

## Quick Tutorial

Try the 5-minute guide to RedBeanPHP to get started quickly.
Learn to use basic RedBeanPHP ORM in just [about 5 minutes](/quick_tour "Learn RedBeanPHP in 5 minutes").
Otherwise, if you're not in a hurry
but you just want to get started and learn the basic concepts I recommend to start with
[Create a Bean](/create_a_bean "Basic RedBeanPHP") (see navigation block on the left) and work your
way through the manual from there. I have tried to put the most important (read: basic) topics on top of the list.

## One-File Download

RedBeanPHP has been compiled into one single file for easy installation. No paths, no auto-loaders,
no configurations, just download the all-in-one package and require the single **rb.php** file
in your code.

[DOWNLOAD Latest RedBeanPHP (Version 3.4.7)](/downloadredbean.php "Get RedBeanPHP").

## Enterprise Support

RedBeanPHP commercial support is provided by [Organic Software](http://www.organicsoftware.nl/index_en.html "Organic Software").

_RedBeanPHP is used by:_

![Logos of companies using RedBeanPHP for ORM.](/img/logos3.png)

# Quick tour

To setup RedBeanPHP for testing purposes, just use:

```php
require 'rb.php';
R::setup();
```

This will create a **temporary database** in the temporary folder on most systems. If this fails; try passing
a valid [DSN, username and password (PDO style)](/setup "Setting up RedBeanPHP").

## CRUD

RedBeanPHP allows you to perform
<abbr title="C.R.U.D. stands for CREATE, RETRIEVE, UPDATE, DELETE.">CRUD</abbr> operations quite easily. After setting up you don't have to add tables, columns, indexes or
foreign keys. All database structures will be generated by RedBeanPHP.

Instead of database records, RedBeanPHP thinks in _'Beans'_.
A bean always has a type and an id. The type matches the name of the table where the bean is stored.
This is how you create a bean:

```php
$shop = R::dispense('shop');
```

And this is how you set properties:

```php
$shop->name = 'Antiques';
```

This is how you **store** the shop in the database:

```php
$id = R::store($shop);
```

This is how you **load** your previously stored shop:

```php
$shop = R::load('shop',$id);
```

And this is how you **delete** the shop from the database:

```php
R::trash($shop);
```

## Relations

<abbr title="Object Relational Mapping">ORM</abbr> is about mapping relations. Our shop would be quite useless if it
does not sell anything, so our shop is filled with $products, **those are beans as well**.
This is how you **add** a product to your shop:

```php
$product = R::dispense('product');
$product->price = 50;
$shop->ownProduct[] = $product;
R::store($shop);
```

Simply add products to a list called ownProduct. If you add employees use:

```php
$shop->ownEmployee[] = $mike;
```

The name of the list should always begin with the word **'own'** followed by the
name of the **type** of bean it contains. Remember, the type is the string you pass to the
**R::dispense()** method! So, beans of type 'book' are stored in **ownBook**,
beans of type 'employee'
in **ownEmployee**, beans of type 'box' in **ownBox** etc. To empty a list:

```php
$shop->ownEmployee = array(); //fires everyone!
```

You never have to load a list. Lists are fetched as soon as you access the
property. This is called **lazy loading**. You can also mix in some <abbr title="Structured Query Language">SQL</abbr>;
for instance to **sort** the products in a list:

```php
$products = $shop
	->with(' ORDER BY price ASC ')
	->ownProduct; //since 3.3
```

Learn more about [one-to-many relations](/adding_lists "1-N relations") in RedBeanPHP.

## Shared Lists

A shared list is just like an own-list but the relationship goes **both ways**.
With an own-list the shop 'owns' the products. They cannot be owned by
more than just **one** shop. With managers, this is not the case; managers
can be associated with **many** shops. So we use a
[shared list](/shared_lists "many-to-many relations in RedBeanPHP") (creates a
**link table** manager_shop):

```php
$shop->sharedManager[] = $jack;
```

## Finding stuff

To [find](/finding_beans "Finding beans in the database")
beans in the database, we use _plain old SQL_, for instance the following example
will find all shops in the neighbourhood:

```php
$shops = R::find('shop',' distance < 10 ');
```

## Querying

Using raw [SQL power](/queries "Querying") is possible as well, and just as easy:

```php
R::exec('UPDATE shop SET name = ? ',array('MyShop'));
```

RedBeanPHP offers methods to retrieve cells,columns,rows and multi dimensional arrays:

```php
R::getCell( ... )
R::getCol( ... )
R::getRow( ... )
R::getAll( ... )
```

## After Development

Once you are done developing you need to deploy your PHP application on a
production server. Now you don't want RedBeanPHP to scan the database and
modify the schema there, so you need to tell RedBeanPHP to [freeze](/freeze "Freezing the beans!"):

```php
R::freeze( true );
```

Simply put that line _at the beginning of your application_ before deploying.
Right **after** R::setup( ... ).

## Don't like static methods?

RedBeanPHP provides a lot of easy-to-use static methods. If you don't like
this you can use the same methods on the objects behind the facade as well.
Learn how to use the RedBeanPHP [core objects](/internals#objects "Learn how to use objects instead of static methods.").

# System Requirements

**RedBeanPHP** has been tested with PHP 5.3+ but runs under PHP 5.2 as well.
RedBeanPHP works on all well known operating systems.
You need to have <abbr title="PHP Data Objects">PDO</abbr> installed and you need
a PDO driver for the database you want to connect to. Most PHP stacks
come with PDO and a bunch of drivers so this should not be a problem. RedBeanPHP supports
a wide range of relational databases; for a full list feel free to consult the
[compatibility page](/compatible "Compatible Databases").

## MB String extension

RedBeanPHP requires the mb_string extensions. Most PHP distributions have
this already.

## MySQL Strict Mode

RedBeanPHP does **not** work with **MySQL strict mode**.
To turn off strict mode execute the following SQL query:

```php
SET @@global.sql_mode= '';
```

## Existing schemas

RedBeanPHP has been designed to build your database **on-the-fly**, as you go.
Afterwards, you can **manually** change the schema to suit your needs (change column types, add additional indexes);
RedBeanPHP won't revert your changes, not even in fluid mode.

While RedBeanPHP can also be used with existing schemas these have to conform to the RedBeanPHP naming conventions to work.
Remember that the purpose of RedBeanPHP is to have an easy, configuration-less ORM. This can be achieved only by
respecting certain conventions.

# Installing

To install **RedBeanPHP**, [download the RedBeanPHP All-in-one pack](http://www.redbeanphp.com/downloadredbean.php "All in one pack") from the website.
After unzipping you will see just one file:

<kbd>
rb.php
</kbd>

This file contains everything you need to start RedBeanPHP. Just include it in your
PHP script like this:

```php
require 'rb.php';
```

You are now ready to use RedBeanPHP!

## Installing using composer

You can install
RedBeanPHP using **Composer** if you like. For details please read the
[README file on github](https://github.com/gabordemooij/redbean "Composer").
While installing RedBeanPHP using Composer is possible it's **not** the same as downloading the all-in-one pack.
The all-in-one pack contains a file called rb.php which has been compiled using the Replica Build script.
This means the _R-class_ in the all-in-one pack contains some plugins that are **not** available in
the aliased Facade Class of the composer package.

**I therefore recommend to just download the all-in-one package.**

The all-in-one package has been designed to be **easy to install** and contains a **carefully selected** set of
plugins and writers.

While Composer is an awesome tool I don't think it offers real benefits in our case
because we already have thought out the _distribution process_.

## Installing using a framework

RedBeanPHP is a library and as such it can be integrated in a framework.
There are some really nice frameworks out there that ship with built-in support for RedBeanPHP.
Here is a brief overview of Frameworks that ship with RedBeanPHP:

*   [PrismaPHP](http://prismaphp.org "Visit the PrismaPHP MVC Framework.") Framework
*   [Nibble](http://nibble-development.com/nibble-framework-php-plugin-based-framework/ "Visit the Nibble Framework.") Framework

Besides these frameworks, RedBeanPHP modules are available for various other frameworks like Code Igniter, Kohana, Laravel and Zend Framework.
Please consult your framework provider for more details about these modules.

# Setup

So, you have decided to start with **RedBeanPHP**. The first thing you need to
get started is setting up the **database**. Luckily this is really easy.

```php
require('rb.php');
R::setup();
```

Yes, that's all if you are working on a *NIX, Linux or Mac system with **SQLite**.
Here is how to connect to **MySQL** on any machine:

```php
require('rb.php');
R::setup('mysql:host=localhost;
	dbname=mydatabase','user','password');
```

RedBeanPHP is also very easy to [setup for use with PostgreSQL and SQLite](/compatible).

## InnoDB only

RedBeanPHP only works with the InnoDB driver for MySQL. MyISAM is too [limited](http://www.kavoir.com/2009/09/mysql-engines-innodb-vs-myisam-a-comparison-of-pros-and-cons.html "article about differences between MyISAM and InnoDB").

# Compatible

RedBeanPHP has fluid and frozen mode support for:

<table>
<tr><td>**MySQL 5** and higher</td></tr>
<tr><td>**SQLite 3.6.19** and higher</td></tr>
<tr><td>**PostgreSQL 8** and higher</td></tr>
<tr><td>**CUBRID** (since **3.2**)</td></tr>
</table>

To connect to a **databases** use:

```php
R::setup('mysql:host=localhost;dbname=mydatabase',
	'user','password'); //mysql
```
```php
R::setup('pgsql:host=localhost;dbname=mydatabase',
	'user','password'); //postgresql
```
```php
R::setup('sqlite:/tmp/dbfile.txt',
	'user','password'); //sqlite
```

Since **3.2**:

```php
R::setup('cubrid:host=localhost;port=30000;
	dbname=mydatabase',
	'user','password'); //CUBRID
```

## Disconnect

To disconnect use: R::close(); (since 3.1)

<category>Basics</category>

# Create a Bean

Using RedBeanPHP is easy. First create a bean. A bean is just a plain old object with public properties. Every bean has
an **id** and a **type**.

```php
$book = R::dispense('book');
```

Now we have an empty
bean
of type **book** with id **0**.
Let's add some properties:

```php
$book->title = 'Gifted Programmers';
$book->author = 'Charles Xavier';
```

Or&hellip; if you're in the mood for chaining you can use:

$book-&gt;setAttr('title','Gifted Programmers')-&gt;setAttr(..) etc&hellip;

(requires version 3.3+)

Let's store this bean in the database:

```php
$id = R::store($book);
```

**That's all?** _Yes_. Everything has been written to the **database**! RedBeanPHP **automatically** creates the **table** and
the **columns**.

Note that the store() function returns the ID of the record. Also, there is storeAll($beans) in RedBeanPHP 3.1

## How does it work?

RedBean dynamically adds columns if you add new properties:

```php
$book->price = 100;
```

RedBeanPHP also updates the column type to support a different type of value.
For instance, this will cause the column to change from **TINYINT** to **DOUBLE**:

```php
$book->price = 99.99;
```

## More data types

You can store other data types as well:

```php
$meeting->when = '19:00:00'; //Time
$meeting->when = '1995-12-05'; //Date
$photo->created = '1995-12-05 19:00:00'; //Date time
$meeting->place = '(1,2)'; //only works in postgres
```

You can use R::isoDate() and R::isoDateTime()
to generate the current date(time) if you like.

## Multi Dispense

To dispense multiple beans at once:

```php
$twoBooks = R::dispense('book',2);
```

## Use the cache!

Start your code with: R::$writer->setUseCache(true); to make use of query caching.
This will prevent RedBeanPHP from performing unnecessary queries. This feature is
available since RedBeanPHP 3.4. While RedBeanPHP offers other caching mechanisms as
well this is the easiest to use and it's completely transparent!

## The rules

**Bean types** may only consist of **lowercase** **alphanumeric** symbols **a-z** and **0-9**
(no underscores).
A property name has to **begin with a letter** and may consists of letters and numbers. **Underscores
** in property names
are allowed but I recommend to come up with better nouns instead.

Underscores in **Bean types** are _not_ allowed because RedBeanPHP uses these to identify relations.
Underscores are used to
denote a relation between two beans, therefore you should not dispense such beans yourself.

The RedBeanPHP naming restrictions allow RedBeanPHP to figure out relationships among tables and beans
without configuration; however these rules also help you to maintain a clean and consistent database
schema. Moreover, developers often make up terrible names for tables (i.e. 'tbl_userrights', 'person_Project' etc&hellip;).
I try to encourage people to
take some time to find the correct 'name' (often a simple noun) for their beans (i.e. 'privilege','participant').
This also improves the readability
(and maintainability) of your database. Just take some time to find the noun that describes
the entity you're modelling best.

If, for some reason you really need to break these rules use: Use R::setStrictTyping(false); This may cause
some side effects with dup() and export() though.

As of RedBeanPHP 3.4, a property name like 'singleMalt' will be automatically converted to 'single_malt'.
If you don't like that, use: RedBean_OODBBean::setFlagBeautifulColumnNames(false);

# Loading a Bean

To load a bean from the database use the **load()** function and pass both the **type** of the bean and the **id**:

```php
$book = R::load('book', $id);
```

If the bean cannot be loaded a new **empty** bean will be dispensed with id **0**.
To check whether a bean has been loaded correctly you can
verify the id using:

```php
if (!$bean->id) { ...help bean not found!!.. }
```

This behaviour is very useful. For instance, consider loading a page bean:

```php
$page = R::load('page',$id);
show_form($page); //imaginary function
```

If the page does exists, the contents of the page will be shown in the form to allow
the user to update the page. However if the page does not exist, what are we going to do?
Well the page is gone after all (maybe someone has removed the page?),
so we can just as well present the user with an empty form.
This saves a lot of unnecessary _if-then-else_ code.

After a bean has been loaded, you can simply access properties like you expect:

```php
echo $book->title; //displays value of property title
```

Properties of a loaded bean only contain **STRING** or **NULL** values.

## Batch Loader

To load a **batch** of beans at once:

```php
$books = R::batch('book',array($id1,$id2));
```

## Counting

To **count** beans:

```php
R::count('page'); //counts all pages
```

Since RedBeanPHP 3.3 you can also add some SQL:

R::count('page',' chapter = ?',array($chapter))

## Empty Beans

**Remember**: If the bean _cannot_ be loaded a **new empty bean** will be dispensed with id **0**.

Next: learn how to [delete](/deleting_a_bean "Learn how to delete a bean.") a bean.

# Deleting a Bean

To remove a bean from the **database**:

```php
R::trash( $book );
```

To delete **more** beans of type book:

```php
R::trashAll( $books );
```

To delete **all** beans of type book:

```php
R::wipe( 'book' );
```

## Nuke

You can also empty an entire database with the R::nuke() command. Be very careful with this!

Next: learn how to stop RedBeanPHP from modifying the schema any further; before _deploying_
your RedBeanPHP based application you should
[freeze](/freeze "Learn how to freeze the database") the database.

# Freeze

By default **RedBeanPHP** operates in **fluid** mode. In fluid mode the **database**
**schema** gets updated to meet the requirements of your code.
For instance, if you assign a string to a property that previously only contained numbers RedBeanPHP
will _broaden_ the column to store strings as well.
This is great for development. However because inspecting the database is slow and you don't want
such a dynamic schema on the production server you should freeze the database by
invoking the **R::freeze(true)** command before deployment. This will lock the schema to prevent
further modifications.

```php
R::freeze( true ); //will freeze redbeanphp
```

Between freezing and deployment you need to review the database schema to make sure
it fits the bill. Here is a simple checklist:

1.  Check the column types. RedBeanPHP tries to guess the right types based on usage during development, however
	column types may be improved based on your expectations about real world usage.
2.  This issue concerns relations, if you haven't read about RedBeanPHP relations yet, you can skip this
	item for now.
	RedBeanPHP sets foreign keys for [relations automatically](/adding_lists#dependencies "Learn about relational mapping"),		however by default RedBeanPHP selects 'SET NULL'
	as the default action for deletions because the system can't predict whether a cascaded delete is desired. Make sure
	Check these foreign keys before deployment. If you don't know anything about foreign keys these default settings are
	probably just allright.
3.  RedBeanPHP adds some indexes. However, additional indexes may improve performance. Once again
	I recommend to review the indexes and adjust them where necessary based on your knowledge about		production environment.

## Chill Mode

Instead of freezing all beans you can freeze certain bean types only:

```php
R::freeze( array('book','page') );
	//book,page tables remain untouched.
```

this we call 'Chill Mode'.

Chill Mode has been added in version 3.2

Next: finding stuff with RedBeanPHP is really easy.
[RedBeanPHP uses familiar SQL](/finding_beans "Finding beans with RedBeanPHP ORM with some good old SQL") to
search for beans in the database.

# Tainted

To see whether a bean has been changed:

```php
$bean->getMeta('tainted');
```

Note that certain properties, like lists (see chapter lists) also cause a bean to get
marked as tainted.
In RedBeanPHP version 3.4 there is a shorthand method: isTainted().

## Old Values (3.4)

In RedBeanPHP 3.4+ you can check whether a certain property has changed and you can retrieve
the previous value.

```php
$post->hasChanged('title'); //has title been changed?
$oldTitle = $post->old('title');
```

<category>Finding</category>

# Finding Beans

**RedBeanPHP** allows
you to use good old <abbr title="Structured Query Language">SQL</abbr> to find beans:

```php
$pages = R::find('page',' title = ? ',
			array( $title )
		   );
```

The result of a find operation is an array of beans; the **ID**s are used as keys.
Find takes **3** arguments; the **type** of bean you are looking for,
the [SQL query](/queries "Learn how to write queries with RedBeanPHP")
and an array
containing the **values** to be used for the question marks. Named slots are supported as well:

```php
$pages = R::find('page',
	' title = :title LIMIT :limit',
		array(
			':limit' => $limit,
			':title' => $title
		)
	);
```

...and so are **IN-clauses**:

```php
$all = R::find('page',
	' id IN ('.R::genSlots($ids).') ', $ids);
```

If you don't use any conditions but you just want to **ORDER** or **LIMIT** result rows,
use **findAll()**:

```php
$all = R::findAll('page',
	' ORDER BY title LIMIT 2 ');
```

To find just **one** bean; use **findOne()**:

```php
$prod = R::findOne('product',
	' code = ? ',array($code));
```

findOne returns the first bean in the result set. Use **findLast()** to get the last bean.

You can only bind **literal** values. This will not work: &quot;ORDER BY :sortcolumn DESC&quot;
- because the parameter refers to a column, **NOT** a literal.

## Return values

If no beans are found, find() and findAll() return an **empty array**,
findOne(), findFirst() and findLast() return **NULL**.

There is no need to use **mysql_real_escape**, just bind the parameters to the slots in
the query. **Never** use PHP variables directly in your **SQL** string!

# Queries

If you prefer **rows** rather than **beans** you may want to use the
<abbr title="Structured Query Language">SQL</abbr> query functions provided by
**RedBeanPHP**. To just execute a query:

```php
R::exec( 'update page set title=\"test\" where id=1' );
```

To get a **multidimensional** array:

```php
R::getAll( 'select * from page' );
```

The result of such a query will be a **multidimensional** array:

```php
Array
(
	[0] => Array
		(
			[id] => 1
			[title] => frontpage
			[text] => hello
		)

	[1] => Array
		(
			[id] => 2
			[title] => back
			[text] => bye
		)
)
```

Note that you can use **parameter bindings** here as well:

```php
R::getAll( 'select * from page where title = :title',
	array(':title'=>'home')
);
```

To fetch a **single row**:

```php
R::getRow('select * from page where title like ? limit 1',
	array('%Jazz%'));
```

The resulting array corresponds to one single row in the result set. For instance:

```php
Array
(
	[id] => 1
	[title] => The Jazz Club
	[text] => hello
)
```

To fetch a **single column**:

```php
R::getCol('select title from page');
```

The result array of this query will look like this:

```php
Array
(
	[0] => frontpage
	[1] => The Jazz Club
	[2] => back
)
```

And finally, a **single cell**...

```php
R::getCell('select title from page limit 1');
```

To get an associative array array with a specified key and value column use:

```php
R::$adapter->getAssoc('select id,title from page');
```

result:

```php
Array
(
	[1] => frontpage
	[2] => The Jazz Club
	[3] => back
)
```

In this case, the keys will be the IDs and the values will be the titles.

## Converting records to beans

You can convert rows to beans using the convertToBeans() function:

```php
$sql = 'SELECT author.* FROM author
	JOIN club WHERE club.id = 7 ';
$rows = R::getAll($sql);
$authors = R::convertToBeans('author',$rows);
```

## About Escaping

There is no need to use **mysql_real_escape** as long as you use parameter binding.

## Query Building

Notice that we have used strings for our SQL. Did you know RedBeanPHP
allows you to mix PHP and SQL as if they were one and the same language?
Read about [mixing SQL and PHP](/mixing_sql_and_php "Mix SQL and PHP!").

# Mixing SQL and PHP

In RedBeanPHP you can mix **PHP** and **SQL** as if it were just one language.
To call an SQL function in PHP simply call it like a PHP function on **R::$f**.
$f is short for 'function' and we mean SQL function here. Here are some examples:

<?php code('
//executes and returns result of: SELECT NOW();
$time = R::$f->now();
');?>

Besides simple SQL functions like **now()** you can build queries that blend
perfectly with your PHP code. This is useful for writing complex dynamic queries.
This technique allows you to **share queries among functions and methods** just like
a query builder does. The only difference is, you don't need to learn a new syntax,
it's plain old SQL!

```php
R::$f->begin()
->select('*')->from('bean')
->where(' field1 = ? ')->put('a')->get('row');
```

This PHP code is the equivalent of:

```php
SELECT * FROM bean WHERE field1 = 'a'
```

There are just a couple of rules.

First, you must begin a **PHP-SQL** query that is longer than just one
SQL function with the **begin()** method. This method prepares the SQL helper for a query. It turns on
capture mode; from that moment on it will postpone execution of the query until it's complete.

Now you can _chain_
SQL statements as PHP function calls. To add a value to the parameter list use **put()**,
finally you must end
the query with **get()**, **get('row')**, **get('col')** or **get('cell')** depending on the desired
return format.
These methods are similar to the default database
adapter methods found elsewhere in RedBeanPHP. Thus get() will return a multidimensional array with each row
containing an associative array (column=>value), while get('row') returns just one such row,
get('col') returns a flat array containing the column values and get('cell') returns a single value.

To add a '(' in a query use: open(), to add a ')' use: close(), like so:

```php
	...->from('table')
	->where(' name LIKE ? OR ')
	->open()->addSQL(' id > ? AND title LIKE ? ')->close()->...

	//produces something like:
	NAME LIKE ? OR ( id > ? AND title LIKE ? )
```

To add a literal piece of SQL use addSQL():

```php
->addSQL(' SELECT DISTINCT title ')
//adds literal SQL snippet
->from('movies')->...

//produces something like:
SELECT DISTINCT title FROM movies

```

Since RedBeanPHP **3.2**: Underscores will be replaced by spaces.

## Nesting Queries

You can also build queries out of multiple nested queries:

```php
->nest($queryBuilder->getNew()
	->begin()->select(' id ')->... etc

```

Simply use the getNew() method to obtain a new instance of the query builder
using the same adapter as the current one. Then wrap this query in the nest() method
of the parent query. The SQL and parameters of the nested query will be added to the
parent query.

Nesting query builders has been implemented as of version 3.4

RedBeanPHP will not generate portable SQL for you.
The RedBeanPHP Query Builder has been designed
to share queries among functions without having to deal
with strings, not to generate database agnostic SQL.

## Next: Lists

By now, you know how to perform
<abbr title="Create Retrieve Update Delete">CRUD</abbr> and find beans,
you probably want to learn to map relations among
beans. In RedBeanPHP relations are mapped using _lists_.
Instead of thinking about _tables_ and _fields_
you just put beans in a list and they will belong to the owner of the list. This is similar to
what is known as '**one-to-many**' or '**1-N**' but easier.
[Read more about
relational mapping using lists.](/adding_lists "Learn about one-to-many relations in RedBeanPHP")

<category>Relation Mapping</category>

# Adding Lists

Relational mapping in RedBeanPHP is done using lists.
For instance let's say we have a village and buildings. The buildings belong to the village,
so the village 'owns' buildings. This is a **one-to-many** relationship because we have **ONE**
village that has **MANY** buildings. In RedBeanPHP this is an **own-list**:

```php
$village = R::dispense('village');
list($mill,$tavern) = R::dispense('building',2);

//replaces entire list
$village->ownBuilding = array($mill,$tavern);

R::store($village);
```

Now, the _mill_ and _tavern_ buildings belong to the village. In the database,
RedBeanPHP will add a **village_id** field to the **building** table, pointing
to the village record the building belongs to.

An own-list always bears the name of the **type** of beans it contains:
**ownBuilding** only contains beans of type 'building', **ownPage** contains
pages etc..

Adding the same building to another village causes the other village to steal
the building! This is because the own-list contains only beans exclusively owned
by the owner bean. That makes sense because it's an one-to-many relationship,
not a many-to-many relationship.

Once stored, lists will be retrieved the
moment you access the property (we call this **lazy loading**). To retrieve all the buildings in a village:

```php
$village = R::load('village',$id);
$buildings = $village->ownBuilding;
```

To **add** a building to an existing own-list use:

```php
//add a building
$village->ownBuilding[] = $building;
```

to replace all buildings in an own-list:

```php
$village->ownBuilding = array( $building1, $building2 );
```

The buildings are keyed by their database **IDs**.
So to replace a bean:

```php
$village->ownBuilding[$id] = $house;
```

To delete a building from the list use unset()...

```php
unset($village->ownBuilding[$someID]);
R::store($village);
```

## Dependencies

By default if you remove a bean from a list the connection will be broken (in case of a shared list the
intermediate bean is also deleted) but the referenced bean will remain
in the database. If you want RedBeanPHP to remove beans for you that have been removed from lists use:

```php
R::dependencies(array('page'=>array('book','magazine')));
//will now also destroy the page.
unset($book->ownPage[$id]);
```

Note that you can only call this method once. If you call it for a second time it will replace the
previous dependency list. Also, you can't use this method to remove the constraints in the database; this
have to be done manually.

From RedBeanPHP **3.2** on making beans dependent on other beans will also add an **ON CASCADE DELETE** trigger on the
corresponding foreign key.

## Ordering and Limiting Lists (3.3+)

Imagine you have a shelf with books. To obtain the books from the shelf you can use
the own-list: $shelf-&gt;ownBook. Sometimes you want to modify this list; ordering the
books in the list for instance. To do this you can add a little SQL like this:

```php
$books = $shelf->with(' ORDER BY title ASC ')->ownBook;
```

To limit the number of books in the list:

```php
$books = $shelf->with(' LIMIT 10 ')->ownBook;
```

To filter:

```php
$books = $shop->withCondition(' price < 50 ')->ownBook;
```

A with() or withCondition() method triggers a reload of the list,
even if the query has not changed.

withCondition() and with() have been added in version 3.3

## Adhoc parameter binding (3.4+)

From 3.4 on you can also bind parameters in these SQL snippets:

```php
$books = $shop->withCondition(' price < ? ',
	array($price))->ownBook;
```

## In other words&hellip;

The own-list is the RedBeanPHP implementation of one-to-many relations.
Many-to-one relations are implemented using so-called
[parent beans](/parent_object "Learn about many-to-one relations, aka parent beans.").

# Shared Lists

Consider the following example concerning a strategy game:
An army can defend one or more villages. Thus an army can belong to many villages, _or
do the villages belong to the army?_ In any case, this is an example of a
**many-to-many** relationship. Many villages can be associated with many armies.
In RedBeanPHP we describe this kind of relation with a **shared-list**.

```php
$army = R::dispense('army');
$village->sharedArmy[] = $army;
$village2->sharedArmy[] = $army;
```

Now both villages have the **same** army. Once again the name of the shared list
property needs to match the type of bean it stores. In the database, RedBeanPHP will
make a link table **army_village** to associate the armies with their villages.

## The other end of the beans&hellip;

Which villages does an army belong to? To answer this question use:

```php
$myVillages = $army->sharedVillage;
//or.. R::related($army,'village');
```

For the rest, shared lists work just like [own-lists](/adding_lists "Adding Lists").
For instance, just like own lists, shared lists can be filtered using withCondition() and sorted or limited
using with().

## Filtering by link (3.5)

Unlike own lists, you can filter a shared lists by their linking beans.
For instance if we want to obtain all villages that our army defends:

```php
$villages = $army->withCondition(' army_village.action = ? ',
	array('defend'))->sharedVillage;
```

## Access the link bean

To access the links between an army and its villages:

```php
$links = $army->ownArmyVillage;
//Prior to 3.4 use: ownArmy_village
```

Once you have obtained a link you can add additional properties:

```php
$link->action = 'defend';
```

## Additional properties (3.4)

To add additional properties to a relation you can add the
shared beans using the link() method like this:

```php
$village->link('army_village',
	array('action'=>'defend'))->army = $army1;
```

This will not just associate the army and the village but also
qualify the relation by adding the property 'action' to the relationship.
Instead of an array you may also use a JSON string:

```php
$village->link('army_village',
	'{\"action\":\"defend\"}')->army = $army1;
```

Sometimes N-M relations are hidden in concepts (or we could argue
that N-M relations are hidden concepts).
For instance, if you have a bean called visit that has both
an army and a village you can use this bean as a link table associating
armies and villages.
To use regular tables as link tables, just rename the
association:

```php
$village->link('visit',
	'{\"action\":\"defend\"}')->army = $army1;

R::store($village);

//returns armies linked in visit table
$armies = $village->via('visit')->sharedArmy;

//access the visit information
$visit = $army->ownVisit;

//or...
$village->ownVisit;
```

Instead of via(), you can also use R::renameAssociation, this method also accepts an associative array instead of just
single values. The via() method is an alias for renameAssociation since 3.5.

## In other words&hellip;

Shared lists are the RedBeanPHP way of saying: 'many-to-many'.

# Parent Object

We previously discussed the own-list. This is RedBeanPHP's version
of a **one-to-many** relationship. However, if we look from the other end
of the relationship we have a **many-to-one** relationship: many buildings
belong to **one** village. Suppose you are working on this end
of the relationship; you have a building, how can you access its village?

```php
$village = $building->village;
```

We call this the _parent bean_.
The term _'parent'_ may be confusing but on the other hand it clearly indicates that
on the other side the bean is part of a _list_ **owned** by another bean.

You can unset the parent bean like this:

```php
unset($building->village);

$building->village = null;
```

Trying to assign something other than a bean to a parent object field will
throw an exception:

```php
//throws a RedBeanPHP Security exception
$building->village = 'Lutjebroek';
```

Once a property has been used to store a bean, it can only be
used to store a bean afterwards.

## The Reserved Column

While RedBeanPHP uses the **village_id** column to refer to the actual
related record, the **village** property of the bean will be used to
return the village bean (_a magic getter_). This means that both the
**village_id** and **village** columns are actually **reserved** for the relation mapping.
_Please_, do <u>not</u> use a column with the **same name as the magic getter** (&quot;village&quot; in this case)
for a different purpose. In RedBeanPHP terms this is called the _'reserved'_ column.

## In other words&hellip;

Parent beans are the RedBeanPHP way of saying: 'many-to-one'.

# Counting beans

In version 3.5 and higher you can count related beans like this:

```php
$numPages = $book->countOwn('page');
```

This also works for shared lists:

```php
$numProjects = $member->countShared('project');
```

And with conditions:

```php
$numProj = $member
		->withCondition(' member_project.role ', array('lead'))
		->countShared('project');

$numPages = $book
		->withCondition(' book_page.number > ? ', array(100))
		->countOwn('page');
```

The first line in the code block above counts all projects in which
$member participates as a leader. The second example counts all pages
in book $book after page number 100.

Relation counts also play nice with aliases and via:

```php
$shop->via('relation')->countShared('customer');

$Andy->alias('coAuthor')->countOwn('book');
```

The first line in the code block above counts all customers
for shop $shop using link type: relation. The second line
counts all books written by Andy as a co-author.

Note that 'coAuthor' will be converted to co_author - the
canonical name of the property.

# Eager loading

Preloading/Eager loading requires RedBeanPHP version 3.3+

If you know in advance that you need some parent beans you can inform RedBeanPHP about this
to avoid unnecessary queries:

```php
$books = R::find('book');
R::preload($books,array('author'));
foreach($books as $book) echo $book->author;
```

Here RedBeanPHP will **NOT** query each author separately. Instead, the preload() will attach
all author beans upfront. Preload also understands aliases:

```php
$books = R::find('book');
R::preload($books,array('coauthor'=>'author'));
foreach($books as $book) echo $book->coauthor;
```

## More powerful preloader

These power-user features require RedBeanPHP version 3.4+

From version 3.4+ on you can preload multiple parents like this:

```php
$texts = R::find('text');
//to preload page, book and author parents:
R::preload($texts,'page,page.book,page.book.author');
//or use the short-syntax:
R::preload($texts,'page,*.book,*.author');
```

To retrieve the parent of a previous parent you can use the '*'.
If you would like to retrieve a parent bean on the same level as the previous parent
in the list use '&amp;' instead.

```php
$p = R::find('page');
//preloads page->book, page->book->author
//and page->book->shelf
R::preload($p,'book,*.author,&.shelf');
```

Note that both 'shelf' and 'author' are parents of book. Therefore
we prefixed the '.shelf' with an &amp; and not an '*'. If we would have used the
latter, preload() would have tried to fetch page-&gt;book-&gt;author-&gt;shelf which
does not exist of course.
To preload lists:

```php
$books = R::find('book');

R::preload($books,'ownPage|page,sharedGenre|genre');

foreach($books as $book) {
	print_r($book->ownPage);
}
```

Preloading is embedded in the syntax of RedBeanPHP, for instance instead of
using an ugly foreach-loop, RedBeanPHP can make your code more
elegant by preparing the preloaded beans for you as arguments of a closure
(requires PHP 5.3):

```php
R::each($texts,'page,*.book',
function($text,$page,$book){
	...no ugly foreach-loop...
});
```

R::each is exactly the same as R::preload. The difference is just stylistic.
If you use the closure variant I recommend to use **'each'** to highlight the
iteration.

Since RedBeanPHP 3.4.1 you can use with() conditions in preloading like this:
'ownBook'=&gt;array('book',' AND category = ? ',array($category)) - i.e. simply replace
the string 'book' for an array containing:

1. the type string

2. the SQL snippet you want to use and

3. the parameter bindings

Please be aware that these snippets are embedded in the query that retrieves all records
so adding LIMIT clauses will cause undesirable results.

# Aliasing

Normally, a property that contains a bean needs to be **named after it's type**.
We have seen this with parent objects; to access the village a building belongs to, you
just read the

```php
$building->village
```

property.
90% of the time this is _exactly_ what you need.
A parent object can be **aliased** though.

When dealing with people you often have to store persons using a _role name_.
For instance, two people are working on a science project. Both people are in fact
'person' beans. However one of them is a _teacher_ and the other is a _student_.

```php
list($teacher,$student) = R::dispense('person',2);
$project->student = $student;
$project->teacher = $teacher;
```

RedBeanPHP will store both the student and the teacher as persons because
RedBeanPHP simply **ignores** the property name when saving.
RedBeanPHP stores the student and the teacher both as person beans and
the project table will get two fields:
_teacher_id_ and _student_id_ pointing to the respective person records.
However when you
_retrieve_ the project from the **database**, you need to
to tell RedBeanPHP that a student or teacher is in fact a **person**. To do so,
you have to use the **fetchAs()** function:

```php
$teacher = $project->fetchAs('person')->teacher;
```

## Aliased Lists (3.3+)

To get a list of all projects associated with a certain person, in the role
of a student (aliased as student) use:

```php
$person->alias('student')->ownProject;
```

Note that some functions do **not** support
aliased properties; most notably R::dependencies() and R::exportAll().
Also, aliased names are cached, a list won't reload if prefixed with an
alias() method. In version 3.5+ the list will reload if the alias has changed though.

Aliased lists have been added in version 3.3

## In other words&hellip;

Aliasing is the RedBeanPHP way of saying 'one-to-X'.

# Trees

RedBeanPHP also supports **self-referential** **one-to-many** and **many-to-many** relationships.
In RedBeanPHP terminology these are called trees. Here is an example, let's decorate a christmas tree with some
candy canes:

```php
$cane = R::dispense('cane',10);
$cane[1]->ownCane = array( $cane[2], $cane[9] );
$cane[2]->ownCane = array( $cane[3], $cane[4] );
$cane[4]->ownCane = array( $cane[5],
			$cane[7], $cane[8] );
$cane[5]->ownCane = array( $cane[6] );
$id = R::store($cane[1]);
$root = R::load('cane',$id);
echo $root->ownCane[2]->ownCane[4]
	->ownCane[5]->ownCane[6]->id;
//outputs: 6
```

In fact trees are just a special case of lists.

## Traversal (3.5+)

To get **all** parents of a bean:

```php
$page->searchIn('page');
```

You can also insert **SQL snippets**:

```php
$page->withCondition( ' user_id = ? ', array( $me->id ) )
	->searchIn( 'page' );
```

You can search for beans in own-lists as well:

```php
$page->withCondition(' content LIKE ? ', array( $content ) )
	->searchIn( 'ownPage' );
```

The searchIn() method also supports fetchAs, via and alias.
For instance the following code searches all projects that
belong to Linda in the role of 'teacher' (alias).

```php
$linda->withCondition(' subject = ? ', array( 'math' ) )
	->alias( 'teacher' )
	->searchIn( 'ownProject' );

```

While searchIn() is a powerful tool, there are some limitations.
It does not support shared lists and ordering does not work as you expect
(because the recursive filtering it is not possible to use SQL to order the
entire result set). Also note that this method can be slow for large trees.

## In other words&hellip;

A Tree is the RedBeanPHP version of a self-referential relationship.

# Enums and more

An enum type is a special bean that enables for a property to be a set of predefined values.
To use an ENUM:

```php
$tea->flavour = R::enum( 'flavour:english' );
```

The ENUM method will do a lot of work here. First it checks whether there exists
a type of bean with a property name set to 'ENGLISH'. If this is the case, enum() will
return this bean, otherwise it will create such a bean, store it in the database and
return it. This way your ENUMs are created on the fly - properly. To compare an
enum value:

```php
$tea->flavour->equals( R::enum('flavour:english') );
//stores ENGLISH in the database... UPPERCASE!
```

To get a list of all flavours, just omit the value part:

```php
$flavours = R::enum('flavour');
```

To get a comma separated list of flavours you might want to combine
this method with other Label Maker methods:

```php
echo implode( ',', R::gatherLabels( R::enum('flavour') ) );
```

Since RedBeanPHP enums are beans you can add other properties as well.

The enum() method has been added in RedBeanPHP version 3.5

## Other relations

Most of the time you use one-to-many and many-to-many relations.
As of 3.4 RedBeanPHP offers **limited** (mostly to enable you to
communicate with legacy databases more easily) support for other relations as well.

## One-to-one

One-to-one relations are not used frequently. Traditional 1-1 records are
linked by their primary keys. In RedBeanPHP you can load them like this:

```php
list($author,$bio) = R::loadMulti('author,bio',$id);
```

This loads an author and a biography with the same ID.
You need to make sure the IDs are in sync yourself, you can use
transactions for this. Note that real one-to-one relations are rare and
most of the time they represent legacy records. Also consider using
a simple own-list instead of a real one-to-one or just put the
records in the same table.

One-to-one relations are not very 'RedBeanish'. In RedBeanPHP you would
simply store this information in the same bean.

## Polymorph relations

Relational database are **not** suitable for polymorph relations.
However if you ever need to load a bean of which the type is based on a
field value you can use a slight variation of fetchAs():

```php
$ad = $page->poly('contentType')->content;
```

Returns the bean referred to in content_id using the bean type
specified in content_type. If content type contains the value 'advertisement'
the content will be a bean with type 'advertisement' and id = content_id.

Don't try to use new polymorph relations with poly(), RedBeanPHP does not
support polymorph relations. This method has been added to ease loading
existing polymorph relations only.  Use poly() to retrieve polymorph data
from an external or legacy database.

# Tags

Tags are often used to categorize or group items into meaningful groups.
To tag a an item:

```php
R::tag( $page, array('topsecret','mi6') );
```

To **fetch all tags** attached to a certain bean we use the same method but without the tag parameter:

```php
$tags = R::tag( $page ); //returns array with tags
```

To **untag** an item use

```php
R::untag($bean,$tagListArray);```

To get all beans that have been tagged with $tags, use **tagged()**:

```php
R::tagged( $beanType, $tagList );```

To find out whether beans have been tagged with specific tags, use **hasTag()**:

```php
R::hasTag($\bean, $tags, $all=false)```

To **add tags** without removing the old ones:

```php
R::addTags( $page, array('funny','hilarious') );
```

To get beans that have ALL these tags: (since 3.2)

```php
//must be tagged with both tags
R::taggedAll( $page, array('funny','hilarious') );
```

# Cheatsheet

If you are new to RedBeanPHP but you have been working with
relational databases in the past you might be a bit confused with the
terminology in RedBeanPHP. Here is a little 'cheatsheet' mapping
relational terms to RedBeanPHP terms. You might find this useful.

<table class="matrix">
<thead>
	<tr><th>Relation</th><th>RedBeanPHP method</th></tr>
</thead>
<tbody>
	<tr><td>one-to-one        </td><td>R::loadMulti('author,bio', 1)<sup>[1]</sup></td></tr>
	<tr><td>one-to-many       </td><td>$author-&gt;ownBook[] = $book</td></tr>
	<tr><td>many-to-one       </td><td>$book-&gt;author = $author</td></tr>
	<tr><td>many-to-many      </td><td>$book-&gt;sharedCategory[] = $category</td></tr>
	<tr><td>one-to-many self-referential</td><td>$category-&gt;ownCategory = $category</td></tr>
	<tr><td>many-to-many self-referential</td><td>$category-&gt;sharedCategory = $category</td></tr>
	<tr><td>one-to-X          </td><td>$book-&gt;fetchAs('author')-&gt;coauthor = $coAuthor;</td></tr>
	<tr><td>X-to-one          </td><td>$author-&gt;alias('coauthor')-&gt;ownBook;</td></tr>
	<tr><td>many-to-many + properties</td><td>$book-&gt;link('category_book', array('location'=&gt;'2nd floor'))-&gt;category = $category<sup>[2]</sup></td>
	<tr><td>polymorph         </td><td>$eBook = $book-&gt;poly('media_type')-&gt;media<sup>[3]</sup></td></tr>
</tbody>
<tfoot>
	<tr><td colspan="2"><sup>1</sup>This is a very uncommon relation. You can also use One-to-many plus a unique constraint for this.</td></tr>
	<tr><td colspan="2"><sup>2</sup>You can also rename this association and use access shared lists using via() (3.5+).</td></tr>
	<tr><td colspan="2"><sup>3</sup>Kind of defeats the purpose of a relational database though because you cannot use foreign keys now.</td></tr>
</tfoot>
</table>

While RedBeanPHP is perfectly capable of managing almost any
kind of relationship, I recommend to keep things simple.
Most of the time the basic relations like one-to-many, many-to-one, self-referential relations and many-to-many will do.
Sometimes I use one-to-X and X-to-one (aliasing). Personally I never use one-to-one or polymorph, these are
extremely uncommon.

<category>Models</category>

# Models and FUSE

A **model** is a place to put validation and business logic.
Although you can put validations in your controller that would require you to
copy-and-paste it whenever you need it. So putting validation and business logic
into a central place saves you a lot of work. Models are connected to beans
using **FUSE**. The best thing about FUSE is that you don't have to write any
code to connect a bean to a model. FUSE will make sure every bean finds its model
automatically.

Imagine a Jazz band that accepts just 4 members, in this case
we need to add a validation rule 'no more than 4 band members'.
We could add this rule to the controller:

```php
if (count($_post['bandmembers'] > 4) ...
```

But like I said, we need to copy this code to every controller
that deals with band members.
Now let's define a
band model to see how this works with FUSE:

```php
class Model_Band extends RedBean_SimpleModel {
	public function update() {
		if (count($this->ownBandmember)>4) {
			throw new Exception('too many!');
		}
	}
}
```

This model contains an **update()** method. FUSE makes sure that the update() method will get invoked
as soon as we try to store the bean:

```php
$band = R::dispense('band');
$musicians = R::dispense('bandmember',5);
$band->ownBandmember = $musicians;
R::store($band);
```

This code will trigger an exception because it tries to add too many band members to the band.
As you can see, the model is automatically connected to the bean; we store the bean using R::store() and
update() is called on a populated instance of Model_Band. Just like update there are several other hooks:

If you use PHP namespaces and your model resides in namespace \Models simply add the following constant
on top of your code:

define( 'REDBEAN_MODEL_PREFIX', '\\Models\\' );

(supported since 3.5)

<table>
	<thead><tr><th>Action on bean</th><th>Invokes method on Model</th></tr></thead>
	<tbody>
		<tr><td>R::store</td><td>$model-&gt;update()</td></tr>
		<tr><td>R::store</td><td>$model-&gt;after_update()</td></tr>
		<tr><td>R::load</td><td>$model-&gt;open()</td></tr>
		<tr><td>R::trash</td><td>$model-&gt;delete()</td></tr>
		<tr><td>R::trash</td><td>$model-&gt;after_delete()</td></tr>
		<tr><td>R::dispense</td><td>$model-&gt;dispense()</td></tr>
	</tbody>
</table>

To demonstrate the order and use of all of these methods let's consider
an example:

```php
$lifeCycle = '';
class Model_Bandmember extends RedBean_SimpleModel {
	public function open() {
	   global $lifeCycle;
	   $lifeCycle .= \"called open: \".$this->id;
	}
	public function dispense(){
		global $lifeCycle;
		$lifeCycle .= \"called dispense() \".$this->bean;
	}
	public function update() {
		global $lifeCycle;
		$lifeCycle .= \"called update() \".$this->bean;
	}
	public function after_update(){
		global $lifeCycle;
		$lifeCycle .= \"called after_update() \".$this->bean;
	}
	public function delete() {
		global $lifeCycle;
		$lifeCycle .= \"called delete() \".$this->bean;
	}
	public function after_delete() {
		global $lifeCycle;
		$lifeCycle .= \"called after_delete() \".$this->bean;
	}
}
$bandmember = R::dispense('bandmember');
$bandmember->name = 'Fatz Waller';
$id = R::store($bandmember);
$bandmember = R::load('bandmember',$id);
R::trash($bandmember);
echo $lifeCycle;
```

output:

```php
called dispense() {\"id\":0}
called update() {\"id\":0,\"name\":\"Fatz Waller\"}
called after_update() {\"id\":5,\"name\":\"Fatz Waller\"}
called dispense() {\"id\":0}
called open: 5
called delete() {\"id\":\"5\",\"band_id\":null,\"name\":\"Fatz Waller\"}
called after_delete() {\"id\":0,\"band_id\":null,\"name\":\"Fatz Waller\"}
```

## $this

In the model, $this is bound to the bean. As is $this-&gt;bean.

## Boxing

RedBeanPHP **3.2** offers $bean->box and $model->unbox() to easily switch between models and beans.
For instance if you have a bean $band, to box it use: $modelBand = $band->box(); This also works the other way
around; if you have a model $band and you want to obtain the bean, use $bean = $band->unbox();

## Using namespaces

If you use PHP native namespaces you can adjust the model mapping to load
your models from the
[desired namespace](/how_fuse_works#namespaces "Learn more about using RedBeanPHP ORM models with PHP namespaces").

# How Fuse Works

Fuse adds an event listener (Observer pattern) to the RedBeanPHP object database.
If an event occurs it creates an instance of the model that belongs to the bean.
It looks for a class with the name Model_**X** where **X** is the type of the bean.
If such a model exists, it creates an instance of that model and calls loadBean(), passing the bean.
This will copy the bean to the internal bean property of the model (defined by the superclass [SimpleModel]).
All bean properties will become accessible to $this because FUSE relies on magic getters and setters.

![](img/fuse.jpeg)

## Remapping models

By default RedBeanPHP maps a bean to a model using the Model_**X** convention where **X** gets replaced by the
**type** of the bean. You can also provide your own mapper, here is how:

<?php
echo code("
$formatter = new MyModelFormatter;
RedBean_ModelHelper::setModelFormatter($formatter);
```

Here we tell RedBeanPHP to use the MyModelFormatter class to find the correct bean-to-model mapping.
This class looks like this:

<?php
echo code("
class MyModelFormatter implements RedBean_IModelFormatter {
	public function formatModel($model) {
		return $model.'_Object';
	}
}
```

This class will make sure that a bean of type 'coffee' will be mapped to Coffee_Object instead of Model_Coffee.

## Namespaces

RedBeanPHP uses Poor man's namespacing, not the PHP backslash namespaces.
However if you want to use models in a PHP backslash namespace you can remap the Model Formatter
like this:

```php
class MyModelFormatter implements RedBean_IModelFormatter {
		public function formatModel($model) {
				return '\\\'.'Models'.'\\\'.$model;
		}
}
$formatter = new MyModelFormatter;
RedBean_ModelHelper::setModelFormatter($formatter);

```

This example will load Models from the Models namespace.

In RedBeanPHP 3.5 the space.php script will append this code (NSModelFormatter)
for you to the namespaced file.

In formatModel() use func_get_arg(1) to obtain the bean as well. (since RedBeanPHP 3.1)

## Setting the bean in a Model

Sometimes you want FUSE to work the other way around. You call a **static method** on a model
and you want to set a bean in the model manually.
To accomplish this set the reference to the model as a meta property:

```php
$this->bean = R::dispense('bean');
$this->bean->setMeta('model',$this);
```

Now, the bean will be connected to the current Model instance.

## $this

In the model, $this-&gt;bean refers to the bean. You can access the real bean using $this->bean from inside a model.
If a property does not exist $this-&gt;$property will return a the property, but it will not return a reference to lists
so I recommend to always use $this-&gt;bean-&gt;$property if you want to access $property of the bean in your model.

# Fuse Custom Method

FUSE does not only support hooks like [update() and delete()](/models_and_fuse "Learn how to use Models and FUSE"). You can also call
a **non-existent** method on a bean and it will fire the corresponding method on the model.

```php
class Model_Dog extends RedBean_SimpleModel {
		public function bark() {
				echo 'Whaf!';
		}
}

$dog = R::dispense('dog');
$dog->bark(); //echos 'Whaf!'
```

Learn how you can write Models that automatically connect to be beans using [FUSE](/models_and_fuse "Learn about FUSE").

# Dependency Injection

RedBeanPHP **3.2** and higher supports [Dependency Injection](http://martinfowler.com/articles/injection.html "What is DI?").
Dependency Injection is a way to keep your models free from dependencies, reducing [coupling](http://en.wikipedia.org/wiki/Loose_coupling "Loose Coupling").
Here is how DI works in RedBeanPHP:

```php
//Dependencies
class Dependency_Coffee {}
class Dependency_Cocoa {}

//The model that needs these things
class Model_Geek extends RedBean_SimpleModel {
private $cocoa;
private $coffee;
public function setCoffee(Dependency_Coffee $coffee) {
	$this->coffee = $coffee;
}
public function setCocoa(Dependency_Cocoa $cocoa) {
	$this->cocoa = $cocoa;
}
public function getCoffee() {
	return $this->coffee;
}
..same for cocoa..
}
```

First, we need to tell RedBeanPHP we would like to use DI. RedBeanPHP ships with a very
decent injector which can be extended
 if necessary:

```php
$di = new RedBean_DependencyInjector;
RedBean_ModelHelper::setDependencyInjector( $di );
```

Now, add the services to your injector:

```php
$di->addDependency('Coffee',new Dependency_Coffee);
$di->addDependency('Cocoa',new Dependency_Cocoa);
```

That's all. Let's get our caffeinated geek!

```php
$geek = R::dispense('geek');
$coffee = $geek->getCoffee(); //returns the coffee
```

This is how dependency injection in RedBeanPHP 3.2 and higher works. If you need even more
flexibility you can override the getModelForBean( $bean ) method in the Bean Helper, this method
returns the model for the bean. Here you can bootstrap your own dependency injector. In this method
you can call RedBean_ModelHelper::factory($modelName) to obtain a model (and it's dependencies).

<category>Database</category>

# Schema

RedBeanPHP generates a sane and readable database **schema** for you.
Here are the schema **conventions** used by RedBeanPHP:

<table>
<tr><td>Field names:</td><td>Lowercase a-z, 0-9 and underscore (_)</td></tr>
<tr><td>Table name:</td><td>Should match bean type, a-z, 0-9</td></tr>
<tr><td>Primary key:</td><td>Each table should have a primary key named 'id' (int, auto-incr)</td></tr>
<tr><td>Foreign key:</td><td>Format: &lt;TYPE&gt;_id</td></tr>
<tr><td>Link table:</td><td>Format: &lt;TYPE1&gt;_&lt;TYPE2&gt; sorted alphabetically</td></tr>
</table>

Be careful with underscores; they are used for linking tables and foreign keys. It's safe to use
underscores in property names, but try not to use them in type names/tables.

## Schema functions

To obtain the name of the table of a bean:

```php
$bean = R::dispense('book');
$beanTable = $bean->getMeta('type');
```

To get all the columns in this table:

```php
$fields = R::inspect('book');
```

To get all tables:

```php
$listOfTables = R::inspect();
```

In RedBeanPHP 3.4 and earlier use R::$writer-&gt;getTables() and R::writer-&gt;getColumns($type).

# Multiple databases

There are two important methods to keep in mind when working with multiple **databases**.
To add a new database connection use R::addDatabase()

```php
R::addDatabase('DB1','sqlite:/tmp/d1.sqlite',
	'user','password',$frozen);
```

To select a database, use the key you have previously specified:

```php
R::selectDatabase('DB1');
```

If you used **R::setup()** to connect to your database you can switch back to this database
using:

```php
R::selectDatabase('default');
```

# Transactions

RedBeanPHP offers three simple methods to use database **transactions**: begin(), commit() and rollback().
A transaction is a **unit of work** performed within a database management system (or similar system) against a database, and treated
in a coherent and reliable way independent of other transactions. To **begin** a transaction use R::begin(), to **commit** all changes to the
database use R::commit() and finally to **rollback** all pending changes and make sure the database is left untouched use R::rollback().
Usage:

<?php

echo code("
R::begin();
try{
	R::store($page);
	R::commit();
}
catch(Exception $e) {
	R::rollback();
}
```

The RedBeanPHP transactional system works exactly like conventional database transactions. Because RedBeanPHP throws **exceptions**, you can catch
the exceptions thrown by methods like R::store(), R::trash(), R::associate() etc, and perform a rollback(). The rollback() will completely undo
all the pending database changes.

If you are new to transactions, consider reading about
[database transactions](http://en.wikipedia.org/wiki/Database_transaction "transactions") first.

## Note about auto-commits

Many databases automatically commit after changing schemas, so make sure you test your transactions after **R::freeze(true);** !

As of version 3.4 transactions will no longer work in fluid mode.
This has been implemented because in fluid mode the schema gets
updated frequently causing transactions to auto-commit or
throw errors.

## Transaction closure

As of RedBeanPHP version 3.4 you can also use R::transaction() and
simply pass a closure like this:

```php
R::transaction(function(){
	..store some beans..
});
```

The transaction() method also supports nested transactions.

# Nuke

The R::nuke() command just does what you think it does. It **empties** the entire database.
This is really useful for testing purposes. R::nuke() only works in fluid mode to prevent any
damage. Usage:

```php
R::nuke();
```

Like other nuclear tools, nuke() should be used with care.

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

<category>Project</category>

# FAQ

## Why do you use so much static functions? What about coupling?

That's only the Facade. Behind the facade you will find a
landscape of elegant classes, see the
[API](/api "API documentation")
for advanced usage/more information.
The **API** closely resembles the interface
of the facade class.

## Is it wrong to use the static facade functions?

If you're not planning to swap frameworks regularly you can rely on
the easy-to-use static facade functions like **R::dispense()** and
**R::load()** etc. People often complain about static methods but in
reality many of those so-called pure **OOP** style projects
tend to become heaps of powerless miniature objects
and countless wirings. I don't believe that works very well.

## Why does RedBeanPHP not protect me from race conditions?

Because I believe the best way to prevent race conditions
is to use database **transactions**. RedBeanPHP offers simple
functions to use transactions: R::begin(), R::commit() and
R::rollback(). All you need to do is bundle your related queries
together in a transaction by wrapping them in a begin-commit block.
Not familiar with transactions yet?
Read about [Transactions on Wikipedia](http://en.wikipedia.org/wiki/Database_transaction) or
[
read this discussion on StackOverflow](http://stackoverflow.com/questions/2808794/does-a-transaction-stop-all-race-condition-problems-in-mysql "ACID").

## Why is RedBeanPHP one file? Isn't that bad practice?

RedBeanPHP is distributed as one file to ease
installation and deployment. The build script called **Replica** compiles
the RedBeanPHP class files to one file.
So in reality, RedBeanPHP is not one file, read more
about [Replica](/replica "Read more about building your own RedBeanPHP!").

## How active is RedBeanPHP?

RedBeanPHP is being developed quite actively by me and
the RedBeanPHP community.

## Why don't you implement my feature request?

Depends. RedBeanPHP is being developed in a very careful way.
I try to keep RedBeanPHP clean yet comfortable. It's tempting to
implement lots of features but that would make RedBeanPHP bloated.
Feel free to write your own plugin or fork the project.

## Is RedBeanPHP Lightweight?

You can use Replica to strip all modules and plugins you don't need.
The default distribution is not bloated but you can compile
a lighter RedBeanPHP by using the Replica build tool.

## Why does RedBeanPHP not support custom table mapping (anymore)?

The idea of RedBeanPHP is to generate a useable and queryable
schema based on your code and without any configuration.
Custom table mappings don't fit very well in this model.
However there are other reasons as well. Many so called
power features like deep-copy have to make assumptions about database
layout and table naming conventions. They can of course use
some kind of configuration file to figure things out, but hey the whole
idea of RedBeanPHP was **NOT** to use configuration!

## Why does RedBeanPHP not provide a portable query language?

I do not believe in portable query languages or database independent query
builders. The whole point of selecting a database is to
choose the system that provides the most useful features.
A portable query language by definition can't use
database specific features, so you simply get the worst of all.
Just dare to choose your the database system that fits the best for the
task at hand.

## Why are underscores and uppercase chars not allowed in type and property names?

Underscores ARE allowed in property names, just not in type names.
RedBeanPHP uses underscores to denote relationships among beans.
Uppercase characters cause problems on different operating system platforms.
These characters have one further disadvantage; because programmers like me are
often lazy, they get overused to form ambiguous words. The English vocabulary
is quite big and you should better be creative and find the best word for
the concept your bean or model describes. For instance; instead of
&quot;user_project&quot; or &quot;ProjectUsr&quot; you can use &quot;participant&quot;. This makes your
database prettier and easier to read as well.

Note that RedBeanPHP 3.4+ supports so-called beautiful column names, this will turn camelCased column names in underscored_column_names.
You can turn this feature off as well. For more information please consult the RedBeanPHP documentation on how [to create
and store beans](/create_a_bean "Read about creating and storing new bean objects.").

# Roadmap

RedBeanPHP is actively developed by a community of open source
developers. The development cyclus of RedBeanPHP consists of two releases
a year; a spring release and an autumn release. This means every six
months there will be a new version of RedBeanPHP.

*   Spring Beta release: **March**
*   Spring Final release: **April**
*   Autumn Beta release: **September**
*   Autumn Final release: **October**

For actual information about the upcoming (beta) release visit the
[beta
testing pages](/beta_testing "Help us test the latest beta release!").

## Upcoming versions

RedBeanPHP is quite mature and stable. All features necessary have been implemented and even
more features are implemented using the plugin architecture - however we don't want RedBeanPHP
to become bloated. For the next version of RedBeanPHP we are considering features like
improved support of Composer and namespaces. Feel free to discuss feature requests on our
[forum](https://groups.google.com/forum/?fromgroups#!forum/redbeanorm "Discuss the future of RedBeanPHP!").

For details concerning **versioning** guidelines of RedBeanPHP take a look at the
[versioning page](/versioning "Learn more about RedBeanPHP versioning").

# Versioning

RedBeanPHP uses a very sane version numbering system. The version number tells you something about the version; it has meaning.
All RedBeanPHP versions have a version number. The version number consists of three parts; major, minor and point release.

<kbd>
Version X.X.X
</kbd>

Meaning:

<kbd>
Version MAJOR.MINOR.POINT
</kbd>

## Major version

When the major version number increases, this means the new version is **NOT** backward compatible with
all previous versions. Most of the time this means you better not use it in your current project if you are already
using RedBeanPHP or you might have to make some changes to the project to make it work with the new version of RedBeanPHP.
This is not always as bad as it sounds. For instance version 3 is not backward compatible with version 2, but only if you use
the optimizers (which by default are turned off). So while this is a major version bump it's actually not that bad.
However, while difference between 2 and 3 is relatively small, the gap between 1 and 2 was a really big one. Anyway
whenever the major version number changes make sure you check the [changelog](/changelog "Check the changelog after a release.") to determine whether you can upgrade or not.

## Minor version

A minor version change means new **features**! Minor versions don't break backward compatibiltity, they just mean new features
have been added. Often, this goes hand in hand with changes in documentation or **bugfixes**. Therefore it's relatively
**safe**
to do a minor upgrade. Be sure though to check the changelog on the website. You might be able to take
advantage of the new features!

## Point version

A point version or point release happens when the last digit has been increased. Note that although you might assume
a digit normally varies from 0-9, you might encounter minor and point releases like X.X.12 or X.30.X. Not sure if this will
happen, however as RedBeanPHP matures you will see less major upgrades and more minor upgrades and point releases.
A point release version is normally a maintenance version. This may include bugfixes, new tests, documentation changes or
just some code cleanup. While it's always a good idea to scan the changelog most of the time you can be pretty sure
there are no compatibility issues nor interesting new feature. Of course if you have reported an issue the point release can
be quite interesting because the bug might have been fixed. In this case, the Github bug report number and the fix will
be mentioned in the changelog.

Where is RedBeanPHP **heading**? Take a look into the crystal ball, peek into the future on the
[RedBeanPHP roadmap](/roadmap "Upcoming features in the object relational mapper").

For actual information about the **latest** beta testing for RedBeanPHP ORM for PHP, consult the
[beta testing page](/beta_testing "Help us test the new beta version of RedBeanPHP ORM for PHP").

# Beta Testing

Welcome to the **Beta Testing** section of the RedBeanPHP ORM site.
Help us test the latest beta version of RedBeanPHP.
We need your help to deliver the best **ORM** tool ever!
Without your feedback it is very difficult to create a high quality product.
Join the community, let us know what you think about **RedBeanPHP** **ORM**
for **PHP** and how
it can be improved. You can provide feedback using the _comments system_ on this website
or using the
[forum](https://groups.google.com/forum/?fromgroups#!forum/redbeanorm "Forum"), or the
[Github repository issue tracker](https://github.com/gabordemooij/redbean/issues?direction=desc&sort=created&state=open "Issue tracker on Github").

RedBeanPHP 3.5 Beta 6 is here!
Download
[RedBeanPHP 3.5 Beta 6](downloads/RedBeanPHP3_5beta6.tar.gz "Download the latest beta").
and start testing the new RedBeanPHP !

## Changes in RedBeanPHP 3.5

*   DONE - added [R::inspect()](/schema "Inspect method") replaces ugly R::$writer-&gt;methods().
*   DONE - [R::beansToArray](/import_and_export#toarray "Turn a list of beans into an array")
*   DONE - Refactored glueSQLCondition method, added tests
*   DONE - Improved support for named parameters
*   DONE - Graph() now hardcoded in facade, no need for replica (easy for Composer)
*   DONE - TimeLine log() now hardcoded in facade, no need for replica (easy for Composer)
*   DONE - Removed sync() and R::unrelated()
*   DONE - Automatically switches to utf8mb4 if MySQL/MariaDB version higher &gt;= 5.5
*   DONE - [ENUMs](/enums_and_more "Learn about RedBeanPHP ENUM")
*   DONE - [Tree traversal](/trees#traversal "Searching trees with RedBeanPHP!")
*   DONE - Filter shared items by [link conditions](/shared_lists#linkfilters "Use withCondition() to filter by linking criteria")
*   DONE - [Via()](/shared_lists#via "Read more about Via method") - alias for R::renameAssociation
*   DONE - [Count related beans using countOwn and countShared](/counting_beans "Learn how to use countOwn and countShared")
*   DONE - [Model Formatter](/how_fuse_works#nsmodel "Namespaced models") support PHP namespaces out-of-the-box
*   DONE - READ SUPPORT for UUIDS (primary key no longer cast to integer)
*   DONE - [White list](/beancan_server#whitelist "Protect your API with the whitelist") for BeanCan Server
*   DONE - [BeanCan Server 2](/rest_server "Learn about the new REST-like BeanCan Server"): REST-like routes
*   DONE - Improve performance sharedList
*   DONE - Improve query readability
*   DONE - Improve notation Preloader, use 'ownPage|page' instead of 'ownPage'=&gt;'page'
<li>DONE - [Cheatsheet / relational matrix](/cheatsheet "Cheatsheet for relational mapping")

For details concerning **versioning** guidelines of RedBeanPHP take a look at the
[versioning page](/versioning "Learn more about RedBeanPHP versioning").

Where is RedBeanPHP **heading**? Take a look into the crystal ball, peek into the future on the
[RedBeanPHP roadmap](/roadmap "Upcoming features in the object relational mapper").

# Changelog

<style>
table { margin-bottom: 50px; }
table th:nth-child(1) { width: 200px; }
</style>

## 2013-06-12: V 3.4.7

*   DONE - Database name now visible in exception string.
*   DONE - getCell now returns NULL instead of an empty array in case of an exception.
*   DONE - Added static method for Null flag in Cooker to fix a test case.

## 2013-05-23: V 3.4.6

*   DONE - Backward compatibility fix: re-added getProperties() in Bean class.

## 2013-05-15: V 3.4.5

*   DONE - [isChanged](https://github.com/saetia/redbean/commit/8139ddc19b3d93468ad164695df68a291a867b25 "View issue on Github") now also returns true if change to NULL.

## 2013-05-09: V 3.4.4

*   DONE - Send along error code with [connect](https://github.com/gabordemooij/redbean/issues/262 "See issue").

## 2013-04-29: V 3.4.3

*   DONE - Fixed Stash cache

## 2013-04-11: V 3.4.2

*   DONE - Fixed typo

## 2013-04-05: V 3.4.1

*   DONE - Added possibility to [add SQL to ownList and sharedList in Preloader](/eager_loading#sql "Read more about Preloading with SQL")

## 2013-04-01: V 3.4

<ul>
<li>DONE - [Beautification](/create_a_bean#beau "Beautiful column names") of column names</li>
<li>DONE - Basic support for [1-1 and polymorph](/enums_and_more "misc. relations") relations</li>
<li>DONE - Integrate [SQLHelper](/adding_lists#adhoc_binding "adhoc parameter binding") and with() withCondition()</li>
<li>DONE - Easy way to [add properties](/shared_lists#additional_properties) to a shared relation</li>
<li>DONE - Easy way to use [R::preload()](/eager_loading#preload34) for nested beans</li>
<li>DONE - Renewed Support for [spatial types](/create_a_bean#datatypes)</li>
<li>DONE - [Query Writer Cache](/query_cache "Query Cache")</li>
<li>DONE - Make Facade thinner (Harmonize APIs)</li>
<li>DONE - [$bean-&gt;old('property');](/tainted "Old properties") - Read previous value (3.3.4)</li>
<li>DONE - [$bean-&gt;hasChanged('property'); (3.3.4)](/tainted "Changed bean properties")</li>
<li>DONE - [$bean-&gt;isTainted();](/tainted "isTainted") - shorthand for getMeta('tainted') (3.3.4)</li>
<li>DONE - Advanced [exportAll](/import_and_export#export34)</li>
<li>DONE - MySQL boolean type now uses BOOLEAN columns</li>
<li>DONE - Transactions will be disabled in fluid mode to suppress errors due to schema changes</li>
<li>DONE - R::transaction(closure);</li>
<li>DONE - SQL Helper integration one step further: $bean-&gt;with($sqlBuilderQuery)...</li>
<li>DONE - Moved sync() and timeline() out of all-in-one package</li>
<li>DONE - Added PostgreSQL types: line segments, circles and money</li>
<li>DONE - [nest](/mixing_sql_and_php#nesting "Read more about nesting queries in the query builder") query builders in the query builder.</li>
<li>DONE - Removed escaping method from adapter</li>
<li>DONE - Refactored escaping</li>
<li>DONE - Added -- keep-cache in SQL to instruct writer cache to keep cache even if query is non-read</li>
<li>DONE - Lots of code formatting</li>
<li>DONE - Cleaned up documentation now using references to avoid duplicate comments</li>
</p>

## 2012-11-16: V 3.3.7

*   DONE - Fixed: Cant store initial literal 1.0 value

## 2012-11-16: V 3.3.6

*   DONE - Fixed bug empty beans in R::preload()
*   DONE - Fix minor issue cache loader with id 0

## 2012-11-01: V 3.3.5

*   DONE - Fixed bug in R::preload()
*   DONE - Harmonized Facade (preload and configure) for advanced users

## 2012-10-11: V 3.3.4

*   DONE - Removed support spatial data types.

## 2012-10-11: V 3.3.3

*   DONE - Performance improvement (schema cache) for [Duplication and Export](/import_and_export#speed_up_dup).

## 2012-10-05: V 3.3.2

*   DONE - Fixed SQLite buildcommand-issue. [See issue on Github.](https://github.com/gabordemooij/redbean/pull/203 "Build command issue for Unique in SQLite")

## 2012-10-04: V 3.3.1

</p>

*   DONE - setAttr() does not taint bean. [See issue on Github.](https://github.com/gabordemooij/redbean/issues/201 "Bean Can issue fix")
</p>

## 2012-10-01: V 3.3

*   DONE - Fixed ID-0 issue in BeanCan Server.[See issue on Github.](https://github.com/gabordemooij/redbean/issues/199 "Bean Can issue fix")
*   DONE - Added eager loading for parent beans.[R::preload(...)](/parent_object#preloading "Learn about eager loading")
*   DONE - OCI/Oracle fixes
*   DONE - Tests for bean inject()
*   DONE - Improvements documentation and clean up
*   DONE - Backward compatibility switch for keyed exports: RedBean_OODBBean::setFlagKeyedExport()
*   DONE - $bean->with() now also reloads the list, can now be used multiple times
*   DONE - Beans now accept DateTime objects (convert to string)
*   DONE - Keyless export
*   DONE - Filtered export
*   DONE - [Order and filter own-lists](/adding_lists#ordering "the with() modifier")
*   DONE - Aliased lists
*   DONE - Benchmarking
*   DONE - Support for Oracle Database (plugin Writer) (thanks Stephane)
*   DONE - [Replica: Extend R-facade with plugins](/replica#replica_and_plugins "Read more about building RedBeanPHP with Replica XML")
*   DONE - [Replica: 'flavours'](/replica#flavours "Learn how to assemble your own ORM package with Replica Flavours")
*   DONE - Composer Support
*   DONE - [R::syncSchema()](/multiple_databases#sync "Read the SyncSchema documentation.") easy way to sync databases
*   DONE - New Cache plugin
*   DONE - Tag caching
*   DONE - Polymorphism: associate($bean,$mixedTypes)
*   DONE - Display errors in fluid-debug mode
*   DONE - BeanCan server: [added export method](/beancan_server "BeanCan Server")
*   DONE - Introduction strict type checking
*   DONE - Improved Dependency Injection (3.2.1)
*   DONE - Integer fix CUBRID writer (3.2.2)
*   DONE - Database Writers optional for unit testing, depending on ini config
*   DONE - Added [$bean->setAttr($property,$value)->...; chainable](/create_a_bean#chain "Read about chainable setters.")*   DONE - Added $bean->unsetAll($properties)->...; chainable*   DONE - Now uses SPLExceptions (requires PHP >= 5.1)
*   DONE - Added index-precheck to avoid redundant index creation Exceptions
*   DONE - Fix index check

2012-06-27 - RedBeanPHP 3.2.3:

<table>
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Fix</td><td>Fixed issue causing some columns not to get indexed</td></tr>
</tbody>
</table>

Note: this update might cause so duplicate indexes, please check your database after
freezing and remove redundant indexes (use the less specific/shortest index).

2012-06-21 - RedBeanPHP 3.2.2:

<table>
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Fix</td><td>Fixed issue with large integers in CUBRID driver</td></tr>
</tbody>
</table>

2012-05-01 - RedBeanPHP 3.2.1:

<table>
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Change</td><td>added CUBRID to replica.xml</td></tr>
<tr><td>Fix</td><td>Fixed naming convention details for CUBRID driver</td></tr>
</tbody>
</table>

2012-05-01 - RedBeanPHP 3.2:

<table >
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Feature</td><td>[Boxing and Unboxing beans](http://www.redbeanphp.com/models_and_fuse)</td></tr>
<tr><td>Feature</td><td>[R::findAll()](http://www.redbeanphp.com/finding_beans) to eliminate queries like R::find('**1** ORDER BY ..);</td></tr>
<tr><td>Feature</td><td>R::find() should accept a Query Helper object as well</td></tr>
<tr><td>Feature</td><td>[TimeLine plugin](http://www.redbeanphp.com/schema) (Schema altering log), R::log()</td></tr>
<tr><td>Feature</td><td>[R::dependencies()](http://www.redbeanphp.com/adding_lists) changes foreign key constraints to cascade on delete</td></tr>
<tr><td>Feature</td><td>[CUBRID](http://www.cubrid.org/) [driver](http://www.redbeanphp.com/compatible)</td></tr>
<tr><td>Feature</td><td>Postgres geometrical types</td></tr>
<tr><td>Feature</td><td>R::isoDate and R::isoDateTime</td></tr>
<tr><td>Feature</td><td>SQLHelper queries may contain spaces</td></tr>
<tr><td>Feature</td><td>[Chill Mode](http://www.redbeanphp.com/freeze)</td></tr>
<tr><td>Feature</td><td>R::related($array,'page'); get multiple many-to-many at once</td></tr>
<tr><td>Feature</td><td>FUSE [Dependency injection](http://www.redbeanphp.com/dependency_injection "Learn about DI")</td></tr>
<tr><td>Feature</td><td>Support for BIG INT primary keys</td></tr>
<tr><td>Feature</td><td>Added R::taggedAll($type,$taglist) to find all beans having all tags in $taglist</td></tr>
<tr><td>Feature</td><td>Added DuplicationManager and TagManager, no API changes</td></tr>
<tr><td>Feature</td><td>Adapter now has clear error reporting</td></tr>
<tr><td>Feature</td><td>Input validation R::related</td></tr>
<tr><td>Feature</td><td>Store() and Trash() now also accept models</td></tr>
<tr><td>Fix</td><td>Dup() no longer taints the bean</td></tr>
<tr><td>Fix</td><td>reset capture mode in SQLHelper</td></tr>
<tr><td>Fix</td><td>Refactored OODB to improve testability</td></tr>
<tr><td>Fix</td><td>R::close() now resets connection flag properly</td></tr>
</tbody>
</table>

2011-10-01 - RedBeanPHP 3.1:

<table>
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Feature</td><td>R::storeAll($beans)</td></tr>
<tr><td>Feature</td><td>R::trashAll($beans)</td></tr>
<tr><td>Feature</td><td>Support for Postgres datetime</td></tr>
<tr><td>Feature</td><td>R::close() - closes database connection</td></tr>
<tr><td>Feature</td><td>Model_Formatter getModelName($model,$bean) now gets a bean</td></tr>
<tr><td>Feature</td><td>R::dispenseLabels($list)</td></tr>
<tr><td>Feature</td><td>R::gatherLabels($beans)</td></tr>
</tbody>
</table>

RedBeanPHP 3.0.4:

<table>
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Fix</td><td>Fixed issue in R::dup() Nullifying Ids after preloaded lists</td></tr>
</tbody>
</table>

RedBeanPHP 3.0.3:

<table>
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Fix</td><td>Fixed issue in R::dependencies()</td></tr>
</tbody>
</table>

RedBeanPHP 3.0.2:

<table >
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Feature</td><td>R::dependencies(...)</td></tr>
</tbody>
</table>

RedBeanPHP 3.0.1:

<table>
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Fix</td><td>Fixed issue in R::dup()</td></tr>
</tbody>
</table>

RedBeanPHP 3.0:

<table >
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Feature</td><td>Support for [special, DB specific data types](/special_types) like DATE, DATETIME and SPATIAL types</td></tr>
<tr><td>Feature</td><td>[Mix](/mixing_sql_and_php) SQL with PHP</td></tr>
<tr><td>Feature</td><td>New Test Architecture</td></tr>
<tr><td>Feature</td><td>Find() works with PostgreSQL without the need for first argument as WHERE</td></tr>
<tr><td>Feature</td><td>R::graph($requestArray) - directly from facade</td></tr>
<tr><td>Feature</td><td>A little REST support in BeanCan Server (more will follow)</td></tr>
<tr><td>Feature</td><td>R::dup() - replaces copy, makes a deep copy of a bean, properly and without storing.</td></tr>
<tr><td>Feature</td><td>new R::exportAll, exports all own-list, automatic recursion protection</td></tr>
<tr><td>Feature</td><td>relaxed interface model formatter</td></tr>
<tr><td>Feature</td><td>you can now unset parent objects using $bean->parent = null/false</td></tr>
<tr><td>Feature</td><td>R::graph() has 2nd parameter to filter empty beans</td></tr>
<tr><td>Feature</td><td>$bean->isEmpty(), returns TRUE if all the properties are empty</td></tr>
<tr><td>Feature</td><td>R::graph() now throws exceptions in case of unexpected structure</td></tr>
<tr><td>Fix</td><td>FALSE is stored as 0 in SQLite now</td></tr>
<tr><td>Fix</td><td>Unrelated no longer triggers error when there are no associations at all</td></tr>
<tr><td>Fix</td><td>R::findOne now returns NULL instead of FALSE - seems more appropriate</td></tr>
<tr><td>Fix</td><td>Removed 3rd param in Exception to avoid issues with PHP 5.2 and earlier</td></tr>
<tr><td>Removed</td><td>Optimizers</td></tr>
<tr><td>Removed</td><td>Old cooker (now in plus-pack)</td></tr>
<tr><td>Removed</td><td>R::setupMultiple() - use R::addDatabase() instead</td></tr>
<tr><td>Removed</td><td>R::relatedOne() - use R::related() instead</td></tr>
<tr><td>Removed</td><td>Facade Helper - never going to work: features for OO purists</td></tr>
<tr><td>Removed</td><td>Legacy Tag API - the explode() hell</td></tr>
<tr><td>Removed</td><td>R::copy</td></tr>
<tr><td>Removed</td><td>By default Bean Exporter plugin no longer loaded, not in all-in-one</td></tr>
<tr><td>Removed</td><td>**Bean Formatter** you can NO LONGER customize database schema (because it breaks things)</td></tr>
<tr><td>Removed</td><td>**R::view()**</td></tr>
</tbody>
</table>

RedBeanPHP 2.2.3:

<table >
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Fix</td><td>Fixed issue [FUSE models dont process nested beans](https://github.com/gabordemooij/redbean/issues/106 "issue 103")</td></tr>
<tr><td>Fix</td><td>Added data type LONG TEXT for MySQL</td>
</tbody>
</table>

RedBeanPHP 2.2.2:

<table >
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Feature</td><td>R::$adapter->getAffectedRows() [now also works with get()](https://github.com/gabordemooij/redbean/issues/104 "issue 104")</td></tr>
<tr><td>Fix</td><td>Fixed incompatibility issue [lcfirst](https://github.com/gabordemooij/redbean/issues/103 "issue 103") for PHP 5.2</td></tr>
</tbody>
</table>

RedBeanPHP 2.2.1:

<table >
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Fix</td><td>Fixed minor issue with indirect modification of nested beans. (issue #100)</td></tr>
</tbody>
</table>

RedBeanPHP 2.2:

<table>
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Feature</td><td>Added R::nuke() - nukes entire database</td></tr>
<tr><td>Feature</td><td>Added R::prefix('cms_') - installs table prefix in one command</td></tr>
<tr><td>Fix</td><td>Cleaned whitespaces</td></tr>
<tr><td>Fix</td><td>Removed some old unused code</td></tr>
<tr><td>Fix</td><td>Fixed uppercase issue in PostgreSQL View Driver</td></tr>
<tr><td>Fix</td><td>Fixed issue in old 1.3 style Cooker concerning 0-values (empty-check)</td></tr>
<tr><td>Fix</td><td>Fixed explicit aliasing issue for old SQLite versions (midnightmonster/patch-1)</td></tr>
</tbody>
</table>

RedBeanPHP 2.1.1 contains a 'change of mind'. Changed default action of foreign keys from NO ACTION to SET NULL. This has the following
advantages:

1. People not interested in FKs will not be bothered by intigrity violations.

2. People interested in FKs have the opportunity to configure them at one moment; the right moment: when leaving fluid mode.

3. Development scenarios and cleaning actions don't interfere with foreign keys.

4. Uncommon scenarios will not clash with foreign keys as well (these are likely in fluid mode, import scripts, tests etc).

RedBeanPHP 2.1 is a minor release and contains some new features as well as some bugfixes. Here is a list. Note that
this release IS backwards compatible with RedBeanPHP 2.

<table >
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Feature</td><td>Added R::genSlots($arr) - generates slots for array</td></tr>
<tr><td>Feature</td><td>Added $bean-&gt;exportToObj( $obj ) - will add the bean properties to $obj</td></tr>
<tr><td>Feature</td><td>Added R::exportAllToObj( $beans, $classname ) - will add the bean properties to instances of $classname</td></tr>
<tr><td>Feature</td><td>Added R::exportAll($beans,TRUE); - will export beans recursive (for use with EXTJS for instance)</td></tr>
<tr><td>Feature</td><td>Added RedBean_Exporter class, for more control over recursive exports</td></tr>
<tr><td>Feature</td><td>Added R::addTags() - adds tags without removing the old ones (thanks to Palicao)</td></tr>
<tr><td>Fix</td><td>Fixed an issue in SQLite that prevented columns in tables with custom ID fields to be widened</td></tr>
<tr><td>Fix</td><td>Removed triggers from SQLite, now uses foreign key constraints</td></tr>
<tr><td>Fix</td><td>Foreign key constraints will now be created correctly for tables with multiple keys as well</td></tr>
<tr><td>Fix</td><td>Fixed an issue that prevented the use of camelCase in own- and shared- properties (still not recommended, bad practice)</td></tr>
<tr><td>Fix</td><td>Fixed some issues in documentation</td></tr>
<tr><td>Fix</td><td>Fixed an issue concerning own/shared property and trash/delete hook (#90)</td></tr>
</tbody>
</table>

## New in 2.0

**RedBeanPHP 2.0** makes <abbr title="Object Relational Mapping">ORM</abbr> even easier and more fun! RedBeanPHP 2.0 has been released on
August 1 and contains the following improvements:

<table>
<tr><td>Support for [N:1 relations](/nested_bean "nested beans")</td></tr>
<tr><td>On-the-fly [Views](/views "views")</td></tr>
<tr><td>Improved [Tag](/tags "tags") API</td></tr>
<tr><td>Automatic constraints to keep link tables clean</td></tr>
<tr><td>Automatic foreign key generation</td></tr>
<tr><td>New and improved Form Cooker</td></tr>
<tr><td>Bean2JSON when casting a bean to a string</td></tr>
<tr><td>New flexbible architecture</td></tr>
<tr><td>Clean up (less than 100KB now!)</td></tr>
<tr><td>Many other improvments, bugfixes and tests&hellip;</td></tr>
</table>

For actual information about the **latest** beta testing for RedBeanPHP ORM for PHP, consult the
[beta testing page](/beta_testing "Help us test the new beta version of RedBeanPHP ORM for PHP").

For details concerning **versioning** guidelines of RedBeanPHP take a look at the
[versioning page](/versioning "Learn more about RedBeanPHP versioning").

Where is RedBeanPHP **heading**? Take a look into the crystal ball, peek into the future on the
[RedBeanPHP roadmap](/roadmap "Upcoming features in the object relational mapper").

# Upgrade 3.4 to 3.5

Welcome to the RedBeanPHP ORM upgrade guide for upgrading from version 3.4 to version 3.5.
	RedBeanPHP 3.5 is a minor release, this means that it's almost backward compatible with previous
	releases in the 3-series. However even in a minor release there might be minor incompatibilities
	because the product has to move forward. This chapter describes the minor backward compatibilities
	and how to deal with them.

## Unrelated method removed

The R::unrelated() method has been removed. This method had become quite problematic because
the architecture could not be cleanup up because of this method. Also, this method has
nothing to do with object relational mapping anyway - it was a feature request during a period
in which I was less critical. Well, it's gone now. If you have some code depending on this
method you'll have to write a query.

## Internal select method removed

The internal select() method in writers has been removed. Nobody should have used this
internal method anyway.

## Plugin Sync removed

This plugin is still available in other branches and work as expected however I do
not consider this core functionality.

# Upgrade 3.3 to 3.4

Welcome to the RedBeanPHP ORM upgrade guide for upgrading from version 3.3 to version 3.4.
RedBeanPHP 3.4 is a minor release, this means that it's almost backward compatible with previous
releases in the 3-series. However even in a minor release there might be minor incompatibilities
because the product has to move forward. This chapter describes the minor backward compatibilities
and how to deal with them.

## No more escaping

RedBeanPHP 3.4 no longer has an $adapter-&gt;escape() / $database-&gt;Escape() method.
RedBeanPHP has always offered parameter binding and parameter binding has always been the
preferred way to write queries. The escape methods therefore have been confusing and
might lead to SQL injection because people don't know how to use them. Parameter binding
is much more safe and this is why I have decided to remove the escape() methods completely.
If you have code that relies on the escape() methods please rewrite this code to use
parameter binding, it makes your code safer and more consistent. If you insist on using
escaping instead of parameter binding you can still use the underlying PDO instance for this:
[R::$adapter->getDatabase->getPDO()->quote();](http://php.net/manual/en/pdo.quote.php "PDO quote() documentation").

## TimeLine and Sync

RedBeanPHP has grown a little fat. Therefore I removed two plugins from the main distribution; namely
TimeLine and Sync. Since they are only useful to some people I figured they can just as well remain on
github. You can compile them into rb.php yourself using
[Replica](http://www.redbeanphp.com/replica "read more about Replica") the RedBeanPHP build tool.

## Extra Cooker flag

The Cooker (R::graph()) - a tool in RedBeanPHP to quickly turn entire array hierarchies in bean hierarchies and
store them in the database will now throw an exception if you want to load a bean (by providing an id). You can turn this
off using: RedBean_Plugin_Cooker::enableBeanLoading(true);

## Uppercase characters

Formally RedBeanPHP never allowed the use of uppercase chars in properties. However this was always easy to
circumvent if you knew how. In RedBeanPHP 3.4 uppercase characters will be used to generate 'beautiful' column names.
For instance, a property called 'singleMalt' will result in a column single_malt. The reason why RedBeanPHP never
allowed uppercase chars (and still does not allow) is because this tends to cause inter-operating system issues as
well as fundamental cross database issues (some OSes and database engines are case sensitive while others are not).
However like I said the restriction was easy to circumvent if you studied the API carefully. In RedBeanPHP 3.4
You'll have to turn off the beautifier to use circumvent the restriction using: RedBean_OODBBean::setFlagBeautifulColumnNames(false);
Of course, I still recommend not to do this. Instead I hope you enjoy the beautiful underscore-columns, generated by the
'beautifier'.

## No more SET(1) in MySQL

From now on RedBeanPHP will use **BOOLEAN** (TINYINT 1) as the default column for boolean values instead of
**SET(1)**. This has been done to make the behaviour across database platforms more consistent. Also
SET(1) columns have some issues regarding **NULL** because they either represent 1 or NULL (or empty)
while **TINYINT(1)** can
respresent **NULL**, **TRUE (1)** and **FALSE (0)**. Unfortunately none of the database platforms has a good boolean column type
(actually Postgres has a real boolean value but it's too strict and required a cast for every comparison).
Therefore I feel TINYINT or INTEGERS are the best way to represent booleans given the current state of database
platforms.

# Upgrade 3.2 to 3.3

Welcome to the RedBeanPHP ORM upgrade guide for upgrading from version 3.2 to version 3.3. This guide
describes possible issues when upgrading from release 3.2 to version 3.3.
RedBeanPHP 3.3 is a minor release and offers new functionality. For the most part this release
is backward compatible. You should be able to migrate your projects with ease. However there are some
minor incompatible changes. These are discussed on this page.

## Strict Bean Types

From 3.3 on bean types may only contain alphanumeric characters. The underscore is no longer
allowed. The reason for this is that in RedBeanPHP the underscores signifies a relationship between
two types; for instance 'product_shop' is recognized as a relational bean or link table representing
the relation between a product and a shop. The strict typing feature can be overridden easily by issueing:

```php
R::setStrictTyping(false);
```

## Keyless export

From 3.3 on, the bean export behaviour has become more consistent. Prior to 3.3 when you performed
an export on a bean the lists would be returned as arrays indexed by the IDs. This is very problematic
for Javascript to work with because it creates NULL entries for intermediate entries which is bad for
performance and just ugly. On the other hand exportAll() never did this. In RedBeanPHP 3.3 this has changed.
All exports now return keyless lists. If you need to old bahviour use:

```php
RedBean_OODBBean::setFlagKeyedExport(true);
```

With the new keyless exports I hope to increase the consistency throughout the library and
improve support for more Javascript oriented development strategies.

## Plugins

In RedBeanPHP 3.3 plugin functions no longer have hard coded facade methods. For instance the Cooker plugin
provides a method R::graph(). This method still exists, but only in R. Not in the facade RedBean_Facade.
These plugin extensions of R are now compiled into the R-class by the Replica Build Script. If you use these
methods on the facade class itself you should replace this code using a find replace action on your project.

# License

## New BSD License

Copyright &copy; 2009-<?php echo date('Y');?> Gabor de Mooij and the RedBeanPHP community
All rights reserved.

Redistribution and use in source and binary forms are permitted
provided that the above copyright notice and this paragraph are
duplicated in all such forms and that any documentation,
advertising materials, and other materials related to such
distribution and use acknowledge that the software was developed
by the RedBeanPHP Community.  The name of the
University may not be used to endorse or promote products derived
from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED ``AS IS'' AND WITHOUT ANY EXPRESS OR
IMPLIED WARRANTIES, INCLUDING, WITHOUT LIMITATION, THE IMPLIED
WARRANTIES OF MERCHANTIBILITY AND FITNESS FOR A PARTICULAR PURPOSE.

## Disclaimer

THIS SOFTWARE IS PROVIDED BY Gabor de Mooij ''AS IS'' AND ANY
EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL Gabor de Mooij BE LIABLE FOR ANY
DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

<category>Tools</category>

# Replica

Replica is the build script for RedBeanPHP. The _all-in-one package_ on the homepage has been
built using Replica.

Using Replica you can build your own all-in-one PHP file. Replica reads the **replica.xml**
file which contains a list of files to be added to the _rb-file_. The
_R-facade class_ is dynamically
generated by Replica.

This is what a line in the **replica.xml** file looks like:

<?php code('
<item type="php">RedBean/Logger.php</item>
');?>

This line will instruct Replica to add the PHP file **RedBean/Logger.php** to the
package.

To run replica type:

<kbd>
php replica.php
</kbd>

Replica will tell you which files are included in the build:

<kbd>
Adding: RedBean/license.txt
</kbd>

Afterwards, you will find the all-in-one file in your directory:

<kbd>
rb.php
</kbd>

## Flavours (version 3.3+)

It's possible to not generate just one but several all-in-one packages, all containing
different collections of php files. These additional versions are called flavours. To add
a php file to a 'flavour' called 'oci' we can use:

<?php code('
<item type="php" flavour="oci">RedBean/QueryWriter/Oracle.php</item>
');?>

This line will add the Oracle driver to the **rboci.php** file. This file has the same
contents as **rb.php** but with the addition of the Oracle.php file.

Replica will report about flavour specific items:

<kbd>
Adding: RedBean/QueryWriter/Oracle.php to flavour: oci
</kbd>

And after running Replica you will see two builds in your directory:

<kbd>
rb.php

rboci.php
</kbd>

## Replica and Plugins (version 3.3+)

Plugins can add static methods to the R facade class. To do so, a plugin has to add
a comment containing the **@plugin** section. What comes after the word **@plugin**
will be inserted into the _R-facade class_.

For instance, consider the imaginary plugin _'CSVImport'_. If we add the line:

<?php code('
// @plugin public static function CSV($file){ ... }
');?>

And we include an entry to the XML configuration:

<?php code('
<item type="php" >RedBean/Plugins/CSVImport.php</item>
');?>

then we can now use the method:

<?php code('
$beans = R::CSV($file);
');?>

Which allows us to dynamically add methods to the _R-facade class_.

# BeanCan Server

BeanCan is a PHP class that can act as a backend server for **Javascript** centered web applications
(**JSON-RPC 2.0** compliant). In a JS based web application your views and controllers are written in client-side Javascript while your
[models](/models_and_fuse "Models and FUSE") are still stored on the server.
BeanCan acts as bridge between the client side javascript views and controllers on the one hand and the server side models on the other.

BeanCan makes use of [FUSE](/models_and_fuse "What is FUSE?"). This means that you can send 4 types of commands to the BeanCan Server:

<table>
<thead>
	<tr>
		<th>Command:</th>
	</tr>
</thead>
<tbody>
	<tr><td>load</td></tr>
	<tr><td>export (since 3.3)</td></tr>

	<tr><td>store</td></tr>
	<tr><td>trash</td></tr>
	<tr><td>custom </td></tr>
</tbody>
</table>

Requests **1-5** are handled automatically by RedBeanPHP.
This means you can **store/delete/load** any bean automatically if you connect to the bean server without ***any*** effort.
If you send an unrecognized command, FUSE tries to locate the model and passes the request. Time for examples...

From version 3.3 on you can use 'export'. Export works the same as 'load' but returns an entire bean hierarchy instead of just
one bean.
<p>
**Request #1:** The following request returns a page with ID 1:

<?php jcode('
{
"jsonrpc":"2.0",
"method":"page:load",
"params":[1],
"id":"myrequestid"
}
');?>

**Request #2:** The following request creates a new page and returns its new ID:

<?php jcode('
{
"jsonrpc":"2.0",
"method":"page:store",
"params":[{"body":"lorem ipsum"}],
"id":"myrequestid"
}
');?>

**Request #3:** The following request changes the text of page 2:

<?php jcode('
{
"jsonrpc":"2.0",
"method":"page:store",
"params":[{"body":"welcome","id":2}],
"id":"myrequestid"
}
');?>

**Request #4:** This example request deletes page with ID 3:

<?php jcode('
{
"jsonrpc":"2.0",
"method":"page:trash",
"params":[3],
"id":"myrequestid"
}
');?>

**Request #5:** executes **$page-&gt;mayAccess( $ip )** and returns the result. FUSE will connect automatically to the Model_Page class to accomplish this.

<?php jcode('
{
"jsonrpc":"2.0",
"method":"page:mayAccess",
"params":[ ipAddress ],
"id":"myrequestid"
}
');?>

The BeanCan server returns **JSON** reponses like this (created page and returns ID):

<?php jcode('
{
"jsonrpc":"2.0",
"result":"8",
"id":"myrequestid"
}
');?>

In case of an error:

<?php jcode('
{
"jsonrpc":"2.0",
"error":{"code":"-32603","message":"Invalid request"},
"id":"myrequestid"
}
');?>

## Full Example

Here is a full [example](/downloads/beancan.txt "Take a look at this example"). It is a todo list
written in **Javascript** and **PHP** using the BeanCan Server.

## Whitelist

To prevent API users from accessing all beans you can use a white list:

```php
$server->setWhitelist(array(
	'candy' => array('store', 'like')
));
```

This example will only allow you to store candy beans and invoke the custom method 'like'.
Other beans and other methods will not be accessible.
To turn off the white list and allow full access:

```php
$sever->setWhitelist('all');
```

Not familiar with JSON-RPC ? Take a look at: [JSON-RPC specification](http://jsonrpc.org/spec.html "Learn more about JSON-RPC").

# REST server

In RedBeanPHP 3.5 you can use the new Resty BeanCan Server. The Resty BeanCan server
makes it easy to make a REST-like API.
To create a Resty BeanCan Server:

```php
$can = new RedBean_Plugin_BeanCanResty;
```

## Whitelist

The first thing to do is to tell RedBeanPHP what methods are allowed per type.
To allow users to perform GET and POST but not PUT and DELETE actions for books use:

```php
$can->setWhitelist(array(
	'book' => array(
		'GET', 'POST'
	)
));
```

For testing purposes, you might want to allow everything:

```php
$can->setWhitelist('all');
```

## GET request

The Resty BeanCan Server works with a reference bean. For instance a $user.
To access or modify a resource you simply pass the path relative to the user and you pass the
(HTTP) method:

```php
$can->handleREST($user, 'book/2', 'GET');
//returns array('result' => array( $property => $value ) )
```

This will retrieve the own list of the $user and load the book with ID 2. Note that this method will
fail if no such book exists in the list. By default, the Resty Can searches in the own list, to search
in the shared list, prefix your list with 'shared-':

```php
$can->handleREST($user, 'site/3/page/4/shared-ad/2', 'GET');
```

This will retrieve ad 2 on page 4 of site 3.

## PUT request

To add a new page:

```php
$can->handleREST($user, 'site/3/page', 'PUT', array(
	'bean' => array(
		'title' => 'my new page'
	)
)); //returns array('result'=>array('id' => 1))
```

## POST request

To update page 4:

```php
$can->handleREST($user, 'site/3/page/4', 'POST', array(
	'bean' => array(
		'title' => 'changed title'
	)
));
```

## DELETE request

To delete page 4:

```php
$can->handleREST($user, 'site/3/page/4', 'DELETE');
```

## GET request for lists

<p>
To get a list of pages:

```php
$can->setWhitelist(array('page'=>'GET')); //you need access to PAGE!
$can->handleREST($user, 'site/3/page/list', 'GET');
```

You can predefine SQL snippets:

```php
$can->setWhitelist(array('page'=>'GET')); //you need access to PAGE!

$sql = array('page'=>array(
	' page.number > ? ', array(3)
));

//for shared pages use 'shared-page' as key!

$can->handleREST($user, 'site/3/page/list', 'GET', array(), $sql);
```

## Custom requests

The BeanCan server also accepts non-rest methods, these will invoke methods on
models connected to beans (FUSE):

```php
$resp = $can->handleREST($user,
	'site/'.$site->id.'/page/'.$page->id,
	'mail', array('param'=>array('me')));

//calls $page->mail('me');
```

## Return values

The handleRest() method returns
an array with an error key or a result key. This allows you to do
your own post-processing, i.e. convert to JSON or XML.
If an error occurs, you get an array like this:

```php
array(
	'error'=> message,
	'code' => code
)
```

If you want to return beans in a custom REST method, use
[R::beansToArray()](/import_and_export#toarray "Returning beans as an array in REST server.").

## Error Codes

The error codes in the response array conform to HTTP error codes:
exceptions generate a 500 code, if the bean is not on the whitelist
you get a 403 code, if the bean cannot be found you get a 404 code other
errors (syntax) return a 400 code.

Don't forget to configure the [whitelist](/beancan_server#whitelist "Learn about the whitelist for all BeanCan Servers.")!

## Legacy REST Server (only get)

This server is now deprecated.
In RedBeanPHP 3.0 the BeanCan server also responds to RESTFul GET requests. To setup a REST server
with beancan:

```php
$server = new RedBean_BeanCan();
$server->handleRESTGetRequest('/book/2'); //returns book with ID 2
$server->handleRESTGetRequest('/book'); //returns books
");

?>

# Namespacer

I don't like PHP namespaces, they have some issues. This [article](http://pornel.net/phpns/ "PHP namespaces are flawed.") by
'Pornel' explains why. There are several reasons why I don't use namespaces in RedBeanPHP:

*   I want RedBeanPHP to be compatible with PHP 5.2 (and sort of compatible with PHP 5.1)
*   I dont want to bother RedBeanPHP users with namespaces, the one-character R::doSomething() formula is quite powerful
*   While I admire the work of the PHP core development team, I feel choosing the '\' symbol was a mistake, it's like introducing **DOS** in **PHP**

Also, I really like **Poorman's namespacing**. In fact, it does the same job as
namespacing... with **no additional syntax**. I **really** like that. _The less syntax the better_.

## Namespacer Script

For those of you who insist on using namespaces,
I have written a small PHP script
for you to _dynamically_ put RedBeanPHP in a namespace:

[Namespace Script](http://www.redbeanphp.com/downloads/namespace.tar.gz "namespacer").

Usage:

<kbd>
php space.php MyNameSpaceForBeans
</kbd>

The command above will put the entire RedBeanPHP library in the
'MyNameSpaceForBeans' namespace. The namespace script will put the resulting PHP code in a file called:

<kbd>
rbn.php
</kbd>

This filename stands for: **R**ed**B**eanPHP with **Namespaces**.
After running this script and including the freshly generated _rbn.php_ file, you can use
the namespaced RedBeanPHP version:

For instance: **R::store** becomes **\MyNameSpaceForBeans\R::store**.

Happy namespacing... ;)

# RedUNIT

**RedBeanPHP** has been tested very well. You can find the test files on github.
The complete set of test files for RedBeanPHP is called RedUNIT. RedBeanPHP has been tested
with PHP Coverage. With version 3.0 RedBeanPHP has reached **99%** test coverage.

To run a unit test pack, type the following command in testing/cli:

<kbd>
./start.sh
</kbd>

This will run the tests. To run all mysql tests (same for Postgres,Sqlite):

<kbd>
./start.sh Mysql
</kbd>

To run a single test package:

<kbd>
./start.sh Base/Graph
</kbd>

Before you run tests yourself you might want to take a look at the
test configuration file config/test.ini

# News Archive

Old news is no news... but for the sake of archiving...

## What happened in before...

<time>2013-06-30</time>: [Improved](https://github.com/gabordemooij/redbean/commit/0205fa8323d2e228dcc4da2dda410921e8be03cd "New N-M bean relation system") retrieval of shared beans so you filter/order by links.

<time>2013-06-23</time>: [Sneak preview](https://github.com/gabordemooij/redbean/commit/dbad985e1cd89bb3ab0e43f6c4846ac37b9f2634 "Take a look at the new count methods in RedBeanPHP 3.5!") of relation counts in RedBeanPHP 3.5!

<time>2013-06-12</time>: Released [version 3.4.7](/changelog "Read changelog") (minor fixes).

<time>2013-05-23</time>: Re-added getProperties method in OODBBean.

<time>2013-05-22</time>: Have been interviewed by [UserError](http://usererror.fi/2013/05/cleaning-up-your-crud/ "Cleaning up your CRUD...").

<time>2013-05-15</time>: Released RedBeanPHP 3.4.5 Minor fix in [isChanged()](https://github.com/saetia/redbean/commit/8139ddc19b3d93468ad164695df68a291a867b25 "View issue on Github").

<time>2013-05-09</time>: Released RedBeanPHP 3.4.4 updated [connect()](https://github.com/gabordemooij/redbean/issues/262 "View details on Github") method to send along proper error code.

<time>2013-05-05</time>: First draft of [BeanCan 2](https://github.com/gabordemooij/redbean/commit/ade919e616e2a745f921b81d71f248b9cf73ee1b "Discover the new RESTful BeanCan server") available on Github.

<time>2013-04-29</time>: RedBeanPHP 3.4.3 fixed issue in internal stash cache.

<time>2013-04-11</time>: RedBeanPHP 3.4.2 fixed a typo

<time>2013-04-05</time>: RedBeanPHP 3.4.1 has been released; added [minor feature](/eager_loading#sql "SQL in Eager Loading").

<time>2013-04-01</time>: RedBeanPHP 3.4 has been released. See [changelog](/changelog "Explore RedBeanPHP 3.4") for details.

<time>2013-03-01</time>: We are currently [beta](/beta_testing "beta") testing RedBeanPHP 3.4. Help us test the new release of RedBeanPHP.

# Old Manuals

Old manuals can be found here:

*   [Previous Additional Manual 3.3](/extra)
*   [Manual RB 2.0](/manual2_0)
*   [Manual RB 1.0](http://redbeanphp.com/community/wiki/index.php?title=Main_Page "Main_Page")
