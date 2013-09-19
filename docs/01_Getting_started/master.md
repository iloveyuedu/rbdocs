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
