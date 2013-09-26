<html>
<head>
<body>




<?php

function code($code){  
	echo '<div class="codeblock">';
	$a = highlight_string('<'.'?php'.$code.'?'.'>',true);
	$a=str_replace('&lt;?php','',$a);
	$a=str_replace('?&gt;','',$a);
	
	
	echo $a;
	echo '</div>'; 
}

function jcode($code){  
	echo '<div class="codeblock" style="padding:10px;background-color:#CCC;color:black;"><pre>';
	echo htmlentities($code);
	echo '</pre></div>'; 
}


?>


<category>Getting started</category>

<h1>Welcome</h1>
<p>
	RedBeanPHP is a <b>lightweight</b>, <b>configuration-less</b> 
	<abbr title="Object Relational Mapper">ORM</abbr> library for PHP.
	Let's look at the code, this is how you do 
	<abbr style="font-weight:bold;" title="Create Retrieve Update and Delete">CRUD</abbr> in RedBeanPHP:
</p>
<?php
code("
	\$post = R::dispense('post');
	\$post->text = 'Hello World';

	\$id = R::store(\$post);       //Create or Update
	\$post = R::load('post',\$id); //Retrieve
	R::trash(\$post);             //Delete
");
?>
<p>
	This code creates, stores, loads and deletes a single post object.
	This code will run without any prior configuration. 
	RedBeanPHP <b>automatically generates</b> the database, tables and columns <b>on-the-fly</b>.
	RedBeanPHP infers relations based on naming conventions.
</p>
<h2>News</h2>
<p>
<time>2013-09-26</time>: <a title="New: Error logging plugin" href="https://github.com/zewa666/RedBean_StdError_QueryLogger" target="_blank">StdErr Plugin</a> for RedBeanPHP.
<br />
<time>2013-09-25</time>: <a title="RedBeanPHP 3.5 Beta 9" href="/beta_testing">RedBeanPHP 3.5 beta 9</a> has been released!
<br />
<time>2013-09-23</time>: <a title="RedBeanPHP 3.5 Beta 8" href="/beta_testing">RedBeanPHP 3.5 beta 8</a> has been released!
<br/>
<time>2013-09-22</time>: <a title="RedBeanPHP 3.5 Beta 7" href="/beta_testing">RedBeanPHP 3.5 beta 7</a> has been released!
<br />
<time>2013-09-13</time>: It's Friday the 13th, let's test some beans! <a title="RedBeanPHP 3.5 Beta 6"  href="/beta_testing">RedBeanPHP 3.5 beta 6</a> is out!
<br />
<time>2013-09-10</time>: <a title="RedBeanPHP 3.5 Beta 5"  href="/beta_testing">RedBeanPHP 3.5 Beta 5</a> has been released!
<br />
<time>2013-09-07</time>: <a title="RedBeanPHP 3.5 Beta 4"  href="/beta_testing">RedBeanPHP 3.5 Beta 4</a> has been released!
<br />
<time>2013-09-04</time>: <a title="RedBeanPHP 3.5 Beta 3"  href="/beta_testing">RedBeanPHP 3.5 Beta 3</a> has been released!
<br />
<time>2013-09-03</time>: <a title="RedBeanPHP 3.5 Beta 2"  href="/beta_testing">RedBeanPHP 3.5 Beta 2</a> has been released!
<br />
<time>2013-08-31</time>: <a title="RedBeanPHP 3.5 Beta 1"  href="/beta_testing">RedBeanPHP 3.5 Beta 1</a> has been released!
<br />
<time>2013-08-17</time>: <a title="RedBeanPHP 3.5 Alpha 7" href="/beta_testing">RedBeanPHP 3.5 Alpha 7</a> has been released!
<br />
<time>2013-08-15</time>: <a title="RedBeanPHP 3.5 Alpha 6" href="/beta_testing">RedBeanPHP 3.5 Alpha 6</a> has been released!
<br />
<time>2013-08-13</time>: <a title="RedBeanPHP 3.5 Alpha 4" href="/beta_testing">RedBeanPHP 3.5 Alpha 4</a> has been released!
<br />
<time>2013-07-25</time>: <a title="RedBeanPHP 3.5 Alpha 1" href="/beta_testing">Alpha release</a> of RedBeanPHP 3.5!
<br />
</p>
<h2>Why RedBeanPHP</h2>
<p>	
	RedBeanPHP is a simple, easy-to-use, on-the-fly object mapper, especially suited for 
	<abbr title="Rapid Application Development - in other words, insane deadlines">RAD</abbr>, 
	prototyping and people
	with deadlines. RedBeanPHP creates tables, columns, constraints and indexes automatically
	so you don't have to switch between your database client (phpMyAdmin) and your 
	editor all the time (this does not mean you will never have to use phpMyAdmin or SQL though, read on... ). 
	Also you don't have to write configuration files because RedBeanPHP
	simply infers the database schema from naming conventions. Because RedBeanPHP saves a lot of 
	time you can spend more time developing the rest of the application.
</p>
<h2>No Configuration</h2>
<p>
	Most ORMs use configuration files (XML, INI or YAML) or some sort of annotation system
	to define mappings. These systems force you to map records to objects upfront. RedBeanPHP is different. 
	Instead of using
	configuration it uses conventions; a very small set of rules. RedBeanPHP uses these conventions
	to infer relationships and to automate mappings. RedBeanPHP also helps you to follow these
	conventions by automatically building the initial tables and columns for you - which also saves
	a lot of time. This means there is no configuration, less boilerplate code and more time left
	to focus on the business logic, testing and documentation, thus boosting development productivity and
	code quality.
</p>
<h2>A bridge between objects and records</h2>
<p>
	<abbr title="SQL (structured query language) is the most common query language for most relational database systems.">SQL</abbr> 
	is a powerful query language for relational databases. Most ORMs act like a wall,
	hiding SQL from you. RedBeanPHP on the other hand tries
	to integrate both technologies, thus acting more like a bridge.
	For instance, RedBeanPHP allows you to embed SQL snippets in ORM methods to tune
	the retrieval of related beans from the database. RedBeanPHP seeks to strike a balance
	between object oriented programming and relational database querying.
</p>
<h2>Code Quality</h2>
<p>
	RedBeanPHP has been carefully architected to be concise and maintainable. 
	The core codebase is tested daily using about 20.000 unit tests (100% test coverage) 
	on local servers and a 
	<abbr title="Travis CI is the continous integration solution used for RedBeanPHP.">Travis CI</abbr>
	environment. The codebase contains a lot of inline documentation, is fully object oriented and
	improves security by promoting PDO based prepared statements and parameter binding.
</p>

<h2 id="tutorial">Quick Tutorial</h2>
<p>
	Try the 5-minute guide to RedBeanPHP to get started quickly.
	Learn to use basic RedBeanPHP ORM in just <a title="Learn RedBeanPHP in 5 minutes" href="/quick_tour">about 5 minutes</a>.
	Otherwise, if you're not in a hurry
	but you just want to get started and learn the basic concepts I recommend to start with 
	<a title="Basic RedBeanPHP" href="/create_a_bean">Create a Bean</a> (see navigation block on the left) and work your
	way through the manual from there. I have tried to put the most important (read: basic) topics on top of the list. 
</p>



<h2 id="download">One-File Download</h2>
<p>
	RedBeanPHP has been compiled into one single file for easy installation. No paths, no auto-loaders,
	no configurations, just download the all-in-one package and require the single <b>rb.php</b> file
	in your code.
	<br /><a style="font-weight:bold;" href="/downloadredbean.php" title="Get RedBeanPHP">DOWNLOAD Latest RedBeanPHP (Version 3.4.7)</a>.
</p>

<h2 id="support">Enterprise Support</h2>
<p>
	RedBeanPHP commercial support is provided by <a href="http://www.organicsoftware.nl/index_en.html" title="Organic Software">Organic Software</a>.
</p>


<br /><br />
<p style="text-align:center;">
<i style="font-size:10px;">RedBeanPHP is used by:</i><br /><br />
<img style="position:relative;right:5px;" src="/img/logos3.png" alt="Logos of companies using RedBeanPHP for ORM."/>
</p>
<h1>Quick tour</h1>
<p>
	To setup RedBeanPHP for testing purposes, just use:
</p>
<?php code("
	require 'rb.php';
	R::setup();	
");?>
<p>
	This will create a <b>temporary database</b> in the temporary folder on most systems. If this fails; try passing
	a valid <a href="/setup" title="Setting up RedBeanPHP">DSN, username and password (PDO style)</a>. 
</p>
<h2>CRUD</h2>
<p>
	RedBeanPHP allows you to perform
	<abbr title="C.R.U.D. stands for CREATE, RETRIEVE, UPDATE, DELETE.">CRUD</abbr> operations quite easily. After setting up you don't have to add tables, columns, indexes or 
	foreign keys. All database structures will be generated by RedBeanPHP.
</p>
<p>
	Instead of database records, RedBeanPHP thinks in <i>'Beans'</i>. 
	A bean always has a type and an id. The type matches the name of the table where the bean is stored.
	This is how you create a bean:
</p>
<?php code("
	\$shop = R::dispense('shop');
");?>
<p>
	And this is how you set properties:
</p>
<?php code("
	\$shop->name = 'Antiques';
");?>
<p>
	This is how you <b>store</b> the shop in the database:
</p>
<?php code("
	\$id = R::store(\$shop);
");?>
<p>
	This is how you <b>load</b> your previously stored shop:
</p>
<?php code("
	\$shop = R::load('shop',\$id);	
");?>
<p>
	And this is how you <b>delete</b> the shop from the database:
</p>
<?php code("
	R::trash(\$shop);	
");?>
<h2>Relations</h2>
<p>
	<abbr title="Object Relational Mapping">ORM</abbr> is about mapping relations. Our shop would be quite useless if it
	does not sell anything, so our shop is filled with $products, <b>those are beans as well</b>.
	This is how you <b>add</b> a product to your shop:
</p>
<?php code("
	\$product = R::dispense('product');
	\$product->price = 50;
	\$shop->ownProduct[] = \$product;
	R::store(\$shop);	
");?>
<p>
	Simply add products to a list called ownProduct. If you add employees use:
</p>
<?php code("
	\$shop->ownEmployee[] = \$mike;
");?>
<p>
	The name of the list should always begin with the word <b>'own'</b> followed by the
	name of the <b>type</b> of bean it contains. Remember, the type is the string you pass to the
	<b>R::dispense()</b> method! So, beans of type 'book' are stored in <b>ownBook</b>, 
	beans of type 'employee'
	in <b>ownEmployee</b>, beans of type 'box' in <b>ownBox</b> etc. To empty a list:
</p>
<?php code("
	\$shop->ownEmployee = array(); //fires everyone!
");?>
<p>
	You never have to load a list. Lists are fetched as soon as you access the
	property. This is called <b>lazy loading</b>. You can also mix in some <abbr title="Structured Query Language">SQL</abbr>;
	for instance to <b>sort</b> the products in a list:
</p>
<?php code("
	\$products = \$shop
		->with(' ORDER BY price ASC ')
		->ownProduct; //since 3.3
");?>
<p>
	Learn more about <a href="/adding_lists" title="1-N relations">one-to-many relations</a> in RedBeanPHP.
</p>
<h2>Shared Lists</h2>
<p>
	A shared list is just like an own-list but the relationship goes <b>both ways</b>.
	With an own-list the shop 'owns' the products. They cannot be owned by 
	more than just <b>one</b> shop. With managers, this is not the case; managers
	can be associated with <b>many</b> shops. So we use a 
	<a href="/shared_lists" title="many-to-many relations in RedBeanPHP">shared list</a> (creates a
	<b>link table</b> manager_shop):
</p>
<?php code("
	\$shop->sharedManager[] = \$jack;
");?>
<h2>Finding stuff</h2>
<p>
	To <a href="/finding_beans" title="Finding beans in the database">find</a> 
	beans in the database, we use <i>plain old SQL</i>, for instance the following example
	will find all shops in the neighbourhood: 
</p>
<?php code("
	\$shops = R::find('shop',' distance < 10 ');
");?>
<h2>Querying</h2>
<p>
	Using raw <a href="/queries" title="Querying">SQL power</a> is possible as well, and just as easy:
</p>
<?php code("
	R::exec('UPDATE shop SET name = ? ',array('MyShop'));
");?>
<p>
	RedBeanPHP offers methods to retrieve cells,columns,rows and multi dimensional arrays:
</p>
<?php code("
	R::getCell( ... )
	R::getCol( ... )
	R::getRow( ... )
	R::getAll( ... )
");?>
<h2>After Development</h2>
<p>
	Once you are done developing you need to deploy your PHP application on a 
	production server. Now you don't want RedBeanPHP to scan the database and
	modify the schema there, so you need to tell RedBeanPHP to <a href="/freeze" title="Freezing the beans!">freeze</a>:
</p>
<?php code("
	R::freeze( true );
");?>
<p>
	Simply put that line <i>at the beginning of your application</i> before deploying.
	Right <b>after</b> R::setup( ... ).
</p>

<h2>Don't like static methods?</h2>
<p class="note">
	RedBeanPHP provides a lot of easy-to-use static methods. If you don't like
	this you can use the same methods on the objects behind the facade as well.
	Learn how to use the RedBeanPHP <a href="/internals#objects" title="Learn how to use objects instead of static methods.">core objects</a>.
</p>


<h1>System Requirements</h1>
<p>
	<strong>RedBeanPHP</strong> has been tested with PHP 5.3+ but runs under PHP 5.2 as well.
	RedBeanPHP works on all well known operating systems. 
	You need to have <abbr title="PHP Data Objects">PDO</abbr> installed and you need
	a PDO driver for the database you want to connect to. Most PHP stacks
	come with PDO and a bunch of drivers so this should not be a problem. RedBeanPHP supports 
	a wide range of relational databases; for a full list feel free to consult the
	<a href="/compatible" title="Compatible Databases">compatibility page</a>. 	
</p>

<h2>MB String extension</h2>
<p>
	RedBeanPHP requires the mb_string extensions. Most PHP distributions have
	this already.
</p>

<h2>MySQL Strict Mode</h2>
<p>
	RedBeanPHP does <b>not</b> work with <b>MySQL strict mode</b>. 
	To turn off strict mode execute the following SQL query:
</p>
<?php code("
	SET @@global.sql_mode= '';
");?>

<h2>Existing schemas</h2>
<p>
	RedBeanPHP has been designed to build your database <b>on-the-fly</b>, as you go.
	Afterwards, you can <b>manually</b> change the schema to suit your needs (change column types, add additional indexes); 
	RedBeanPHP won't revert your changes, not even in fluid mode.<br />
	While RedBeanPHP can also be used with existing schemas these have to conform to the RedBeanPHP naming conventions to work.
	Remember that the purpose of RedBeanPHP is to have an easy, configuration-less ORM. This can be achieved only by
	respecting certain conventions.
</p>


<h1>Installing</h1>
<p>
	To install <strong>RedBeanPHP</strong>, <a href="http://www.redbeanphp.com/downloadredbean.php" title="All in one pack">download the RedBeanPHP All-in-one pack</a> from the website.
	After unzipping you will see just one file:
</p>
<kbd>
	rb.php
</kbd>
<p>
	This file contains everything you need to start RedBeanPHP. Just include it in your 
	PHP script like this:
</p>
<?php code("
	require 'rb.php';
"); ?>
<p>
	You are now ready to use RedBeanPHP!
</p>

<h2>Installing using composer</h2>
<p>
	You can install
	RedBeanPHP using <b>Composer</b> if you like. For details please read the 
	<a href="https://github.com/gabordemooij/redbean" title="Composer">README file on github</a>.
	While installing RedBeanPHP using Composer is possible it's <b>not</b> the same as downloading the all-in-one pack.
	The all-in-one pack contains a file called rb.php which has been compiled using the Replica Build script.
	This means the <i>R-class</i> in the all-in-one pack contains some plugins that are <b>not</b> available in
	the aliased Facade Class of the composer package.
	<br/>
	<b>I therefore recommend to just download the all-in-one package.</b>
	<br/>
	The all-in-one package has been designed to be <b>easy to install</b> and contains a <b>carefully selected</b> set of
	plugins and writers. 
	<br />
	While Composer is an awesome tool I don't think it offers real benefits in our case
	because we already have thought out the <i>distribution process</i>.
</p>

<h2>Installing using a framework</h2>
<p>
	RedBeanPHP is a library and as such it can be integrated in a framework.
	There are some really nice frameworks out there that ship with built-in support for RedBeanPHP.
	Here is a brief overview of Frameworks that ship with RedBeanPHP: 
</p>
<ul>
	<li><a href="http://prismaphp.org" title="Visit the PrismaPHP MVC Framework.">PrismaPHP</a> Framework</li>
	<li><a href="http://nibble-development.com/nibble-framework-php-plugin-based-framework/" title="Visit the Nibble Framework.">Nibble</a> Framework</li>
</ul>
<p>
	Besides these frameworks, RedBeanPHP modules are available for various other frameworks like Code Igniter, Kohana, Laravel and Zend Framework.
	Please consult your framework provider for more details about these modules.
</p>


<h1>Setup</h1>
<p>
	So, you have decided to start with <strong>RedBeanPHP</strong>. The first thing you need to 
	get started is setting up the <b>database</b>. Luckily this is really easy.
</p>

<?php code("
	require('rb.php');
	R::setup();
"); ?>

<p>
	Yes, that's all if you are working on a *NIX, Linux or Mac system with <strong>SQLite</strong>.
	Here is how to connect to <strong>MySQL</strong> on any machine: 
</p>

<?php code("
	require('rb.php');
	R::setup('mysql:host=localhost;
		dbname=mydatabase','user','password');
"); ?>

<p>
	RedBeanPHP is also very easy to <a href="/compatible">setup for use with PostgreSQL and SQLite</a>.
</p>

<h2>InnoDB only</h2>
<p class="warning">
	RedBeanPHP only works with the InnoDB driver for MySQL. MyISAM is too <a href="http://www.kavoir.com/2009/09/mysql-engines-innodb-vs-myisam-a-comparison-of-pros-and-cons.html" title="article about differences between MyISAM and InnoDB" target="_blank">limited</a>.
</p>


<h1>Compatible</h1>
<p>
	RedBeanPHP has fluid and frozen mode support for:
</p>
<table>
	<tr><td><b>MySQL 5</b> and higher</td></tr>
	<tr><td><b>SQLite 3.6.19</b> and higher</td></tr>
	<tr><td><b>PostgreSQL 8</b> and higher</td></tr>
	<tr><td><b>CUBRID</b> (since <b>3.2</b>)</td></tr>
</table>
<p>
	To connect to a <b>databases</b> use:
</p>
<?php code("
	R::setup('mysql:host=localhost;dbname=mydatabase',
		'user','password'); //mysql
"); ?>
<?php code("
	R::setup('pgsql:host=localhost;dbname=mydatabase',
		'user','password'); //postgresql
"); ?>
<?php code("
	R::setup('sqlite:/tmp/dbfile.txt',
		'user','password'); //sqlite
"); ?>
<p>Since <b>3.2</b>:</p>
<?php code("
	R::setup('cubrid:host=localhost;port=30000;
		dbname=mydatabase',
		'user','password'); //CUBRID
"); ?>

<h2>Disconnect</h2>
<p class="note">
	To disconnect use: R::close(); (since 3.1)
</p>



<category>Basics</category>

<h1>Create a Bean</h1>
<p>
	Using RedBeanPHP is easy. First create a bean. A bean is just a plain old object with public properties. Every bean has
	an <b>id</b> and a <b>type</b>.
</p>

<?php code("
	\$book = R::dispense('book');
");?>

<p>
	Now we have an empty 
	bean
	of type <b>book</b> with id <b>0</b>.
	Let's add some properties:
</p>

<?php code("
	\$book->title = 'Gifted Programmers';
	\$book->author = 'Charles Xavier';
");?>

<p class="version">
	Or&hellip; if you're in the mood for chaining you can use:<br />
	$book-&gt;setAttr('title','Gifted Programmers')-&gt;setAttr(..) etc&hellip;<br/>
	(requires version 3.3+)
</p>

<p>
	Let's store this bean in the database:
</p>

<?php code("
	\$id = R::store(\$book);
");?>

<p>
	<b>That's all?</b> <i>Yes</i>. Everything has been written to the <b>database</b>! RedBeanPHP <b>automatically</b> creates the <b>table</b> and
	the <b>columns</b>.
</p>


<p class="version">
	Note that the store() function returns the ID of the record. Also, there is storeAll($beans) in RedBeanPHP 3.1
</p>


<h2>How does it work?</h2>
<p>
	RedBean dynamically adds columns if you add new properties:
</p>
<?php code("
	\$book->price = 100;
");?>	
<p>	
	RedBeanPHP also updates the column type to support a different type of value.
	For instance, this will cause the column to change from <b>TINYINT</b> to <b>DOUBLE</b>:
</p> 
<?php code("
	\$book->price = 99.99;
");?>

<h2 id="datatypes">More data types</h2>
<p>
	You can store other data types as well:
</p>
<?php code("
	\$meeting->when = '19:00:00'; //Time
	\$meeting->when = '1995-12-05'; //Date
	\$photo->created = '1995-12-05 19:00:00'; //Date time
	\$meeting->place = '(1,2)'; //only works in postgres
");?>
<p>
	You can use R::isoDate() and R::isoDateTime()
	to generate the current date(time) if you like.
	
</p>
<h2>Multi Dispense</h2>
<p>
	To dispense multiple beans at once:
</p>
<?php code("
	\$twoBooks = R::dispense('book',2);
");?>

<h2>Use the cache!</h2>
<p class="version">
	Start your code with: R::$writer->setUseCache(true); to make use of query caching.
	This will prevent RedBeanPHP from performing unnecessary queries. This feature is
	available since RedBeanPHP 3.4. While RedBeanPHP offers other caching mechanisms as
	well this is the easiest to use and it's completely transparent!
</p>

<h2>The rules</h2>
<p class="note">
	<b>Bean types</b> may only consist of <b>lowercase</b> <b>alphanumeric</b> symbols <b>a-z</b> and <b>0-9</b>
	(no underscores).
	A property name has to <b>begin with a letter</b> and may consists of letters and numbers. <b>Underscores
	</b> in property names
	are allowed but I recommend to come up with better nouns instead.
	<br /><br />
	Underscores in <b>Bean types</b> are <i>not</i> allowed because RedBeanPHP uses these to identify relations. 
	Underscores are used to
	denote a relation between two beans, therefore you should not dispense such beans yourself. 
	<br /><br />
	The RedBeanPHP naming restrictions allow RedBeanPHP to figure out relationships among tables and beans
	without configuration; however these rules also help you to maintain a clean and consistent database
	schema. Moreover, developers often make up terrible names for tables (i.e. 'tbl_userrights', 'person_Project' etc&hellip;). 
	I try to encourage people to 
	take some time to find the correct 'name' (often a simple noun) for their beans (i.e. 'privilege','participant'). 
	This also improves the readability
	(and maintainability) of your database. Just take some time to find the noun that describes
	the entity you're modelling best.
	<br /><br />
	If, for some reason you really need to break these rules use: Use R::setStrictTyping(false); This may cause
	some side effects with dup() and export() though.
</p>

<p class="version" id="beau">
	As of RedBeanPHP 3.4, a property name like 'singleMalt' will be automatically converted to 'single_malt'.
	If you don't like that, use: RedBean_OODBBean::setFlagBeautifulColumnNames(false);
</p>

<h1>Loading a Bean</h1>
<p>
	To load a bean from the database use the <b>load()</b> function and pass both the <b>type</b> of the bean and the <b>id</b>:
</p>
<?php code("
	\$book = R::load('book', \$id);
");?>
<p>
	If the bean cannot be loaded a new <b>empty</b> bean will be dispensed with id <b>0</b>. 
	To check whether a bean has been loaded correctly you can 
	verify the id using: 
</p>
<?php code("
	if (!\$bean->id) { ...help bean not found!!.. } 
");?>
<p>
	This behaviour is very useful. For instance, consider loading a page bean:
</p>
<?php code("
	\$page = R::load('page',\$id);
	show_form(\$page); //imaginary function
");?>
<p>	
	If the page does exists, the contents of the page will be shown in the form to allow
	the user to update the page. However if the page does not exist, what are we going to do?
	Well the page is gone after all (maybe someone has removed the page?), 
	so we can just as well present the user with an empty form.
	This saves a lot of unnecessary <i>if-then-else</i> code.	
</p>
<p>
	After a bean has been loaded, you can simply access properties like you expect:
</p>
<?php code("
	echo \$book->title; //displays value of property title
");?>
<p class="version">
	Properties of a loaded bean only contain <b>STRING</b> or <b>NULL</b> values. 
</p>
<h2>Batch Loader</h2>
<p>
	To load a <b>batch</b> of beans at once:
</p>
<?php code("
	\$books = R::batch('book',array(\$id1,\$id2));
");?>
<h2>Counting</h2>
<p>
	To <b>count</b> beans:
</p>
<?php code("
	R::count('page'); //counts all pages
");?><br/>

<p class="version">
	Since RedBeanPHP 3.3 you can also add some SQL:<br /> 
	R::count('page',' chapter = ?',array($chapter))
</p>


<h2>Empty Beans</h2>
<p class="warning">
	<b>Remember</b>: If the bean <i>cannot</i> be loaded a <b>new empty bean</b> will be dispensed with id <b>0</b>.
</p>


<p>
	Next: learn how to <a href="/deleting_a_bean" title="Learn how to delete a bean.">delete</a> a bean.
</p>


<h1>Deleting a Bean</h1>
<p>
	To remove a bean from the <b>database</b>:	
</p>
<?php code("
	R::trash( \$book );
");?>
<p>
	To delete <b>more</b> beans of type book:
</p>
<?php code("
	R::trashAll( \$books );
");?>
<p>
	To delete <b>all</b> beans of type book:
</p>
<?php code("
	R::wipe( 'book' );
");?>

<h2>Nuke</h2>
<p class="note">
	You can also empty an entire database with the R::nuke() command. Be very careful with this!
</p>

<p>
	Next: learn how to stop RedBeanPHP from modifying the schema any further; before <i>deploying</i>
	your RedBeanPHP based application you should 
	<a href="/freeze" title="Learn how to freeze the database">freeze</a> the database.
</p>

<h1>Freeze</h1>
<p>
	By default <strong>RedBeanPHP</strong> operates in <b>fluid</b> mode. In fluid mode the <b>database</b>
	<b>schema</b> gets updated to meet the requirements of your code.
	For instance, if you assign a string to a property that previously only contained numbers RedBeanPHP
	will <i>broaden</i> the column to store strings as well.
	This is great for development. However because inspecting the database is slow and you don't want
	such a dynamic schema on the production server you should freeze the database by
	invoking the <b>R::freeze(true)</b> command before deployment. This will lock the schema to prevent
	further modifications.
</p>
<?php code("
	R::freeze( true ); //will freeze redbeanphp
");?>
<p>
	Between freezing and deployment you need to review the database schema to make sure
	it fits the bill. Here is a simple checklist:
</p>
<ol style="margin-left:20px;">
	<li>
		Check the column types. RedBeanPHP tries to guess the right types based on usage during development, however
		column types may be improved based on your expectations about real world usage.
	</li>
	<li>
		This issue concerns relations, if you haven't read about RedBeanPHP relations yet, you can skip this
		item for now.
		RedBeanPHP sets foreign keys for <a href="/adding_lists#dependencies" title="Learn about relational mapping">relations automatically</a>, 
		however by default RedBeanPHP selects 'SET NULL'
		as the default action for deletions because the system can't predict whether a cascaded delete is desired. Make sure
		Check these foreign keys before deployment. If you don't know anything about foreign keys these default settings are
		probably just allright.
	</li>
	<li>
		RedBeanPHP adds some indexes. However, additional indexes may improve performance. Once again
		I recommend to review the indexes and adjust them where necessary based on your knowledge about 
		production environment.
	</li>
</ol>
<br />
<h2>Chill Mode</h2>
<p>
	Instead of freezing all beans you can freeze certain bean types only:
</p>
<?php code("
	R::freeze( array('book','page') ); 
		//book,page tables remain untouched.
");?>
<p>
	this we call 'Chill Mode'.
</p>

<p class="version">
	Chill Mode has been added in version 3.2
</p>

<p>
	Next: finding stuff with RedBeanPHP is really easy. 
	<a href="/finding_beans" title="Finding beans with RedBeanPHP ORM with some good old SQL">RedBeanPHP uses familiar SQL</a> to
	search for beans in the database.
</p>

<h1>Tainted</h1>
<p>
	To see whether a bean has been changed:
</p>
<?php code("
	\$bean->getMeta('tainted');
");?>
<p>
	Note that certain properties, like lists (see chapter lists) also cause a bean to get
	marked as tainted.
	In RedBeanPHP version 3.4 there is a shorthand method: isTainted().
</p>
<h2>Old Values (3.4)</h2>
<p>
	In RedBeanPHP 3.4+ you can check whether a certain property has changed and you can retrieve
	the previous value.
</p>
<?php code("
	\$post->hasChanged('title'); //has title been changed?
	\$oldTitle = \$post->old('title');
");?>


<category>Finding</category>



<h1>Finding Beans</h1>
<p>
	<strong>RedBeanPHP</strong> allows
	you to use good old <abbr title="Structured Query Language">SQL</abbr> to find beans: 
</p>
<?php code("
	\$pages = R::find('page',' title = ? ', 
				array( \$title )
			   );
");?>
<p>
	The result of a find operation is an array of beans; the <b>ID</b>s are used as keys.
	Find takes <b>3</b> arguments; the <b>type</b> of bean you are looking for, 
	the <a style="font-weight:bold;" title="Learn how to write queries with RedBeanPHP" href="/queries">SQL query</a> 
	and an array
	containing the <b>values</b> to be used for the question marks. Named slots are supported as well:
</p>
<?php code("
	\$pages = R::find('page',
		' title = :title LIMIT :limit', 
			array( 
				':limit' => \$limit, 
				':title' => \$title 
			)
		);
");?>
<p>
	...and so are <b>IN-clauses</b>:
</p>
<?php code("
	\$all = R::find('page',
		' id IN ('.R::genSlots(\$ids).') ', \$ids);
");?>
<p>
	If you don't use any conditions but you just want to <b>ORDER</b> or <b>LIMIT</b> result rows, 
	use <b>findAll()</b>:
</p>
<?php code("
	\$all = R::findAll('page',
		' ORDER BY title LIMIT 2 ');
");?>
<p>
	To find just <b>one</b> bean; use <b>findOne()</b>:
</p>
<?php code("
	\$prod = R::findOne('product',
		' code = ? ',array(\$code));
");?>
<p>
	findOne returns the first bean in the result set. Use <b>findLast()</b> to get the last bean.
</p>
<p class="note">
	You can only bind <b>literal</b> values. This will not work: &quot;ORDER BY :sortcolumn DESC&quot;
	- because the parameter refers to a column, <b>NOT</b> a literal.
</p>



<h2>Return values</h2>
<p>
	If no beans are found, find() and findAll() return an <b>empty array</b>, 
	findOne(), findFirst() and findLast() return <b>NULL</b>.
</p>

<p class="note">
	There is no need to use <b>mysql_real_escape</b>, just bind the parameters to the slots in
	the query. <b>Never</b> use PHP variables directly in your <b>SQL</b> string!
</p>


<h1>Queries</h1>
<p>
	If you prefer <b>rows</b> rather than <b>beans</b> you may want to use the
	<abbr title="Structured Query Language">SQL</abbr> query functions provided by
	<strong>RedBeanPHP</strong>. To just execute a query:
</p>
<?php code("
	R::exec( 'update page set title=\"test\" where id=1' );
");?>
<p>
	To get a <b>multidimensional</b> array:
</p>
<?php code("
	R::getAll( 'select * from page' );
");?>
<p>
	The result of such a query will be a <b>multidimensional</b> array:
</p>
<?php code("
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
");?>
<p>	
	Note that you can use <b>parameter bindings</b> here as well:
</p>
<?php code("
	R::getAll( 'select * from page where title = :title', 
		array(':title'=>'home') 
	);
");?>
<p>
	To fetch a <b>single row</b>:
</p>
<?php code("
	R::getRow('select * from page where title like ? limit 1',
		array('%Jazz%'));
");?>
<p>
	The resulting array corresponds to one single row in the result set. For instance:
</p>
<?php code("
	Array
	(
	    [id] => 1
	    [title] => The Jazz Club
	    [text] => hello
	)
");?>
<p>
	To fetch a <b>single column</b>:
</p>
<?php code("
	R::getCol('select title from page');
");?>
<p>
	The result array of this query will look like this:
</p>
<?php code("
	Array
	(
	    [0] => frontpage
	    [1] => The Jazz Club
	    [2] => back
	)
");?>
<p>
	And finally, a <b>single cell</b>...
</p>
<?php code("
	R::getCell('select title from page limit 1');
");?>
<p>
	To get an associative array array with a specified key and value column use:
</p>
<?php code("
	R::\$adapter->getAssoc('select id,title from page');
");?>
<p>
	result:
</p>
<?php code("
	Array
	(
	    [1] => frontpage
	    [2] => The Jazz Club
	    [3] => back
	)
");?>
<p>
	In this case, the keys will be the IDs and the values will be the titles.
</p>

<h2 id="convert">Converting records to beans</h2>
<p>
	You can convert rows to beans using the convertToBeans() function:
</p>
<?php code("
	\$sql = 'SELECT author.* FROM author 
		JOIN club WHERE club.id = 7 ';
	\$rows = R::getAll(\$sql);
	\$authors = R::convertToBeans('author',\$rows);
");?>


<h2>About Escaping</h2>
<p class="note">
	There is no need to use <b>mysql_real_escape</b> as long as you use parameter binding. 
</p>

<h2>Query Building</h2>
<p class="alsosee">
	Notice that we have used strings for our SQL. Did you know RedBeanPHP
	allows you to mix PHP and SQL as if they were one and the same language?
	Read about <a href="/mixing_sql_and_php" title="Mix SQL and PHP!">mixing SQL and PHP</a>.
</p>


<h1>Mixing SQL and PHP</h1>
<p>
	In RedBeanPHP you can mix <b>PHP</b> and <b>SQL</b> as if it were just one language.
	To call an SQL function in PHP simply call it like a PHP function on <b>R::$f</b>. 
	$f is short for 'function' and we mean SQL function here. Here are some examples:
</p>
<?php code('
	//executes and returns result of: SELECT NOW();
	$time = R::$f->now();  
');?>
<p>
	Besides simple SQL functions like <b>now()</b> you can build queries that blend
	perfectly with your PHP code. This is useful for writing complex dynamic queries.
	This technique allows you to <strong>share queries among functions and methods</strong> just like
	a query builder does. The only difference is, you don't need to learn a new syntax,
	it's plain old SQL!
</p>
<?php
 code("
    R::\$f->begin()
    ->select('*')->from('bean')
    ->where(' field1 = ? ')->put('a')->get('row');
 ");
?>
<p>
	This PHP code is the equivalent of:
</p>
<?php
 code("
	SELECT * FROM bean WHERE field1 = 'a'	
");
?>
<p>
	There are just a couple of rules.<br />
	First, you must begin a <b>PHP-SQL</b> query that is longer than just one 
	SQL function with the <b>begin()</b> method. This method prepares the SQL helper for a query. It turns on
	capture mode; from that moment on it will postpone execution of the query until it's complete.
	<br />
	Now you can <i>chain</i>
	SQL statements as PHP function calls. To add a value to the parameter list use <b>put()</b>,
	finally you must end
	the query with <b>get()</b>, <b>get('row')</b>, <b>get('col')</b> or <b>get('cell')</b> depending on the desired
	return format. 
	These methods are similar to the default database
	adapter methods found elsewhere in RedBeanPHP. Thus get() will return a multidimensional array with each row
	containing an associative array (column=>value), while get('row') returns just one such row,
	get('col') returns a flat array containing the column values and get('cell') returns a single value. 
</p>
<p>
	To add a '(' in a query use: open(), to add a ')' use: close(), like so:
</p>
<?php
code("
		...->from('table')
		->where(' name LIKE ? OR ')
		->open()->addSQL(' id > ? AND title LIKE ? ')->close()->...
		
		//produces something like: 
		NAME LIKE ? OR ( id > ? AND title LIKE ? )
");
?>
<p>
	To add a literal piece of SQL use addSQL():
</p>
<?php
code("
	->addSQL(' SELECT DISTINCT title ') 
	//adds literal SQL snippet
	->from('movies')->...
	
	//produces something like:
	SELECT DISTINCT title FROM movies
	
");?>
<p class="version">
	Since RedBeanPHP <b>3.2</b>: Underscores will be replaced by spaces.
</p>

<h2 id="nesting">Nesting Queries</h2>
<p>
	You can also build queries out of multiple nested queries:
</p>
<?php code("
	->nest(\$queryBuilder->getNew()
		->begin()->select(' id ')->... etc

");?>
<p>
	Simply use the getNew() method to obtain a new instance of the query builder
	using the same adapter as the current one. Then wrap this query in the nest() method
	of the parent query. The SQL and parameters of the nested query will be added to the
	parent query.
</p>
<p class="version">
	Nesting query builders has been implemented as of version 3.4
</p>

<p class="note">
	RedBeanPHP will not generate portable SQL for you.
	The RedBeanPHP Query Builder has been designed
	to share queries among functions without having to deal
	with strings, not to generate database agnostic SQL.
</p>

<h2>Next: Lists</h2>
<p class="alsosee">
	By now, you know how to perform 
	<abbr title="Create Retrieve Update Delete">CRUD</abbr> and find beans, 
	you probably want to learn to map relations among
	beans. In RedBeanPHP relations are mapped using <i>lists</i>. 
	Instead of thinking about <i>tables</i> and <i>fields</i>
	you just put beans in a list and they will belong to the owner of the list. This is similar to
	what is known as '<b>one-to-many</b>' or '<b>1-N</b>' but easier.
	<a href="/adding_lists" title="Learn about one-to-many relations in RedBeanPHP">Read more about
	relational mapping using lists.</a>  
</p>


<category>Relation Mapping</category>


<h1>Adding Lists</h1>
<p>
	Relational mapping in RedBeanPHP is done using lists.
	For instance let's say we have a village and buildings. The buildings belong to the village,
	so the village 'owns' buildings. This is a <b>one-to-many</b> relationship because we have <b>ONE</b>
	village that has <b>MANY</b> buildings. In RedBeanPHP this is an <b>own-list</b>:
</p>	
<?php code("
	\$village = R::dispense('village');
	list(\$mill,\$tavern) = R::dispense('building',2);
	
	//replaces entire list
	\$village->ownBuilding = array(\$mill,\$tavern);
	 
	R::store(\$village);	
");?>
<p>
	Now, the <i>mill</i> and <i>tavern</i> buildings belong to the village. In the database, 
	RedBeanPHP will add a <b>village_id</b> field to the <b>building</b> table, pointing
	to the village record the building belongs to.
</p>
<p>
	An own-list always bears the name of the <b>type</b> of beans it contains: 
	<b>ownBuilding</b> only contains beans of type 'building', <b>ownPage</b> contains
	pages etc..	
</p>
<p>
	Adding the same building to another village causes the other village to steal
	the building! This is because the own-list contains only beans exclusively owned
	by the owner bean. That makes sense because it's an one-to-many relationship,
	not a many-to-many relationship.  
</p>
<p>	
	Once stored, lists will be retrieved the
	moment you access the property (we call this <b>lazy loading</b>). To retrieve all the buildings in a village:
</p>
<?php code("
	\$village = R::load('village',\$id);
	\$buildings = \$village->ownBuilding; 
");?>
<p>	
	To <b>add</b> a building to an existing own-list use:
</p>
<?php code("	
	//add a building
	\$village->ownBuilding[] = \$building;
"); ?>
<p>
	to replace all buildings in an own-list:
</p>	
<?php code("	
	\$village->ownBuilding = array( \$building1, \$building2 );
"); ?>
<p>
	The buildings are keyed by their database <b>IDs</b>.
	So to replace a bean:
</p>
<?php code("
	\$village->ownBuilding[\$id] = \$house;
");?>
<p>
	To delete a building from the list use unset()...
</p>
<?php code("
	unset(\$village->ownBuilding[\$someID]); 
	R::store(\$village);
"); ?>
<h2 id="dependencies">Dependencies</h2>
<p>
	By default if you remove a bean from a list the connection will be broken (in case of a shared list the
	intermediate bean is also deleted) but the referenced bean will remain
	in the database. If you want RedBeanPHP to remove beans for you that have been removed from lists use:
</p>
<?php code("
	R::dependencies(array('page'=>array('book','magazine')));
	//will now also destroy the page.
	unset(\$book->ownPage[\$id]); 
");?>
<p>
	Note that you can only call this method once. If you call it for a second time it will replace the
	previous dependency list. Also, you can't use this method to remove the constraints in the database; this
	have to be done manually.
</p>
<p class="version">
	From RedBeanPHP <b>3.2</b> on making beans dependent on other beans will also add an <b>ON CASCADE DELETE</b> trigger on the
	corresponding foreign key.
</p>

<h2 id="ordering">Ordering and Limiting Lists (3.3+)</h2>
<p>
	Imagine you have a shelf with books. To obtain the books from the shelf you can use
	the own-list: $shelf-&gt;ownBook. Sometimes you want to modify this list; ordering the
	books in the list for instance. To do this you can add a little SQL like this:
</p>
<?php code("
	\$books = \$shelf->with(' ORDER BY title ASC ')->ownBook;
");?>
<p>
	To limit the number of books in the list:
</p>
<?php code("
	\$books = \$shelf->with(' LIMIT 10 ')->ownBook;
");?>
<p>
	To filter:
</p>
<?php code("
	\$books = \$shop->withCondition(' price < 50 ')->ownBook;
");?>

<p>
	A with() or withCondition() method triggers a reload of the list,
	even if the query has not changed.
</p>

<p class="version">
	withCondition() and with() have been added in version 3.3
</p>

<h2 id="adhoc_binding">Adhoc parameter binding (3.4+)</h2>
<p>
	From 3.4 on you can also bind parameters in these SQL snippets:
</p>
<?php code("
	\$books = \$shop->withCondition(' price < ? ',
		array(\$price))->ownBook;
");?>




<h2>In other words&hellip;</h2>
<p class="note">
	The own-list is the RedBeanPHP implementation of one-to-many relations.
	Many-to-one relations are implemented using so-called 
	<a href="/parent_object" title="Learn about many-to-one relations, aka parent beans.">parent beans</a>.
</p>



<h1>Shared Lists</h1>
<p>
	Consider the following example concerning a strategy game: 
	An army can defend one or more villages. Thus an army can belong to many villages, <i>or 
	do the villages belong to the army?</i> In any case, this is an example of a
	<b>many-to-many</b> relationship. Many villages can be associated with many armies.
	In RedBeanPHP we describe this kind of relation with a <b>shared-list</b>.  
</p>
<?php code("
	\$army = R::dispense('army');
	\$village->sharedArmy[] = \$army;
	\$village2->sharedArmy[] = \$army;
");?>
<p>
	Now both villages have the <b>same</b> army. Once again the name of the shared list
	property needs to match the type of bean it stores. In the database, RedBeanPHP will
	make a link table <b>army_village</b> to associate the armies with their villages. 
</p>
<h2>The other end of the beans&hellip;</h2>
<p>
	Which villages does an army belong to? To answer this question use:
</p>
<?php code("
	\$myVillages = \$army->sharedVillage;
	//or.. R::related(\$army,'village');
");?>
<p>
	For the rest, shared lists work just like <a title="Adding Lists" href="/adding_lists">own-lists</a>.
	For instance, just like own lists, shared lists can be filtered using withCondition() and sorted or limited
	using with().
</p>

<h2 id="linkfilters">Filtering by link (3.5)</h2>
<p>
	Unlike own lists, you can filter a shared lists by their linking beans.
	For instance if we want to obtain all villages that our army defends:
</p>
<?php code("
	\$villages = \$army->withCondition(' army_village.action = ? ',
		array('defend'))->sharedVillage;
"); ?>

<h2>Access the link bean</h2>
<p>
	To access the links between an army and its villages:
</p>
<?php code("
	\$links = \$army->ownArmyVillage;
	//Prior to 3.4 use: ownArmy_village
");?>
<p>
	Once you have obtained a link you can add additional properties:
</p>
<?php code("
	\$link->action = 'defend';
"); ?>

<h2 id="additional_properties">Additional properties (3.4)</h2>
<p>
	
	To add additional properties to a relation you can add the 
	shared beans using the link() method like this:	
</p>
<?php code("
	\$village->link('army_village',
		array('action'=>'defend'))->army = \$army1;
");?>
<p>
	This will not just associate the army and the village but also
	qualify the relation by adding the property 'action' to the relationship.
	Instead of an array you may also use a JSON string: 
</p>
<?php code("
	\$village->link('army_village',
		'{\"action\":\"defend\"}')->army = \$army1;
");?>
<p>
	Sometimes N-M relations are hidden in concepts (or we could argue
	that N-M relations are hidden concepts).
	For instance, if you have a bean called visit that has both
	an army and a village you can use this bean as a link table associating
	armies and villages.
	To use regular tables as link tables, just rename the
	association:
		 
</p>
<?php code("
	\$village->link('visit',
		'{\"action\":\"defend\"}')->army = \$army1;
	
	R::store(\$village);
	
	//returns armies linked in visit table
	\$armies = \$village->via('visit')->sharedArmy;

	//access the visit information
	\$visit = \$army->ownVisit;

	//or...
	\$village->ownVisit;
");?>

<p class="version" id="via">
	Instead of via(), you can also use R::renameAssociation, this method also accepts an associative array instead of just
	single values. The via() method is an alias for renameAssociation since 3.5.
</p>


<h2>In other words&hellip;</h2>
<p class="note">
	Shared lists are the RedBeanPHP way of saying: 'many-to-many'.
</p>


<h1>Parent Object</h1>
<p>
	We previously discussed the own-list. This is RedBeanPHP's version
	of a <b>one-to-many</b> relationship. However, if we look from the other end
	of the relationship we have a <b>many-to-one</b> relationship: many buildings
	belong to <b>one</b> village. Suppose you are working on this end
	of the relationship; you have a building, how can you access its village?
</p>
<?php code("
	\$village = \$building->village;
"); ?>
<p>
	We call this the <i>parent bean</i>.
	The term <i>'parent'</i> may be confusing but on the other hand it clearly indicates that
	on the other side the bean is part of a <i>list</i> <b>owned</b> by another bean. 
</p>
<p>
	You can unset the parent bean like this:
</p>
<?php code("
	unset(\$building->village); 
	
	\$building->village = null;
"); ?>
<p>
	Trying to assign something other than a bean to a parent object field will
	throw an exception:
</p>
<?php code("
	//throws a RedBeanPHP Security exception
	\$building->village = 'Lutjebroek'; 	
"); ?>

<p>
	Once a property has been used to store a bean, it can only be
	used to store a bean afterwards. 
</p>
<h2>The Reserved Column</h2>
<p class="warning">
	While RedBeanPHP uses the <b>village_id</b> column to refer to the actual
	related record, the <b>village</b> property of the bean will be used to 
	return the village bean (<i>a magic getter</i>). This means that both the
	<b>village_id</b> and <b>village</b> columns are actually <b>reserved</b> for the relation mapping.
	<i>Please</i>, do <u>not</u> use a column with the <b>same name as the magic getter</b> (&quot;village&quot; in this case)
	for a different purpose. In RedBeanPHP terms this is called the <i>'reserved'</i> column. 
</p>

<h2>In other words&hellip;</h2>
<p class="note">
	Parent beans are the RedBeanPHP way of saying: 'many-to-one'.
</p>

<h1>Counting beans</h1>
<p>
	In version 3.5 and higher you can count related beans like this:
</p>
<?php code("
	\$numPages = \$book->countOwn('page');
"); ?>
<p>
	This also works for shared lists:
</p>
<?php code("
	\$numProjects = \$member->countShared('project');
"); ?>
<p>
	And with conditions:
</p>
<?php code("
	\$numProj = \$member
			->withCondition(' member_project.role ', array('lead'))
			->countShared('project');

	\$numPages = \$book
			->withCondition(' book_page.number > ? ', array(100))
			->countOwn('page');
"); ?>
<p>
	The first line in the code block above counts all projects in which
	$member participates as a leader. The second example counts all pages
	in book $book after page number 100.
	<br />
	Relation counts also play nice with aliases and via:
</p>
<?php
code("
	\$shop->via('relation')->countShared('customer');

	\$Andy->alias('coAuthor')->countOwn('book');
");
?>
<p>
	The first line in the code block above counts all customers
	for shop $shop using link type: relation. The second line
	counts all books written by Andy as a co-author.
</p>
<p class="note">
	Note that 'coAuthor' will be converted to co_author - the
	canonical name of the property.
</p>

<h1>Eager loading</h1>
<p class="version">
	Preloading/Eager loading requires RedBeanPHP version 3.3+
</p>
<p>
	If you know in advance that you need some parent beans you can inform RedBeanPHP about this
	to avoid unnecessary queries:
</p>
<?php code("
	\$books = R::find('book');
	R::preload(\$books,array('author'));
	foreach(\$books as \$book) echo \$book->author; 
"); ?>
<p>
	Here RedBeanPHP will <b>NOT</b> query each author separately. Instead, the preload() will attach
	all author beans upfront. Preload also understands aliases:
</p>
<?php code("
	\$books = R::find('book');
	R::preload(\$books,array('coauthor'=>'author'));
	foreach(\$books as \$book) echo \$book->coauthor; 
"); ?>

<h2 id="preload34">More powerful preloader</h2>
<p class="version">
	These power-user features require RedBeanPHP version 3.4+
</p>
<p>
	From version 3.4+ on you can preload multiple parents like this:
</p>
<?php code("
	\$texts = R::find('text');
	//to preload page, book and author parents:
	R::preload(\$texts,'page,page.book,page.book.author');
	//or use the short-syntax:
	R::preload(\$texts,'page,*.book,*.author');
"); ?>
<p>
	To retrieve the parent of a previous parent you can use the '*'.
	If you would like to retrieve a parent bean on the same level as the previous parent
	in the list use '&amp;' instead.
</p>
<?php code("
	\$p = R::find('page');
	//preloads page->book, page->book->author
	//and page->book->shelf
	R::preload(\$p,'book,*.author,&.shelf');
"); ?>
<p>
	Note that both 'shelf' and 'author' are parents of book. Therefore
	we prefixed the '.shelf' with an &amp; and not an '*'. If we would have used the
	latter, preload() would have tried to fetch page-&gt;book-&gt;author-&gt;shelf which
	does not exist of course.
	To preload lists:
</p>
<?php code("
	\$books = R::find('book');

	R::preload(\$books,'ownPage|page,sharedGenre|genre');
	
	foreach(\$books as \$book) { 
		print_r(\$book->ownPage);
	} 
"); ?>
<p>
	Preloading is embedded in the syntax of RedBeanPHP, for instance instead of
	using an ugly foreach-loop, RedBeanPHP can make your code more  
	elegant by preparing the preloaded beans for you as arguments of a closure
	(requires PHP 5.3):
</p>
<?php code("
	R::each(\$texts,'page,*.book',
	function(\$text,\$page,\$book){
		...no ugly foreach-loop...
	});
");?>
<p class="version">
	R::each is exactly the same as R::preload. The difference is just stylistic.
	If you use the closure variant I recommend to use <b>'each'</b> to highlight the
	iteration.
</p>

<p class="version" id="sql">
	Since RedBeanPHP 3.4.1 you can use with() conditions in preloading like this:
	'ownBook'=&gt;array('book',' AND category = ? ',array($category)) - i.e. simply replace
	the string 'book' for an array containing:
	<br />
	<br />1. the type string 
	<br />2. the SQL snippet you want to use and
	<br />3. the parameter bindings
	<br /><br />
	Please be aware that these snippets are embedded in the query that retrieves all records
	so adding LIMIT clauses will cause undesirable results.
</p>


<h1>Aliasing</h1>
<p>
	Normally, a property that contains a bean needs to be <b>named after it's type</b>.
	We have seen this with parent objects; to access the village a building belongs to, you
	just read the 
</p>	
<?php code("
	\$building->village 	
"); ?>
<p>
	property.
	90% of the time this is <i>exactly</i> what you need.
	A parent object can be <b>aliased</b> though.
</p>
<p>	
	When dealing with people you often have to store persons using a <i>role name</i>.
	For instance, two people are working on a science project. Both people are in fact
	'person' beans. However one of them is a <i>teacher</i> and the other is a <i>student</i>.
</p>
<?php code("
	list(\$teacher,\$student) = R::dispense('person',2);
	\$project->student = \$student; 
	\$project->teacher = \$teacher; 
"); ?>
<p>
	RedBeanPHP will store both the student and the teacher as persons because
	RedBeanPHP simply <b>ignores</b> the property name when saving. 
	RedBeanPHP stores the student and the teacher both as person beans and
	the project table will get two fields:
	<i>teacher_id</i> and <i>student_id</i> pointing to the respective person records. 
	However when you
	<i>retrieve</i> the project from the <b>database</b>, you need to 
	to tell RedBeanPHP that a student or teacher is in fact a <b>person</b>. To do so,
	you have to use the <b>fetchAs()</b> function:
</p>
<?php code("
	\$teacher = \$project->fetchAs('person')->teacher;
"); ?>


<h2>Aliased Lists (3.3+)</h2>
<p>
	To get a list of all projects associated with a certain person, in the role
	of a student (aliased as student) use:
</p>

<?php code("
	\$person->alias('student')->ownProject;
");?>

<p>
	Note that some functions do <b>not</b> support
	aliased properties; most notably R::dependencies() and R::exportAll().
	Also, aliased names are cached, a list won't reload if prefixed with an
	alias() method. In version 3.5+ the list will reload if the alias has changed though.
</p>



<p class="version">
	Aliased lists have been added in version 3.3
</p>

<h2>In other words&hellip;</h2>
<p class="note">
	Aliasing is the RedBeanPHP way of saying 'one-to-X'.
</p>





<h1>Trees</h1>
<p>
	RedBeanPHP also supports <b>self-referential</b> <b>one-to-many</b> and <b>many-to-many</b> relationships.
	In RedBeanPHP terminology these are called trees. Here is an example, let's decorate a christmas tree with some
	candy canes:
</p>
<?php code("
	\$cane = R::dispense('cane',10);
	\$cane[1]->ownCane = array( \$cane[2], \$cane[9] );
	\$cane[2]->ownCane = array( \$cane[3], \$cane[4] );
	\$cane[4]->ownCane = array( \$cane[5], 
				\$cane[7], \$cane[8] );
	\$cane[5]->ownCane = array( \$cane[6] );
	\$id = R::store(\$cane[1]);
	\$root = R::load('cane',\$id);
	echo \$root->ownCane[2]->ownCane[4]
		->ownCane[5]->ownCane[6]->id;
	//outputs: 6
"); ?>
<p>
In fact trees are just a special case of lists. 
</p>

<h2 id="traversal">Traversal (3.5+)</h2>
<p>
	To get <b>all</b> parents of a bean:
</p>
<?php code("
	\$page->searchIn('page');
"); ?>
<p>
	You can also insert <b>SQL snippets</b>:
</p>
<?php code("
	\$page->withCondition( ' user_id = ? ', array( \$me->id ) )
		->searchIn( 'page' );
");?>
<p>
	You can search for beans in own-lists as well:
</p>
<?php code("
	\$page->withCondition(' content LIKE ? ', array( \$content ) )
		->searchIn( 'ownPage' );
"); ?>
<p>
	The searchIn() method also supports fetchAs, via and alias.
	For instance the following code searches all projects that
	belong to Linda in the role of 'teacher' (alias).
</p>
<?php
code("
	\$linda->withCondition(' subject = ? ', array( 'math' ) )
		->alias( 'teacher' )
		->searchIn( 'ownProject' );
		
");
?>
<p>
	While searchIn() is a powerful tool, there are some limitations.
	It does not support shared lists and ordering does not work as you expect 
	(because the recursive filtering it is not possible to use SQL to order the
	entire result set). Also note that this method can be slow for large trees.
</p>

<h2>In other words&hellip;</h2>
<p class="note">
	A Tree is the RedBeanPHP version of a self-referential relationship.
</p>

<h1>Enums and more</h1>
<p>
	An enum type is a special bean that enables for a property to be a set of predefined values.
	To use an ENUM:
</p>
<?php code("
	\$tea->flavour = R::enum( 'flavour:english' );
"); ?>
<p>
	The ENUM method will do a lot of work here. First it checks whether there exists
	a type of bean with a property name set to 'ENGLISH'. If this is the case, enum() will
	return this bean, otherwise it will create such a bean, store it in the database and
	return it. This way your ENUMs are created on the fly - properly. To compare an
	enum value:
</p>
<?php code("
	\$tea->flavour->equals( R::enum('flavour:english') );
	//stores ENGLISH in the database... UPPERCASE!
");?>
<p>
	To get a list of all flavours, just omit the value part:
</p>
<?php code("
	\$flavours = R::enum('flavour');
");?>
<p>
	To get a comma separated list of flavours you might want to combine
	this method with other Label Maker methods:
</p>
<?php code("
	echo implode( ',', R::gatherLabels( R::enum('flavour') ) );
"); ?>
<p>
	Since RedBeanPHP enums are beans you can add other properties as well.
</p>
<p class="version">
	The enum() method has been added in RedBeanPHP version 3.5
</p>

<h2>Other relations</h2>

<p>
	Most of the time you use one-to-many and many-to-many relations.
	As of 3.4 RedBeanPHP offers <b>limited</b> (mostly to enable you to
	communicate with legacy databases more easily) support for other relations as well.
</p>
<h2>One-to-one</h2>
<p>
	One-to-one relations are not used frequently. Traditional 1-1 records are
	linked by their primary keys. In RedBeanPHP you can load them like this:
</p>
<?php code("
	list(\$author,\$bio) = R::loadMulti('author,bio',\$id);
"); ?>
<p>
	This loads an author and a biography with the same ID.
	You need to make sure the IDs are in sync yourself, you can use
	transactions for this. Note that real one-to-one relations are rare and
	most of the time they represent legacy records. Also consider using
	a simple own-list instead of a real one-to-one or just put the
	records in the same table. 
</p>
<p class="warning">
	One-to-one relations are not very 'RedBeanish'. In RedBeanPHP you would
	simply store this information in the same bean.
</p>
<h2>Polymorph relations</h2>
<p>
	Relational database are <b>not</b> suitable for polymorph relations.
	However if you ever need to load a bean of which the type is based on a 
	field value you can use a slight variation of fetchAs():
</p>
<?php code("
	\$ad = \$page->poly('contentType')->content;
");
?>
<p>
	Returns the bean referred to in content_id using the bean type
	specified in content_type. If content type contains the value 'advertisement'
	the content will be a bean with type 'advertisement' and id = content_id.
</p>
<p class="warning">
	Don't try to use new polymorph relations with poly(), RedBeanPHP does not
	support polymorph relations. This method has been added to ease loading
	existing polymorph relations only.  Use poly() to retrieve polymorph data
	from an external or legacy database. 
</p>


<h1>Tags</h1>
<p>
Tags are often used to categorize or group items into meaningful groups. 
To tag a an item:
</p>
<?php code("
	R::tag( \$page, array('topsecret','mi6') );
");?>
<p>
To <b>fetch all tags</b> attached to a certain bean we use the same method but without the tag parameter:
</p>
<?php code("
	\$tags = R::tag( \$page ); //returns array with tags
"); ?>
<p>
	To <b>untag</b> an item use 
	
</p>
<?php code(" 
	R::untag(\$bean,\$tagListArray);"); ?>
<p>
	To get all beans that have been tagged with $tags, use <b>tagged()</b>: 
</p>
<?php code(" 
	R::tagged( \$beanType, \$tagList );"); ?>
<p>
	To find out whether beans have been tagged with specific tags, use <b>hasTag()</b>:
</p>
<?php code(" 
	R::hasTag($\bean, \$tags, \$all=false)");?>
<p>
	To <b>add tags</b> without removing the old ones:
</p>
<?php code("
	R::addTags( \$page, array('funny','hilarious') );
");?>
<p>
	To get beans that have ALL these tags: (since 3.2)
</p>
<?php code("
	//must be tagged with both tags
	R::taggedAll( \$page, array('funny','hilarious') ); 
");?>





<h1>Cheatsheet</h1>
<p>
	If you are new to RedBeanPHP but you have been working with
	relational databases in the past you might be a bit confused with the
	terminology in RedBeanPHP. Here is a little 'cheatsheet' mapping
	relational terms to RedBeanPHP terms. You might find this useful.
</p>
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
<p>
	While RedBeanPHP is perfectly capable of managing almost any
	kind of relationship, I recommend to keep things simple. 
	Most of the time the basic relations like one-to-many, many-to-one, self-referential relations and many-to-many will do.
	Sometimes I use one-to-X and X-to-one (aliasing). Personally I never use one-to-one or polymorph, these are 
	extremely uncommon.
</p>


<category>Models</category>

<h1>Models and FUSE</h1>
<p>
	A <b>model</b> is a place to put validation and business logic. 
	Although you can put validations in your controller that would require you to
	copy-and-paste it whenever you need it. So putting validation and business logic
	into a central place saves you a lot of work. Models are connected to beans
	using <b>FUSE</b>. The best thing about FUSE is that you don't have to write any
	code to connect a bean to a model. FUSE will make sure every bean finds its model
	automatically.
</p>
<p>
	Imagine a Jazz band that accepts just 4 members, in this case
	we need to add a validation rule 'no more than 4 band members'. 
	We could add this rule to the controller:
</p>
<?php code("
	if (count(\$_post['bandmembers'] > 4) ... 
");?>
<p>
	But like I said, we need to copy this code to every controller
	that deals with band members.	
	Now let's define a
	band model to see how this works with FUSE:
</p>
<?php code("
	class Model_Band extends RedBean_SimpleModel {
		public function update() {
			if (count(\$this->ownBandmember)>4) {
				throw new Exception('too many!');
			}
		}
	}
");?>
<p>
	This model contains an <b>update()</b> method. FUSE makes sure that the update() method will get invoked
	as soon as we try to store the bean:
</p>
<?php code("
	\$band = R::dispense('band');
	\$musicians = R::dispense('bandmember',5);
	\$band->ownBandmember = \$musicians;
	R::store(\$band);
");?>
<p>
	This code will trigger an exception because it tries to add too many band members to the band.
	As you can see, the model is automatically connected to the bean; we store the bean using R::store() and
	update() is called on a populated instance of Model_Band. Just like update there are several other hooks:
</p>

<p class="note">
	If you use PHP namespaces and your model resides in namespace \Models simply add the following constant
	on top of your code: <br />
	define( 'REDBEAN_MODEL_PREFIX', '\\Models\\' );
	<br />
	(supported since 3.5)
</p>

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
<p>
	To demonstrate the order and use of all of these methods let's consider
	an example:
</p>
<?php code("
	\$lifeCycle = '';
	class Model_Bandmember extends RedBean_SimpleModel {
		public function open() {
		   global \$lifeCycle;
		   \$lifeCycle .= \"called open: \".\$this->id;
		}
		public function dispense(){
		    global \$lifeCycle;
		    \$lifeCycle .= \"called dispense() \".\$this->bean;
		}
		public function update() {
		    global \$lifeCycle;
		    \$lifeCycle .= \"called update() \".\$this->bean;
		}
		public function after_update(){
		    global \$lifeCycle;
		    \$lifeCycle .= \"called after_update() \".\$this->bean;
		}
		public function delete() {
		    global \$lifeCycle;
		    \$lifeCycle .= \"called delete() \".\$this->bean;
		}
		public function after_delete() {
		    global \$lifeCycle;
		    \$lifeCycle .= \"called after_delete() \".\$this->bean;
		}
	}
	\$bandmember = R::dispense('bandmember');
	\$bandmember->name = 'Fatz Waller';
	\$id = R::store(\$bandmember);
	\$bandmember = R::load('bandmember',\$id);
	R::trash(\$bandmember);
	echo \$lifeCycle;
");?>
<p>output:</p>
<?php code("
	called dispense() {\"id\":0}
	called update() {\"id\":0,\"name\":\"Fatz Waller\"}
	called after_update() {\"id\":5,\"name\":\"Fatz Waller\"}
	called dispense() {\"id\":0}
	called open: 5
	called delete() {\"id\":\"5\",\"band_id\":null,\"name\":\"Fatz Waller\"}
	called after_delete() {\"id\":0,\"band_id\":null,\"name\":\"Fatz Waller\"}
");?>

<h2>$this</h2>
<p class="note">
	In the model, $this is bound to the bean. As is $this-&gt;bean.
</p>

<h2>Boxing</h2>
<p class="note" id="boxing">
	RedBeanPHP <b>3.2</b> offers $bean->box and $model->unbox() to easily switch between models and beans.
	For instance if you have a bean $band, to box it use: $modelBand = $band->box(); This also works the other way
	around; if you have a model $band and you want to obtain the bean, use $bean = $band->unbox();
</p>

<h2>Using namespaces</h2>
<p class="note">
	If you use PHP native namespaces you can adjust the model mapping to load
	your models from the 
	<a href="/how_fuse_works#namespaces" title="Learn more about using RedBeanPHP ORM models with PHP namespaces">desired namespace</a>.
</p>


<h1>How Fuse Works</h1>
<p>
Fuse adds an event listener (Observer pattern) to the RedBeanPHP object database. 
If an event occurs it creates an instance of the model that belongs to the bean. 
It looks for a class with the name Model_<b>X</b> where <b>X</b> is the type of the bean. 
If such a model exists, it creates an instance of that model and calls loadBean(), passing the bean. 
This will copy the bean to the internal bean property of the model (defined by the superclass [SimpleModel]). 
All bean properties will become accessible to $this because FUSE relies on magic getters and setters.
</p>
<p>
<img alt="" src="img/fuse.jpeg" alt="fuse" />
</p>

<h2>Remapping models</h2>
<p>
	By default RedBeanPHP maps a bean to a model using the Model_<b>X</b> convention where <b>X</b> gets replaced by the
	<b>type</b> of the bean. You can also provide your own mapper, here is how:
</p>
<?php
echo code("
	\$formatter = new MyModelFormatter;
	RedBean_ModelHelper::setModelFormatter(\$formatter);
");
?>
<p>
	Here we tell RedBeanPHP to use the MyModelFormatter class to find the correct bean-to-model mapping. 
	This class looks like this:
</p>
<?php
echo code("
	class MyModelFormatter implements RedBean_IModelFormatter {
		public function formatModel(\$model) {
			return \$model.'_Object';
		}
	}
");
?>
<p>
	This class will make sure that a bean of type 'coffee' will be mapped to Coffee_Object instead of Model_Coffee.
</p>


<h2 id="namespaces">Namespaces</h2>
<p>
	RedBeanPHP uses Poor man's namespacing, not the PHP backslash namespaces.
	However if you want to use models in a PHP backslash namespace you can remap the Model Formatter
	like this:
</p>
<?php code("
	class MyModelFormatter implements RedBean_IModelFormatter {
     		public function formatModel(\$model) {
            		return '\\\'.'Models'.'\\\'.\$model;
     		}
	}
	\$formatter = new MyModelFormatter;
	RedBean_ModelHelper::setModelFormatter(\$formatter);

");?>
<p>
	This example will load Models from the Models namespace.
</p>

<p class="version" id="nsmodel">
	In RedBeanPHP 3.5 the space.php script will append this code (NSModelFormatter)
	for you to the namespaced file.
</p>

<p class="version">
	In formatModel() use func_get_arg(1) to obtain the bean as well. (since RedBeanPHP 3.1)
</p>

<h2>Setting the bean in a Model</h2>
<p>
	Sometimes you want FUSE to work the other way around. You call a <b>static method</b> on a model
	and you want to set a bean in the model manually.
	To accomplish this set the reference to the model as a meta property:
</p>
<?php code("
	\$this->bean = R::dispense('bean');
	\$this->bean->setMeta('model',\$this);
");?>
<p>
	Now, the bean will be connected to the current Model instance.
</p>

<h2>$this</h2>
<p>
	In the model, $this-&gt;bean refers to the bean. You can access the real bean using $this->bean from inside a model.
	If a property does not exist $this-&gt;$property will return a the property, but it will not return a reference to lists
	so I recommend to always use $this-&gt;bean-&gt;$property if you want to access $property of the bean in your model.
</p>




<h1>Fuse Custom Method</h1>
<p>
	FUSE does not only support hooks like <a href="/models_and_fuse" title="Learn how to use Models and FUSE">update() and delete()</a>. You can also call
	a <b>non-existent</b> method on a bean and it will fire the corresponding method on the model.
</p>
<?php code("
	class Model_Dog extends RedBean_SimpleModel {
	        public function bark() {
	                echo 'Whaf!';
	        }
	}
	
	\$dog = R::dispense('dog');
	\$dog->bark(); //echos 'Whaf!'
"); ?>
<p>
	Learn how you can write Models that automatically connect to be beans using <a title="Learn about FUSE" href="/models_and_fuse">FUSE</a>.
</p>
<h1>Dependency Injection</h1>
<p>
	RedBeanPHP <b>3.2</b> and higher supports <a target="_blank" href="http://martinfowler.com/articles/injection.html" title="What is DI?">Dependency Injection</a>.
	Dependency Injection is a way to keep your models free from dependencies, reducing <a target="_blank" href="http://en.wikipedia.org/wiki/Loose_coupling" title="Loose Coupling">coupling</a>.
	Here is how DI works in RedBeanPHP:
</p>
<?php code("
	//Dependencies
	class Dependency_Coffee {}
	class Dependency_Cocoa {}

	//The model that needs these things
	class Model_Geek extends RedBean_SimpleModel {
	private \$cocoa;
	private \$coffee;
	public function setCoffee(Dependency_Coffee \$coffee) {
		\$this->coffee = \$coffee;
	}
	public function setCocoa(Dependency_Cocoa \$cocoa) {
		\$this->cocoa = \$cocoa;
	}
	public function getCoffee() {
		return \$this->coffee;
	}
	..same for cocoa..
	}
"); ?>
<p>
	First, we need to tell RedBeanPHP we would like to use DI. RedBeanPHP ships with a very
	decent injector which can be extended
	 if necessary:
</p>
<?php code("
	\$di = new RedBean_DependencyInjector;
	RedBean_ModelHelper::setDependencyInjector( \$di );
"); ?>
<p>
	Now, add the services to your injector:
</p>
<?php code("
	\$di->addDependency('Coffee',new Dependency_Coffee);
	\$di->addDependency('Cocoa',new Dependency_Cocoa);
"); ?>
<p>
	That's all. Let's get our caffeinated geek!
</p>
<?php code("
	\$geek = R::dispense('geek');
	\$coffee = \$geek->getCoffee(); //returns the coffee
"); ?>
<p>
	This is how dependency injection in RedBeanPHP 3.2 and higher works. If you need even more
	flexibility you can override the getModelForBean( $bean ) method in the Bean Helper, this method
	returns the model for the bean. Here you can bootstrap your own dependency injector. In this method
	you can call RedBean_ModelHelper::factory($modelName) to obtain a model (and it's dependencies).
</p>

<category>Database</category>


<h1>Schema</h1>
<p>
	RedBeanPHP generates a sane and readable database <b>schema</b> for you. 
	Here are the schema <b>conventions</b> used by RedBeanPHP: 
</p>
<table>
	<tr><td>Field names:</td><td>Lowercase a-z, 0-9 and underscore (_)</td></tr>
	<tr><td>Table name:</td><td>Should match bean type, a-z, 0-9</td></tr>
	<tr><td>Primary key:</td><td>Each table should have a primary key named 'id' (int, auto-incr)</td></tr>
	<tr><td>Foreign key:</td><td>Format: &lt;TYPE&gt;_id</td></tr>
	<tr><td>Link table:</td><td>Format: &lt;TYPE1&gt;_&lt;TYPE2&gt; sorted alphabetically</td></tr>
</table>
<p>
	Be careful with underscores; they are used for linking tables and foreign keys. It's safe to use
	underscores in property names, but try not to use them in type names/tables. 
</p>
<h2>Schema functions (3.5+)</h2>
<p>
	To obtain the name of the table of a bean:
</p>
<?php
code("
	\$bean = R::dispense('book');
	\$beanTable = \$bean->getMeta('type');
");
?>
<p>
	To get all the columns in this table:
</p>
<?php code("
	\$fields = R::inspect('book');
"); ?>
<p>
	To get all tables:
</p>
<?php
code("
	\$listOfTables = R::inspect();
");
?>
<p class="version">
	In RedBeanPHP 3.4 and earlier use R::$writer-&gt;getTables() and R::writer-&gt;getColumns($type).
</p>
<br/>

<h1>Multiple databases</h1>
<p>
	There are two important methods to keep in mind when working with multiple <b>databases</b>.
	To add a new database connection use R::addDatabase()
</p>
<?php
code("
	R::addDatabase('DB1','sqlite:/tmp/d1.sqlite',
		'user','password',\$frozen);
");
?>
<p>
	To select a database, use the key you have previously specified:
</p>
<?php
code("
	R::selectDatabase('DB1');
");
?>
<p>
	If you used <b>R::setup()</b> to connect to your database you can switch back to this database
	using: 
</p>
<?php
code("
	R::selectDatabase('default');
");
?>


<h1>Transactions</h1>
<p>
	RedBeanPHP offers three simple methods to use database <b>transactions</b>: begin(), commit() and rollback(). 
	A transaction is a <b>unit of work</b> performed within a database management system (or similar system) against a database, and treated
	in a coherent and reliable way independent of other transactions. To <b>begin</b> a transaction use R::begin(), to <b>commit</b> all changes to the
	database use R::commit() and finally to <b>rollback</b> all pending changes and make sure the database is left untouched use R::rollback().
	Usage:
</p>
<?php

echo code("
	R::begin();
	try{
		R::store(\$page);
		R::commit();
	}
	catch(Exception \$e) {
		R::rollback();
	}
");
?>
<p>
	The RedBeanPHP transactional system works exactly like conventional database transactions. Because RedBeanPHP throws <b>exceptions</b>, you can catch
	the exceptions thrown by methods like R::store(), R::trash(), R::associate() etc, and perform a rollback(). The rollback() will completely undo
	all the pending database changes. 
</p>
<p>
	If you are new to transactions, consider reading about 
	<a href="http://en.wikipedia.org/wiki/Database_transaction" title="transactions" target="_blank">database transactions</a> first.

</p>

<h2>Note about auto-commits</h2>
<p class="note">
	Many databases automatically commit after changing schemas, so make sure you test your transactions after <b>R::freeze(true);</b> !
</p>

<p class="version">
	As of version 3.4 transactions will no longer work in fluid mode.
	This has been implemented because in fluid mode the schema gets
	updated frequently causing transactions to auto-commit or 
	throw errors.
</p>

<h2>Transaction closure</h2>
<p>
	As of RedBeanPHP version 3.4 you can also use R::transaction() and
	simply pass a closure like this:
</p>
<?php code("
	R::transaction(function(){
		..store some beans..
	});
");?>
<p>
	The transaction() method also supports nested transactions.
</p>

<p class="version">
	As of version 3.5, R::transaction() will return the result of
	the closure (if successful).
</p>

<h1>Nuke</h1>
<p>
	The R::nuke() command just does what you think it does. It <b>empties</b> the entire database.
	This is really useful for testing purposes. R::nuke() only works in fluid mode to prevent any
	damage. Usage:
</p>
<?php code("
	R::nuke();
");?>
<p>
	Like other nuclear tools, nuke() should be used with care.
</p>




<category>Advanced</category>


<h1>Association API</h1>
<p>
	Another way to use <b>many-to-many</b> relations is to use the <b>R::associate()</b> function. This function takes two beans
	and associates them. To get all beans related to a certain bean you can use its counterpart <b>R::related()</b>.
</p>
<?php code("
	R::associate( \$book, \$page );
	R::related( \$page, 'book' ); 
	R::relatedOne( \$page, 'book'); //just the first bean
");?>
<p>
	To <b>break</b> the association between the two:
</p>
<?php code("
	R::unassociate( \$book, \$page );
");?>
<p>
	To <b>unassociate</b> all related beans:
</p>
<?php code("
	R::clearRelations( \$book, 'page' );
");?>

<p class="version">
	From version 3.3 on you can use multiple beans with (un)associate, like this:
	R::associate($wines, $barrels);
</p>

<h2>Are Related</h2>
<p>
	To find out whether two specific beans are <b>related</b>, use the 
	R::areRelated() function.
</p>
<?php code("
	R::areRelated( \$husband, \$wife );
");?>
<p>
	This function returns TRUE if the two beans have been associated using
	a many-to-many relation (associate) and FALSE otherwise.
</p>
<h2>Association and SQL</h2>
<p>
	With the Association API it's possible to include some <abbr title="Structured Query Language">SQL</abbr> in your relational
	query:
</p>
<?php code("
	R::related( \$album, 'track', ' length > ? ', array(\$seconds) );
");?>

<h2>Extended Associations</h2>
<p class="warning">
	<b>Extended Many-to-many relations</b> are <i>deprecated</i> as of RedBeanPHP 3.4.<br/>
	As of RedBeanPHP 3.4 you really don't need this functionality anymore. Instead use the 
	<a title="Use the intermediate bean notation to store extended N-M relations" href="/shared_lists#link">intermediate bean notation</a>.
</p>
<p>
	An <b>extended association</b> is a <b>many-to-many</b> association with some extra information.
</p>
<?php code("
	R::associate(\$track,\$album,array('sequencenumber'=>\$s));
");?>
<p>
	<abbr title="Javascript Object Notation">JSON</abbr> is also allowed:
</p>
<?php code("
	R::associate(\$track,\$album,'{\"order\":\"2\"}');
");?>
<p>
	Or just a <b>string</b>:
</p>
<?php code("
	R::associate(\$track,\$album,'2'); //stored in property 'extra'
");?>
<p>
	To <b>load</b> a association link:
</p>
<?php code("
	\$keys = R::\$extAssocManager->related(\$album,'track');
");?>
<h2>Be careful with extended relations</h2>
<p>

	Note that you almost never need extended associations at all. In most cases
	an intermediate bean is better. 
	For instance, imagine a <b>project</b> bean and a <b>person</b> bean. 
	You want to connect a
	<b>person</b> to a <b>project</b> so maybe you think:
</p>
<?php code("
	R::associate(\$project,\$person);
");?>	
<p>	
	But then you realize you need to specify
	a role as well. It's tempting to switch to an extended association now, however this is not a good idea.
	What you are really looking at is an <b>intermediate bean</b>. Don't try to obscure this bean in a relation. In this
	case we have to differentiate between a <b>person</b> and a <b>participant</b>.	
</p>
<?php code("
	\$participant->person = \$person;
	\$participant->role = 'developer';
	\$project->ownParticipant[] = \$participant;
");?>	
<p>
	This approach has several advantages; you can easily add more information to the participant bean:
</p>
<?php code("
	\$participant->leader = true;
");?>	
<p>
	You can model the fact that participants can be represented by multiple persons (for instance if someone gets ill): 
</p>
<?php code("
	\$participant->person = \$replace;
");?>
<p>
	...and it's also easy to find out how frequently someone is
	participating in projects:
</p>
<?php code("
	\$activities = \$person->ownParticipant;
");?>
<p>
	It would be cumbersome hide all this in a link table by using extended associations. 
</p>

<h2>Rule of thumb&hellip;</h2>
<p class="note">
	Here is my rule of thumb: if you need to <b>qualify</b> a relationship you 
	<b>probably</b> need to use an intermediate bean.
</p>


<h1>Copy Beans</h1>

<p>
	<b>R::dup()</b> makes a deep copy of a bean properly and without storing the bean. All own-beans will be copied as well. And
	all shared beans will be shared with the bean. 
	The bean will not be stored so you have the chance to modify it before saving. Usage:
</p>
<?php code("
	//entire bean hierarchy
	\$book->sharedReader[] = \$reader;
	\$book->ownPage[] =\$page;
	\$duplicated = R::dup(\$book);
	//..change something...
	\$book->name = 'copy!';
	//..then store...
	R::store(\$duplicated);
"); ?>

<h2 id="speed_up_dup">Performance</h2>
<p>
	Both dup() and exportAll() need to query the database schema which is slow. To speed up the process you can 
	pass a database schema: 
</p>
<?php code("
	R::\$duplicationManager->setTables(\$schema);
");?>
<p>
	To obtain the schema use:  
</p>
<?php code("
	\$schema = R::\$duplicationManager->getSchema();
");?>
<p>
	You can now use this schema to feed it to setTables(). R::dup() and R::exportAll() both use this schema.
</p>




<h1>Import and Export</h1>
<p>
	You can <b>import</b> an array into a bean using: 
</p>
<?php code("
	\$book->import(\$_POST);
");?>
<p>
	The code above is handy if your <b>$_POST</b> request array only contains book data. It will
	simply load all data into the book bean. You can also add a selection filter:
</p>
<?php code("
	\$book->import(\$_POST, 'title,subtitle,summary,price');
");?>
<p>
	This will restrict the import to the fields specified. Note that this does not
	apply any form of validation to the bean. Validation rules have to be written in the <a title="Models and FUSE" href="/models_and_fuse">model</a>
	or the controller.
</p>
<p>
	You can <b>export</b> the data inside a bean to an array like this:
</p>
<?php code("
	\$bookArray = \$book->export();
");?>
<p id="toarray">
	Calling <b>export()</b> on a bean will export the data of a single bean into an array.
	R::beansToArray takes an array of beans and returns an array containing their values (requires version 3.5 or higher).
</p>

<h2>Recursive Export</h2>
<p>
	To recursively export one or an array of beans use:
</p>
<?php code("
	\$arrays = R::exportAll( \$beans );
");?>
<p>
	Bean lists in exports have keyless.
</p>


<h2 id="speed_up_dup">Performance</h2>
<p>
	Both dup() and exportAll() need to query the database schema which is slow. To speed up the process you can 
	pass a database schema: 
</p>
<?php code("
	R::\$duplicationManager->setTables(\$schema);
");?>
<p>
	To obtain the schema use:  
</p>
<?php code("
	\$schema = R::\$duplicationManager->getSchema();
");?>
<p>
	You can now use this schema to feed it to setTables(). R::dup() and R::exportAll() both use this schema.
</p>

<p class="version">
	Since version 3.3: R::exportAll( $beans, true ) -- exports parent beans as well.
</p>

<p class="version" >
	Since version 3.3: to only export a specific set of bean types:
	R::exportAll( $beans, true, $filters ); here $filters contains the list of
	types to be exported.
</p>

<p class="version" id="export34">
	If the exportAll() function does not export enough related beans (for instance you also want to load some of the
	shared relations) you can do a R::preload() first (RedBeanPHP 3.4+).
</p>

<h2>Careful&hellip;</h2>
<p class="warning">
	Import functions do not validate user input.
	<br /><br />
	exportAll() is <b>slow</b>. You can speed up by passing an array of cache tables:
	<br />R::$duplicationManager->setTables($tables); (<b>3.3+</b>)<br/> or export manually using the bean->export() functions.
</p>

<h2>Swap</h2>
<p>
	It's very common in real life applications to swap properties. 
	For instance, in a <abbr title="Content Management System">CMS</abbr> you often have a feature to change the order of pages or menu items. 
	To swap a property use:
</p>
<?php code("
	\$books = R::batch('book',array(\$id1,\$id2));
	R::swap(\$books,'rating');
"); ?>
<p>
	We simply load two books using the <a title="Learn how to load a batch of beans" href="/loading_a_bean">batch loader</a>, then we pass the array with two books to swap() as well as the 
	name of the property we which to swap values of.
</p>


<h1>Debug and log</h1>
<p>
	RedBeanPHP offers excellent 
	<a href="#logging" title="Logs drifing on a sea of beans.">logging</a> 
	and 
	<a href="#debugging" title="Bugging the beans!">debugging</a> tools.
</p>
<h2 id="logging">Logging</h2>
<p>
	Sometimes you want to log what's going on in the adapter. This is known as query logging.
	Of course you could use a simple R::debug() but that just dumps all the queries directly
	on your screen which might not be exactly what you want. Maybe you want to write the logged queries
	to a file or analyze them directly. To start logging queries simply use:
</p>
<?php code("
	\$queryLogger = RedBean_Plugin_QueryLogger::getInstanceAndAttach(
		R::getDatabaseAdapter()
	);
");?>
<p>
	This will create an instance of the default Query Logger plugin and return it.
	This also attaches an event listener to the database adapter. To obtain the current database
	adapter use: R::getDatabaseAdapter() or simply: R::$adapter. To get the logs:
</p>
<?php code("
	\$queryLogger->getLogs();
"); ?>
<p>
	This will return an array containing all the queries that have been processed since the
	logger has been attached to the adapter. For example, the output of R::nuke() on an SQLite
	database looks like this:
</p>
<kbd>
    [0] =&gt; PRAGMA foreign_keys = 0 
    <br />[1] =&gt; SELECT name FROM sqlite_master
			WHERE type='table' AND name!='sqlite_sequence';
    <br />[2] =&gt; drop table if exists bean
    <br />[3] =&gt; drop view if exists bean
    <br />[4] =&gt; PRAGMA foreign_keys = 1 

</kbd>
<p>
	You can also search for specific queries with grep():
</p>
<?php code("
	\$queryLogger->grep('DROP');
"); ?>
<p>
	The code above will return an array of all queries containing the word 'DROP'. Finally,
	to clear the logs use: 
</p>
<?php code("
	\$querLogger->clear();
"); ?>
<h2>Manual Logging</h2>
<p>
	You can write your own query logger by extending the Query Logger class:
</p>
<?php code("
	class MyLogger extends RedBean_Plugin_QueryLogger { .. }
"); ?>
<p>
	Attach the logger like this:
</p>
<?php code("
	\$adapter->addEventListener('sql_exec',new MyLogger);
"); ?>
<p>
	This will add your own logger as an event listener / observer to the adapter.
	Your logger will listen for the event with id 'sql_exec'. Make sure you implement the
	onEvent() method defined in the QueryLogger class.
</p>
<h2 id="debugging">Debugging</h2>
<p>
	The <strong>RedBeanPHP</strong> debugger displays all queries on screen. Activate the
	debugger using the <b>R::debug()</b> function:
</p>
<?php code("
	R::debug(true);
");?>
<p>
	To turn the debugger off:
</p>
<?php code("
	R::debug(false);
");?>
<h2>Tainted</h2>
<p>Sometimes its useful to know whether a bean has been modified or not. The current state of the bean is stored in a Meta property called <b>tainted</b>. To get the state of the bean use:</p>
<?php code("
	\$bean->getMeta('tainted');
");?>
<p>If the bean has been modified this will return boolean TRUE, otherwise it will return FALSE.</p>


<h1>Meta Data</h1>
<p>
	Beans contain meta information; for instance the type of the bean. 
	This information is hidden in a meta information field. 
	You can use simple accessors to get and modify this meta information.
<p>
<p>
To get a meta property value:
</p>
<?php code("
	\$value = \$bean->getMeta('my.property', \$defaultIfNotExists);
");?>
<p>
The default default value is NULL.
</p>
<p>
To set a meta property:
</p>
<?php code("
	\$bean->setMeta('foo', 'bar'); 
");?>
<p>
The type (in 3.0+ this is always the same as the database table) 
of the bean is stored in meta property 'type' and can be retrieved as follows:
</p>
<?php code("
	\$bean->getMeta('type');
");?>
<br /><br />

<p class="note">
	<b>Since 3.0:</b> Meta data can be used for explicit casts. For instance if you want to store something
	as a POINT datatype:
</p>

<?php code("
	\$bean->setMeta('cast.myproperty','point'); 
"); ?>




<h2>Public Meta properties</h2>
<p>
	Here is an overview of all public meta properties used by the system. These
	meta properties are safe to read and can be used reliably to extract information
	about beans. Don't change them though! 
</p>

<table>
		<thead><tr><th>Property</th><th>Function</th></tr></thead>
		<tbody>
			<tr><td>type</td><td>(string) Determines the type of the bean, don't change!</td></tr>
			<tr><td>tainted</td><td>(boolean) Whether the bean has been modified.</td></tr>
			<tr><td>cast.*</td><td>Used for explicit casting</td></tr>
		</tbody>
</table>

<h2>Private Meta properties</h2>
<p>
	Here is an overview of all system meta properties. These
	meta properties should not be relied on, they are only for RedBeanPHP internal subsystems.  
</p>
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

<h1>Labels</h1>
<p>
	A Label is a bean with just a name property. You can generate a batch of labels of a certain type
	using:
	
</p>
<?php code("
	\$labels = R::dispenseLabels('meals', 
		array('pizza', 'pasta', 'hamburger')
	);
");
?>
<p>
	This will create three meal objects. Each bean will have a name property
	that corresponds to one of the strings mentioned in the comma separated list.
</p>
<p>
	You can also collect the strings from label beans using:
</p>
<?php code("
	\$array = R::gatherLabels(\$meals);
");
?>
<p>
	The gatherLabels() function returns an alphabetically sorted array of strings each
	containing one name property of a bean in the bean list provided.
</p>



<h1>Cooker</h1>
<p>
	The cooker is a tool to turn arrays (forms, XML, JSON) into beans. 
	An array has to contain a key named 'type' containing the type of bean it represents.
	Further more an array can contain own-lists and shared-lists as nested arrays.
</p>
<?php code("
	\$bandMemberArr = array(
		'type' => 'bandmember',
		'name' => 'Duke',
		'ownInstrument' => array(
			'type'=>'instrument',
			'name'=>'kazoo'	
		)
	);
	
	\$bandMemberBean = R::graph(\$bandMemberArr);
");?>
<p>
	In this example we convert the array 'bandMemberArr' to a bean of type
	'bandmember'. The bean can now be stored in the database.
</p>
<?php code("
	R::store(\$bandMemberBean);
");?>
<p>
	If an array has a field with key 'id', the Cooker will try to load
	the bean instead of dispensing a fresh bean. This means you can also update parts of beans.
</p>

<p class="note">
	The fact that the Cooker also automatically loads beans can become a security issue if
	you don't verify ID integrity. From RedBeanPHP 3.4 on the Cooker will have an extra
	safety setting; if you want to enable bean loading you need to invoke:
	<br />
	RedBean_Plugin_Cooker::enableBeanLoading(true);
	<br />
	first. Otherwise the Cooker will not load and/or update existing beans.
</p>


<p class="note">
	R::graph($array,<b>TRUE</b>) will ignore all beans that appear to be empty (You can use this if you build
	forms; it makes it possible to add an empty form entry to add a new entity of something).
</p>
<h1>Cache</h1>

<p>
	There are two caching mechanisms in RedBeanPHP, the 
	<a href="#querycache" title="Easy caching for RedBeanPHP!">Query Cache</a> and the 
	<a href="#beancache"  title="Advanced caching for RedBeanPHP!">Bean Cache</a>.
	I recommend to use the Query Cache, the Bean Cache is a plugin and it makes RedBeanPHP somewhat more
	complex to use.
</p>

<h2 id="querycache">Query Cache</h2>
<p>
	In RedBeanPHP 3.4 you can use a very <b>easy-to-use</b> caching system: the <b>Query Writer Cache</b>.
	This <i>caching</i> mechanism will return the same result set for identical <i>query-value</i> pairs.
	The cache gets automatically <i>flushed</i> everytime something other than a <i>select</i> query is fired (i.e. an INSERT or DELETE).
	This means that this is a relatively safe cache to use. Issue the following statement to activate the Query Writer Cache:
</p>
<?php code("
	R::\$writer->setUseCache(true);
");?>

<h2 id="beancache">Bean Cache</h2>
<p>
	RedBeanPHP offers a Bean Cache. The bean cache can be configured like this:
</p>
<?php code("
	\$cachedOODB = new RedBean_Plugin_Cache(\$t->getWriter());
")?>
<p>
	To allow the facade to use the cache (note that $t is a toolbox instance RedBean_ToolBox):
</p>
<?php code("
	\$t = R::\$toolbox; //obtain old toolbox
	R::configureFacadeWithToolbox(new RedBean_ToolBox(
	\$cachedOODB,
	\$t->getDatabaseAdapter(),
	\$t->getWriter()));
");?>
<p>
	To flush cache:
</p>
<?php code("
	\$cache->flushAll();
");?>
<p>
	You can also choose to flush cached beans of a given type:
</p>
<?php code("
	\$cache->flush(\$type);
");?>

<h1>Internals</h1>

<h2>PDO types</h2>
<p>
	<strong>RedBeanPHP</strong> is a weakly typed <abbr title="Object Relational Mapping">ORM</abbr>. It accepts all kinds of types in beans;
	integers, strings, booleans and NULL values. After a bean has been retrieved from the
	<b>database</b> each property of the bean contains a value of one of the following types:
	string, NULL, array or <a target="_blank" title="OODB API" href="http://www.redbeanphp.com/api/class_red_bean___o_o_d_b.html">RedBean_OODBBean (object)</a>. RedBeanPHP will never return long values,
	booleans or integers. In fact, most values are returned as a string, with the exception of
	NULL which remains NULL. Composite types are also preserved and are limited to arrays and
	RedBean_OODBBean objects (embedded beans).
</p>
<h2>Value conversion in PDO binding</h2>
<p>

	<strong>RedBeanPHP</strong> tries to convert data types by itself to preserve information.
	It's very important that you understand how RedBeanPHP deals with data types.
	If a value is numeric, the value will be bound to a prepared statement as an integer.
	However this is only the case if the integer representation is the same as a string
	representation. So while RedBeanPHP will bind 1900 as an integer, it will bind
	007 as a string to preserve the padding zeros. Null values will be bound to statements
	using the NULL type. Also be careful with fractions. RedBean stores floats and doubles as
	doubles (bound as string). If you dont want this (to enable a higher level of data precision)
	I recommend to bypass RedBeanPHP and store these values yourself. Also consider using a
	proper Math library if working with high precision calculations. 
</p>
<p class="note">
	Note that we talk here about PDO bindings, to set 007 in a bean property and preserve the zeros
	set the meta property: $agent-&gt;setMeta(&quot;cast.agentname&quot;,&quot;string&quot;); -- where agentname is 
	the property and $agent is the bean.
</p>


<h2 id="objects">Objects</h2>
<p>
	If you don't like static methods, you can use
	the objects behind the facade directly.
	Every method of the R-class is available through
	the original RedBeanPHP objects as well. The facade
	is just that: a thin layer on top of these objects.
	Here is an overview of the most important R-methods
	and how to use them 'the non-static way'.
</p>
<p>
	Note that there are three important objects in RedBeanPHP:
	the adapter (RedBean_Adapter), the query writer (RedBean_QueryWriter)
	and the RedBeanPHP object database (RedBean_OODB).
	We call these objects the core objects, because together they
	represent the foundation on which RedBeanPHP has been built.
	Other objects need these core objects, that's why they are bundled in
	a toolbox (RedBean_ToolBox). So, if you need let's say an instance
	of the Tag Manager class (RedBean_TagManager) you'll have to
	pass an instance of the toolbox to the contructor.
</p>
<h2>Starting RedBeanPHP in Object Mode</h2>
<p>
	To start RedBeanPHP in object mode you can use the
	RedBeanPHP <b>Kickstarter</b>.
</p>
<?php code("
	\$toolbox = RedBean_Setup::kickstart(\$dsn, \$user, \$pass, \$frozen);
");?>
<p>
	This is how you obtain a toolbox. Yes, still static methods. If you really
	want to not use any static method at all, you can manually assemble your toolbox
	like this:
</p>
<?php code("
	\$pdo = new RedBean_Driver_PDO(\$dsn);
	\$adapter = new RedBean_Adapter_DBAdapter(\$pdo);
	\$writer = new RedBean_QueryWriter_MySQL(\$adapter);
	\$oodb = new RedBean_OODB(\$writer);
	\$tb = new RedBean_ToolBox(\$oodb, \$adapter, \$writer);
");?>
<p>
	The purpose of the Kickstarter becomes quite obvious now; if you do this
	manually you have to decide which driver to use (PDO or OCI) and which
	writer to use (MySQL, MariaDB, Postgres, CUBRID or SQLiteT).
	The Kickstarter acts as a <i>factory</i>, inferring the appropriate toolbox
	from your <abbr title="Data Source Name">DSN</abbr>.
</p>

<h2>Wiring</h2>
<p>
	RedBeanPHP has a very decoupled architecture, which makes it very flexibile.
	However this means you need to introduce some objects to eachother.
	First we need to tell RedBeanPHP how beans can obtain the toolbox, this
	means we need to define our own BeanHelper:		
</p>
<?php code("
	class BeanHelper extends RedBean_BeanHelper_Facade {
        	private \$toolbox;
        	public function getToolbox() {
                	return \$this->toolbox;
        	}
        	public function setToolbox(\$toolbox) {
                	\$this->toolbox = \$toolbox;
        	}
	}
");?>
<p>
	Now let's do the wiring:
</p>
<?php code("
	\$r = \$tb->getRedBean();
	
	//A helper for OODB to give to its beans
	\$b = new BeanHelper;
	\$b->setToolbox(\$tb);
	\$r->setBeanHelper(\$b);
	
	//allow OODB to associate beans
	\$r->setAssociationManager(new RedBean_AssociationManager(\$tb));
	
	//enable FUSE
	\$h = new RedBean_ModelHelper;
	\$h->attachEventListeners(\$r);

");?>
<p>
	Normally the facade does all this dull work for you.
	You can also let the facade do this work and still work with instances;
	simply steal the toolbox from the facade after it has been configured:		
</p>
<?php code("
	R::setup(...);
	\$toolbox = R::\$toolbox; //give it to me!
");?>

<h2>Creating a service object</h2>
<p>
	Many methods in the R-facade are just <i>wrappers</i> around calls to
	methods on one of these core objects: <b>OODB</b>, <b>Writer</b> and <b>Adapter</b>. However
	many static methods in R also call so-called service objects. Service
	objects offer secondary functionality. To instantiate a <i>service object</i>
	you need to pass the toolbox to its constructor. The toolbox contains the tools a 
	service object needs to operate: the adapter to connect to the
	database, the OODB object to call basic ORM methods and the writer
	to write queries for the database.
</p>
<p>
	Let's consider an example. Let's say we want to use a function like
	<b>R::find()</b> to find a bean, but we want to use objects rather than
	static methods. How do we accomplish this ? <br />
	First, we glance
	at the table to discover we need to have an instance of the <i>Finder</i> to
	use this method. Finder is a service object, specialized in well,...
	finding stuff!
</p>
<?php code("
	\$f = new RedBean_Finder(\$tb);
"); ?>
<p>
	That's it. Now we have an instance of the Finder service object.
	Now to find a bean use:
</p>
<?php code("
	\$x = \$f->find('music', ' composer = ? ', 'Bach');
");?>
<p>
	Now <b>$x</b> contains all compositions by Bach. Like the result
	of R::find(), $x contains a collection of beans. Unlike
	R::find() we had to build the service object ourselves.
</p>

<h2>Conversion table</h2>
<p>
	Here is a kind of conversion table to look up R-methods
	and find the corresponding methods on objects behind
	the facade.
</p>
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

<p class="note">
	Note that R::dup() first sets filters (if any) 
	and then calls the dup() method on the Duplication Manager service object.
</p>

<h2>Facade-only methods</h2>
<p>
	While most Facade methods are also available in instances, there are some exceptions.
	First there are some batch methods like StoreAll and trashAll, these are just loops around store() and trash() but they
	are only available in the facade. Similarly, R::transaction is just a wrapper around the transaction methods (commit,begin and rollback).
	Some methods just deal with the facade itself: configureFacadeWithToolbox(), addDatabase(), selectDatabase() - these methods
	occur only in the facade of course.
	Finally there the loadMulti method is a facade-only method because it's actually just a loop around R::load.
</p>

<h2>Why static methods in the first place?</h2>
<p>
	The purpose of RedBeanPHP is to boost productivity and maintainability.
	Static methods have certain advantages: they are <b>short</b> (no need to instantiate a class) and
	<b>always available</b> (no need to pass them around). This is great for developers in
	a dynamic environment (like me).		
</p>

<h2>Plugins</h2>
<p>
	In RedBeanPHP ORM, plugins serve a dual purpose. First they provide additional functionality.
	Second they keep the core clean.  
</p>

<p>
	A plugin is simply an additional PHP file residing in the <b>/plugin</b> folder.
	For your convenience, all plugins discussed here are included in the <i>all-in-one</i> package.
		
</p>
<p>
	<b>Since 3.3</b>: Plugins can define additional static methods to be included in the <i>R-facade class</i>. This can 
	be done by adding a line of code after the <b>@plugin</b> directive in the plugin source file.
</p>
<p class="alsosee">
	For more information on how to build a custom all-in-one package please consult the manual 
	page about the build script: <a href="/replica#replica_and_plugins">Replica</a>.
</p>




<category>Project</category>


<h1>FAQ</h1>

<h2>Why do you use so much static functions? What about coupling?</h2>
<p>
	That's only the Facade. Behind the facade you will find a
	landscape of elegant classes, see the 
	<a href="/api" title="API documentation">API</a>
	for advanced usage/more information. 
	The <b>API</b> closely resembles the interface
	of the facade class. 
</p>
<h2>Is it wrong to use the static facade functions?</h2>
<p>
	If you're not planning to swap frameworks regularly you can rely on
	the easy-to-use static facade functions like <b>R::dispense()</b> and
	<b>R::load()</b> etc. People often complain about static methods but in
	reality many of those so-called pure <b>OOP</b> style projects 
	tend to become heaps of powerless miniature objects 
	and countless wirings. I don't believe that works very well. 
</p>
<h2>Why does RedBeanPHP not protect me from race conditions?</h2>
<p>
	Because I believe the best way to prevent race conditions
	is to use database <b>transactions</b>. RedBeanPHP offers simple
	functions to use transactions: R::begin(), R::commit() and
	R::rollback(). All you need to do is bundle your related queries
	together in a transaction by wrapping them in a begin-commit block.
	Not familiar with transactions yet? 
	Read about <a href="http://en.wikipedia.org/wiki/Database_transaction">Transactions on Wikipedia</a> or
	<a href="http://stackoverflow.com/questions/2808794/does-a-transaction-stop-all-race-condition-problems-in-mysql" title="ACID">
	read this discussion on StackOverflow</a>.
</p>
<h2>Why is RedBeanPHP one file? Isn't that bad practice?</h2>
<p>
	RedBeanPHP is distributed as one file to ease 
	installation and deployment. The build script called <b>Replica</b> compiles
	the RedBeanPHP class files to one file. 
	So in reality, RedBeanPHP is not one file, read more
	about <a href="/replica" title="Read more about building your own RedBeanPHP!">Replica</a>.
</p>
<h2>How active is RedBeanPHP?</h2>
<p>
	RedBeanPHP is being developed quite actively by me and
	the RedBeanPHP community.
</p>
<h2>Why don't you implement my feature request?</h2>
<p>
	Depends. RedBeanPHP is being developed in a very careful way.
	I try to keep RedBeanPHP clean yet comfortable. It's tempting to
	implement lots of features but that would make RedBeanPHP bloated.
	Feel free to write your own plugin or fork the project.	
</p>
<h2>Is RedBeanPHP Lightweight?</h2>
<p>
	You can use Replica to strip all modules and plugins you don't need.
	The default distribution is not bloated but you can compile
	a lighter RedBeanPHP by using the Replica build tool. 
</p>
<h2>Why does RedBeanPHP not support custom table mapping (anymore)?</h2>
<p>
	The idea of RedBeanPHP is to generate a useable and queryable
	schema based on your code and without any configuration.
	Custom table mappings don't fit very well in this model.
	However there are other reasons as well. Many so called
	power features like deep-copy have to make assumptions about database
	layout and table naming conventions. They can of course use 
	some kind of configuration file to figure things out, but hey the whole
	idea of RedBeanPHP was <b>NOT</b> to use configuration! 
</p>
<h2>Why does RedBeanPHP not provide a portable query language?</h2>
<p>
	I do not believe in portable query languages or database independent query 
	builders. The whole point of selecting a database is to 
	choose the system that provides the most useful features.
	A portable query language by definition can't use
	database specific features, so you simply get the worst of all.
	Just dare to choose your the database system that fits the best for the
	task at hand.
</p>
<h2 id="restrictions">Why are underscores and uppercase chars not allowed in type and property names?</h2>
<p>
	Underscores ARE allowed in property names, just not in type names.	
	RedBeanPHP uses underscores to denote relationships among beans.
	Uppercase characters cause problems on different operating system platforms.
	These characters have one further disadvantage; because programmers like me are
	often lazy, they get overused to form ambiguous words. The English vocabulary
	is quite big and you should better be creative and find the best word for
	the concept your bean or model describes. For instance; instead of
	&quot;user_project&quot; or &quot;ProjectUsr&quot; you can use &quot;participant&quot;. This makes your
	database prettier and easier to read as well.
</p>

<p class="version">
	Note that RedBeanPHP 3.4+ supports so-called beautiful column names, this will turn camelCased column names in underscored_column_names.
	You can turn this feature off as well. For more information please consult the RedBeanPHP documentation on how <a href="/create_a_bean" title="Read about creating and storing new bean objects.">to create
	and store beans</a>.
</p>


<h1>Roadmap</h1>
<p>
	RedBeanPHP is actively developed by a community of open source
	developers. The development cyclus of RedBeanPHP consists of two releases
	a year; a spring release and an autumn release. This means every six
	months there will be a new version of RedBeanPHP.
</p>
<ul>
	<li>Spring Beta release: <b>March</b></li>
	<li>Spring Final release: <b>April</b></li>
	<li>Autumn Beta release: <b>September</b></li>
	<li>Autumn Final release: <b>October</b></li>
</ul>

<p>
	For actual information about the upcoming (beta) release visit the 
	<a title="Help us test the latest beta release!" href="/beta_testing">beta 
	testing pages</a>.
</p>

<h2>Upcoming versions</h2>
<p>
	RedBeanPHP is quite mature and stable. All features necessary have been implemented and even
	more features are implemented using the plugin architecture - however we don't want RedBeanPHP
	to become bloated. For the next version of RedBeanPHP we are considering features like
	improved support of Composer and namespaces. Feel free to discuss feature requests on our 
	<a href="https://groups.google.com/forum/?fromgroups#!forum/redbeanorm" title="Discuss the future of RedBeanPHP!">forum</a>. 
</p>




<br /><br />



<p class="alsosee">
	For details concerning <b>versioning</b> guidelines of RedBeanPHP take a look at the
	<a title="Learn more about RedBeanPHP versioning" href="/versioning">versioning page</a>.
</p>



<h1>Versioning</h1>
<p>
	RedBeanPHP uses a very sane version numbering system. The version number tells you something about the version; it has meaning.
	All RedBeanPHP versions have a version number. The version number consists of three parts; major, minor and point release.
</p>
<kbd>
	Version X.X.X
</kbd>
<p>
	Meaning:
</p>
<kbd>
	Version MAJOR.MINOR.POINT
</kbd>
<h2>Major version</h2>
<p>
	When the major version number increases, this means the new version is <b>NOT</b> backward compatible with 
	all previous versions. Most of the time this means you better not use it in your current project if you are already
	using RedBeanPHP or you might have to make some changes to the project to make it work with the new version of RedBeanPHP.
	This is not always as bad as it sounds. For instance version 3 is not backward compatible with version 2, but only if you use
	the optimizers (which by default are turned off). So while this is a major version bump it's actually not that bad.
	However, while difference between 2 and 3 is relatively small, the gap between 1 and 2 was a really big one. Anyway
	whenever the major version number changes make sure you check the <a href="/changelog" title="Check the changelog after a release.">changelog</a> to determine whether you can upgrade or not. 
</p>
<h2>Minor version</h2>
<p>
	A minor version change means new <b>features</b>! Minor versions don't break backward compatibiltity, they just mean new features
	have been added. Often, this goes hand in hand with changes in documentation or <b>bugfixes</b>. Therefore it's relatively 
	<strong>safe</strong>
	to do a minor upgrade. Be sure though to check the changelog on the website. You might be able to take
	advantage of the new features!
</p>
<h2>Point version</h2>
<p>
	A point version or point release happens when the last digit has been increased. Note that although you might assume
	a digit normally varies from 0-9, you might encounter minor and point releases like X.X.12 or X.30.X. Not sure if this will
	happen, however as RedBeanPHP matures you will see less major upgrades and more minor upgrades and point releases. 
	A point release version is normally a maintenance version. This may include bugfixes, new tests, documentation changes or
	just some code cleanup. While it's always a good idea to scan the changelog most of the time you can be pretty sure
	there are no compatibility issues nor interesting new feature. Of course if you have reported an issue the point release can
	be quite interesting because the bug might have been fixed. In this case, the Github bug report number and the fix will
	be mentioned in the changelog.
</p>


<p class="alsosee">
	Where is RedBeanPHP <b>heading</b>? Take a look into the crystal ball, peek into the future on the
	<a href="/roadmap" title="Upcoming features in the object relational mapper">RedBeanPHP roadmap</a>.
</p>


<p class="alsosee">
	For actual information about the <b>latest</b> beta testing for RedBeanPHP ORM for PHP, consult the 
	<a title="Help us test the new beta version of RedBeanPHP ORM for PHP" href="/beta_testing">beta testing page</a>.
</p>

<h1>Beta Testing</h1>
<p>
	Welcome to the <b>Beta Testing</b> section of the RedBeanPHP ORM site.
	Help us test the latest beta version of RedBeanPHP.
	We need your help to deliver the best <b>ORM</b> tool ever!	
	Without your feedback it is very difficult to create a high quality product.
	Join the community, let us know what you think about <b>RedBeanPHP</b> <b>ORM</b> 
	for <b>PHP</b> and how
	it can be improved. You can provide feedback using the <i>comments system</i> on this website
	or using the 
	<a href="https://groups.google.com/forum/?fromgroups#!forum/redbeanorm" target="_blank" title="Forum">forum</a>, or the 
	<a href="https://github.com/gabordemooij/redbean/issues?direction=desc&sort=created&state=open" target="_blank" title="Issue tracker on Github">Github repository issue tracker</a>.	
	
</p>

<p>
	RedBeanPHP 3.5 Beta 9 is here!
	Download
	<a title="Download the latest beta" href="downloads/RedBeanPHP3_5beta9.tar.gz" >RedBeanPHP 3.5 Beta 9</a>.
	and start testing the new RedBeanPHP !	
</p>

<h2>New in beta 9</h2>
<p>
	R::transaction() now returns result.
</p>
<h2>New in beta 8</h2>
<p>
	Read the <i>HTTP/1.1</i> spec, turns out Resty BeanCan confused the meaning of POST and PUT so I swapped these.
	Also updated the <a href="/rest_server" title="Resty BeanCan documentation">manual</a> and the tests. So, <b>POST</b> means <b>CREATE</b> and <b>PUT</b> means <b>UPDATE</b>.
</p>

<h2>Changes in RedBeanPHP 3.5</h2>
<ul>
<li>DONE - added <a href="/schema" title="Inspect method">R::inspect()</a> replaces ugly R::$writer-&gt;methods().</li>
<li>DONE - <a href="/import_and_export#toarray" title="Turn a list of beans into an array">R::beansToArray</a></li>
<li>DONE - Refactored glueSQLCondition method, added tests</li>
<li>DONE - Improved support for named parameters</li>
<li>DONE - Graph() now hardcoded in facade, no need for replica (easy for Composer)</li>
<li>DONE - TimeLine log() now hardcoded in facade, no need for replica (easy for Composer)</li>
<li>DONE - Removed sync() and R::unrelated()</li>
<li>DONE - Automatically switches to utf8mb4 if MySQL/MariaDB version higher &gt;= 5.5</li>
<li>DONE - <a href="/enums_and_more" title="Learn about RedBeanPHP ENUM">ENUMs</a></li>
<li>DONE - <a href="/trees#traversal" title="Searching trees with RedBeanPHP!">Tree traversal</a></li>
<li>DONE - Filter shared items by <a href="/shared_lists#linkfilters" title="Use withCondition() to filter by linking criteria">link conditions</a></li>
<li>DONE - <a href="/shared_lists#via" title="Read more about Via method">Via()</a> - alias for R::renameAssociation</li>
<li>DONE - <a href="/counting_beans" title="Learn how to use countOwn and countShared">Count related beans using countOwn and countShared</a></li>
<li>DONE - <a href="/how_fuse_works#nsmodel" title="Namespaced models">Model Formatter</a> support PHP namespaces out-of-the-box</li>
<li>DONE - READ SUPPORT for UUIDS (primary key no longer cast to integer)</li>
<li>DONE - <a href="/beancan_server#whitelist" title="Protect your API with the whitelist">White list</a> for BeanCan Server</li>
<li>DONE - <a href="/rest_server" title="Learn about the new REST-like BeanCan Server">BeanCan Server 2</a>: REST-like routes</li>
<li>DONE - Improve performance sharedList</li>
<li>DONE - Improve query readability</li>
<li>DONE - Improve notation Preloader, use 'ownPage|page' instead of 'ownPage'=&gt;'page'
<li>DONE - <a href="/cheatsheet" title="Cheatsheet for relational mapping">Cheatsheet / relational matrix</a></li>
</ul>



<br /><br />
<p class="alsosee">
	For details concerning <b>versioning</b> guidelines of RedBeanPHP take a look at the
	<a title="Learn more about RedBeanPHP versioning" href="/versioning">versioning page</a>.
</p>

<p class="alsosee">
	Where is RedBeanPHP <b>heading</b>? Take a look into the crystal ball, peek into the future on the
	<a href="/roadmap" title="Upcoming features in the object relational mapper">RedBeanPHP roadmap</a>.
</p>


<h1>Changelog</h1>

<style>
table { margin-bottom: 50px; }
table th:nth-child(1) { width: 200px; } 
</style>

<h2>2013-06-12: V 3.4.7</h2>
<ul>
<li>DONE - Database name now visible in exception string.</li>
<li>DONE - getCell now returns NULL instead of an empty array in case of an exception.</li>
<li>DONE - Added static method for Null flag in Cooker to fix a test case.</li>
</ul>

<h2>2013-05-23: V 3.4.6</h2>
<ul>
<li>DONE - Backward compatibility fix: re-added getProperties() in Bean class.</li>
</ul>

<h2>2013-05-15: V 3.4.5</h2>
<ul>
<li>DONE - <a href="https://github.com/saetia/redbean/commit/8139ddc19b3d93468ad164695df68a291a867b25" title="View issue on Github" >isChanged</a> now also returns true if change to NULL.</li>
</ul>

<h2>2013-05-09: V 3.4.4</h2>
<ul>
<li>DONE - Send along error code with <a href="https://github.com/gabordemooij/redbean/issues/262" title="See issue">connect</a>.</li>
</ul>
<h2>2013-04-29: V 3.4.3</h2>
<ul>
<li>DONE - Fixed Stash cache</li>
</ul>

<h2>2013-04-11: V 3.4.2</h2>
<ul>
<li>DONE - Fixed typo</li>
</ul>

<h2>2013-04-05: V 3.4.1</h2>
<ul>
<li>DONE - Added possibility to <a href="/eager_loading#sql" title="Read more about Preloading with SQL">add SQL to ownList and sharedList in Preloader</a></li>
</ul>

<h2>2013-04-01: V 3.4</h2>
<ul>
<li>DONE - <a href="/create_a_bean#beau" title="Beautiful column names">Beautification</a> of column names</li>
<li>DONE - Basic support for <a href="/enums_and_more" title="misc. relations" >1-1 and polymorph</a> relations</li>
<li>DONE - Integrate <a href="/adding_lists#adhoc_binding" title="adhoc parameter binding">SQLHelper</a> and with() withCondition()</li>
<li>DONE - Easy way to <a href="/shared_lists#additional_properties">add properties</a> to a shared relation</li>
<li>DONE - Easy way to use <a href="/eager_loading#preload34">R::preload()</a> for nested beans</li>
<li>DONE - Renewed Support for <a href="/create_a_bean#datatypes">spatial types</a></li>
<li>DONE - <a href="/query_cache" title="Query Cache">Query Writer Cache</a></li>
<li>DONE - Make Facade thinner (Harmonize APIs)</li>
<li>DONE - <a href="/tainted" title="Old properties">$bean-&gt;old('property');</a> - Read previous value (3.3.4)</li>
<li>DONE - <a href="/tainted" title="Changed bean properties">$bean-&gt;hasChanged('property'); (3.3.4)</a></li>
<li>DONE - <a href="/tainted" title="isTainted">$bean-&gt;isTainted();</a> - shorthand for getMeta('tainted') (3.3.4)</li>
<li>DONE - Advanced <a href="/import_and_export#export34">exportAll</a></li>
<li>DONE - MySQL boolean type now uses BOOLEAN columns</li>
<li>DONE - Transactions will be disabled in fluid mode to suppress errors due to schema changes</li>
<li>DONE - R::transaction(closure);</li>
<li>DONE - SQL Helper integration one step further: $bean-&gt;with($sqlBuilderQuery)...</li>	
<li>DONE - Moved sync() and timeline() out of all-in-one package</li>
<li>DONE - Added PostgreSQL types: line segments, circles and money</li>
<li>DONE - <a href="/mixing_sql_and_php#nesting" title="Read more about nesting queries in the query builder">nest</a> query builders in the query builder.</li>
<li>DONE - Removed escaping method from adapter</li>
<li>DONE - Refactored escaping</li>
<li>DONE - Added -- keep-cache in SQL to instruct writer cache to keep cache even if query is non-read</li>
<li>DONE - Lots of code formatting</li>
<li>DONE - Cleaned up documentation now using references to avoid duplicate comments</li>
</p>

<h2>2012-11-16: V 3.3.7</h2>
<p>
<ul>
<li>DONE - Fixed: Cant store initial literal 1.0 value</li>
</ul>
</p>


<h2>2012-11-16: V 3.3.6</h2>
<p>
<ul>
<li>DONE - Fixed bug empty beans in R::preload()</li>
<li>DONE - Fix minor issue cache loader with id 0</li>
</ul>
</p>

<h2>2012-11-01: V 3.3.5</h2>
<p>
<ul>
<li>DONE - Fixed bug in R::preload()</li>
<li>DONE - Harmonized Facade (preload and configure) for advanced users</li>
</ul>
</p>

<h2>2012-10-11: V 3.3.4</h2>
<p>
<ul>
<li>DONE - Removed support spatial data types.</li>
</ul>
</p>


<h2>2012-10-11: V 3.3.3</h2>
<p>
<ul>
<li>DONE - Performance improvement (schema cache) for <a href="/import_and_export#speed_up_dup" title="">Duplication and Export</a>.</li>
</ul>
</p>

<h2>2012-10-05: V 3.3.2</h2>
<p>
<ul>
<li>DONE - Fixed SQLite buildcommand-issue. <a title="Build command issue for Unique in SQLite" href="https://github.com/gabordemooij/redbean/pull/203">See issue on Github.</a></li>
</ul>
</p>

<h2>2012-10-04: V 3.3.1</h2>
</p>
<ul>
<li>DONE - setAttr() does not taint bean. <a title="Bean Can issue fix" href="https://github.com/gabordemooij/redbean/issues/201">See issue on Github.</a></li>
</ul>
</p>

<h2>2012-10-01: V 3.3</h2>
<p>

<ul>
<li>DONE - Fixed ID-0 issue in BeanCan Server.<a title="Bean Can issue fix" href="https://github.com/gabordemooij/redbean/issues/199">See issue on Github.</a></li>
<li>DONE - Added eager loading for parent beans.<a title="Learn about eager loading" href="/parent_object#preloading">R::preload(...)</a></li>
<li>DONE - OCI/Oracle fixes</li>
<li>DONE - Tests for bean inject()</li>
<li>DONE - Improvements documentation and clean up</li>
<li>DONE - Backward compatibility switch for keyed exports: RedBean_OODBBean::setFlagKeyedExport()</li>
<li>DONE - $bean->with() now also reloads the list, can now be used multiple times</li>
<li>DONE - Beans now accept DateTime objects (convert to string)</li>
<li>DONE - Keyless export</li>
<li>DONE - Filtered export</li>
<li>DONE - <a href="/adding_lists#ordering" title="the with() modifier">Order and filter own-lists</a></li>
<li>DONE - Aliased lists</li>
<li>DONE - Benchmarking</li>
<li>DONE - Support for Oracle Database (plugin Writer) (thanks Stephane)</li>
<li>DONE - <a href="/replica#replica_and_plugins" title="Read more about building RedBeanPHP with Replica XML">Replica: Extend R-facade with plugins</a></li>
<li>DONE - <a href="/replica#flavours" title="Learn how to assemble your own ORM package with Replica Flavours">Replica: 'flavours'</a></li>
<li>DONE - Composer Support</li>
<li>DONE - <a title="Read the SyncSchema documentation." href="/multiple_databases#sync" >R::syncSchema()</a> easy way to sync databases</li>
<li>DONE - New Cache plugin</li>
<li>DONE - Tag caching</li>
<li>DONE - Polymorphism: associate($bean,$mixedTypes)</li>
<li>DONE - Display errors in fluid-debug mode</li>
<li>DONE - BeanCan server: <a href="/beancan_server" title="BeanCan Server">added export method</a></li>
<li>DONE - Introduction strict type checking</li>
<li>DONE - Improved Dependency Injection (3.2.1)</li>
<li>DONE - Integer fix CUBRID writer (3.2.2)</li>
<li>DONE - Database Writers optional for unit testing, depending on ini config</li>
<li>DONE - Added <a href="/create_a_bean#chain" title="Read about chainable setters.">$bean->setAttr($property,$value)->...; chainable</a> </li>
<li>DONE - Added $bean->unsetAll($properties)->...; chainable </li>
<li>DONE - Now uses SPLExceptions (requires PHP >= 5.1)</li>
<li>DONE - Added index-precheck to avoid redundant index creation Exceptions</li>
<li>DONE - Fix index check</li>
</ul>
</p>

<p>
	2012-06-27 - RedBeanPHP 3.2.3:
</p>
<table>
	<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
	<tbody>
	<tr><td>Fix</td><td>Fixed issue causing some columns not to get indexed</td></tr>
	</tbody>
</table>
<p>
	Note: this update might cause so duplicate indexes, please check your database after
	freezing and remove redundant indexes (use the less specific/shortest index).
</p>


<p>
	2012-06-21 - RedBeanPHP 3.2.2:
</p>
<table>
	<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
	<tbody>
	<tr><td>Fix</td><td>Fixed issue with large integers in CUBRID driver</td></tr>
	</tbody>
</table>


<p>
	2012-05-01 - RedBeanPHP 3.2.1:
</p>
<table>
	<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
	<tbody>
	<tr><td>Change</td><td>added CUBRID to replica.xml</td></tr>
	<tr><td>Fix</td><td>Fixed naming convention details for CUBRID driver</td></tr>
	</tbody>
</table>


<p>
	2012-05-01 - RedBeanPHP 3.2:
</p>


<table >
	<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
	<tbody>
	<tr><td>Feature</td><td><a href="http://www.redbeanphp.com/models_and_fuse">Boxing and Unboxing beans</a></td></tr>
	<tr><td>Feature</td><td><a href="http://www.redbeanphp.com/finding_beans">R::findAll()</a> to eliminate queries like R::find('<b>1</b> ORDER BY ..);</td></tr>
	<tr><td>Feature</td><td>R::find() should accept a Query Helper object as well</td></tr>
	<tr><td>Feature</td><td><a href="http://www.redbeanphp.com/schema">TimeLine plugin</a> (Schema altering log), R::log()</td></tr>
	<tr><td>Feature</td><td><a href="http://www.redbeanphp.com/adding_lists">R::dependencies()</a> changes foreign key constraints to cascade on delete</td></tr>
	<tr><td>Feature</td><td><a href="http://www.cubrid.org/" target="_blank">CUBRID</a> <a href="http://www.redbeanphp.com/compatible">driver</a></td></tr>
	<tr><td>Feature</td><td>Postgres geometrical types</td></tr>
	<tr><td>Feature</td><td>R::isoDate and R::isoDateTime</td></tr>
	<tr><td>Feature</td><td>SQLHelper queries may contain spaces</td></tr>
	<tr><td>Feature</td><td><a href="http://www.redbeanphp.com/freeze">Chill Mode</a></td></tr>
	<tr><td>Feature</td><td>R::related($array,'page'); get multiple many-to-many at once</td></tr>
	<tr><td>Feature</td><td>FUSE <a href="http://www.redbeanphp.com/dependency_injection" title="Learn about DI">Dependency injection</a></td></tr>
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


<p>
	2011-10-01 - RedBeanPHP 3.1:
</p>
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

<p>
	RedBeanPHP 3.0.4:
</p>
<table>
	<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
	<tbody>
	<tr><td>Fix</td><td>Fixed issue in R::dup() Nullifying Ids after preloaded lists</td></tr>
	</tbody>
</table>

<p>
	RedBeanPHP 3.0.3:
</p>
<table>
	<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
	<tbody>
	<tr><td>Fix</td><td>Fixed issue in R::dependencies()</td></tr>
	</tbody>
</table>



<p>
	RedBeanPHP 3.0.2: 
</p>
<table >
	<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
	<tbody>
	<tr><td>Feature</td><td>R::dependencies(...)</td></tr>
	</tbody>
</table>


<p>
	RedBeanPHP 3.0.1:
</p>
<table>
	<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
	<tbody>
	<tr><td>Fix</td><td>Fixed issue in R::dup()</td></tr>
	</tbody>
</table>


<p>
	RedBeanPHP 3.0:	
</p>
<table >
	<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
	<tbody>
	<tr><td>Feature</td><td>Support for <a href="/special_types">special, DB specific data types</a> like DATE, DATETIME and SPATIAL types</td></tr>
	<tr><td>Feature</td><td><a href="/mixing_sql_and_php">Mix</a> SQL with PHP</td></tr>
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
	<tr><td>Removed</td><td><b>Bean Formatter</b> you can NO LONGER customize database schema (because it breaks things)</td></tr>
	<tr><td>Removed</td><td><b>R::view()</b></td></tr>
	</tbody>
</table>

<p>
	RedBeanPHP 2.2.3:
</p>
<table >
	<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
	<tbody>
	<tr><td>Fix</td><td>Fixed issue <a target="_blank" href="https://github.com/gabordemooij/redbean/issues/106" title="issue 103">FUSE models dont process nested beans</a></td></tr>
	<tr><td>Fix</td><td>Added data type LONG TEXT for MySQL</td>	
	</tbody>
</table>

<p>
	RedBeanPHP 2.2.2:
</p>
<table >
	<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
	<tbody>
	<tr><td>Feature</td><td>R::$adapter->getAffectedRows() <a href="https://github.com/gabordemooij/redbean/issues/104" target="_blank" title="issue 104">now also works with get()</a></td></tr>
	<tr><td>Fix</td><td>Fixed incompatibility issue <a target="_blank" href="https://github.com/gabordemooij/redbean/issues/103" title="issue 103">lcfirst</a> for PHP 5.2</td></tr>
	</tbody>
</table>


<p>
	RedBeanPHP 2.2.1:
</p>
<table >
	<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
	<tbody>
	<tr><td>Fix</td><td>Fixed minor issue with indirect modification of nested beans. (issue #100)</td></tr>
	</tbody>
</table>


<p>
	RedBeanPHP 2.2: 
</p>
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

<p>
	RedBeanPHP 2.1.1 contains a 'change of mind'. Changed default action of foreign keys from NO ACTION to SET NULL. This has the following 
	advantages:
	<br/>1. People not interested in FKs will not be bothered by intigrity violations.
	<br/>2. People interested in FKs have the opportunity to configure them at one moment; the right moment: when leaving fluid mode.
	<br/>3. Development scenarios and cleaning actions don't interfere with foreign keys.
	<br/>4. Uncommon scenarios will not clash with foreign keys as well (these are likely in fluid mode, import scripts, tests etc).<br/><br/>
</p>
<p>
	RedBeanPHP 2.1 is a minor release and contains some new features as well as some bugfixes. Here is a list. Note that
	this release IS backwards compatible with RedBeanPHP 2.
</p>
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
<br/><br/><br/>
<h2>New in 2.0</h2>
<p>
	<strong>RedBeanPHP 2.0</strong> makes <abbr title="Object Relational Mapping">ORM</abbr> even easier and more fun! RedBeanPHP 2.0 has been released on
	August 1 and contains the following improvements:
</p>
<table>
	<tr><td>Support for <a href="/nested_bean" title="nested beans">N:1 relations</a></td></tr>
	<tr><td>On-the-fly <a href="/views" title="views">Views</a></td></tr>
	<tr><td>Improved <a href="/tags" title="tags">Tag</a> API</td></tr>
	<tr><td>Automatic constraints to keep link tables clean</td></tr>
	<tr><td>Automatic foreign key generation</td></tr>
	<tr><td>New and improved Form Cooker</td></tr>
	<tr><td>Bean2JSON when casting a bean to a string</td></tr>
	<tr><td>New flexbible architecture</td></tr>
	<tr><td>Clean up (less than 100KB now!)</td></tr>
	<tr><td>Many other improvments, bugfixes and tests&hellip;</td></tr>
</table>

<p class="alsosee">
	For actual information about the <b>latest</b> beta testing for RedBeanPHP ORM for PHP, consult the 
	<a title="Help us test the new beta version of RedBeanPHP ORM for PHP" href="/beta_testing">beta testing page</a>.
</p>


<p class="alsosee">
	For details concerning <b>versioning</b> guidelines of RedBeanPHP take a look at the
	<a title="Learn more about RedBeanPHP versioning" href="/versioning">versioning page</a>.
</p>

<p class="alsosee">
	Where is RedBeanPHP <b>heading</b>? Take a look into the crystal ball, peek into the future on the
	<a href="/roadmap" title="Upcoming features in the object relational mapper">RedBeanPHP roadmap</a>.
</p>

<h1>Upgrade</h1>
<p>
	RedBeanPHP is a very dynamic project, however we try to keep upgrading as easy as possible
	without hampering innovation.	
	Here you find upgrade guides for various versions of RedBeanPHP.
</p>
<h2>Upgrade 3.4 to 3.5</h2>
<p>
	Welcome to the RedBeanPHP ORM upgrade guide for upgrading from version 3.4 to version 3.5.
        RedBeanPHP 3.5 is a minor release, this means that it's almost backward compatible with previous
        releases in the 3-series. However even in a minor release there might be minor incompatibilities
        because the product has to move forward. This chapter describes the minor backward compatibilities
        and how to deal with them.
</p>
<h3>Unrelated method removed</h3>
<p>
	The R::unrelated() method has been removed. This method had become quite problematic because
	the architecture could not be cleanup up because of this method. Also, this method has
	nothing to do with object relational mapping anyway - it was a feature request during a period
	in which I was less critical. Well, it's gone now. If you have some code depending on this
	method you'll have to write a query.
</p>
<h3>Internal select method removed</h3>
<p>
	The internal select() method in writers has been removed. Nobody should have used this
	internal method anyway.
</p>
<h3>Plugin Sync removed</h3>
<p>
	This plugin is still available in other branches and work as expected however I do
	not consider this core functionality.
</p>

<h2>Upgrade 3.3 to 3.4 </h2>
<p>
	Welcome to the RedBeanPHP ORM upgrade guide for upgrading from version 3.3 to version 3.4.
	RedBeanPHP 3.4 is a minor release, this means that it's almost backward compatible with previous
	releases in the 3-series. However even in a minor release there might be minor incompatibilities
	because the product has to move forward. This chapter describes the minor backward compatibilities
	and how to deal with them.
</p>
<h3>No more escaping</h3>
<p>
	RedBeanPHP 3.4 no longer has an $adapter-&gt;escape() / $database-&gt;Escape() method.
	RedBeanPHP has always offered parameter binding and parameter binding has always been the
	preferred way to write queries. The escape methods therefore have been confusing and
	might lead to SQL injection because people don't know how to use them. Parameter binding
	is much more safe and this is why I have decided to remove the escape() methods completely.
	If you have code that relies on the escape() methods please rewrite this code to use
	parameter binding, it makes your code safer and more consistent. If you insist on using 
	escaping instead of parameter binding you can still use the underlying PDO instance for this:
	<a href="http://php.net/manual/en/pdo.quote.php" title="PDO quote() documentation">R::$adapter->getDatabase->getPDO()->quote();</a>.
</p>
<h3>TimeLine and Sync</h3>
<p>
	RedBeanPHP has grown a little fat. Therefore I removed two plugins from the main distribution; namely
	TimeLine and Sync. Since they are only useful to some people I figured they can just as well remain on
	github. You can compile them into rb.php yourself using 
	<a href="http://www.redbeanphp.com/replica" title="read more about Replica">Replica</a> the RedBeanPHP build tool.
</p>
<h3>Extra Cooker flag</h3>
<p>
	The Cooker (R::graph()) - a tool in RedBeanPHP to quickly turn entire array hierarchies in bean hierarchies and
	store them in the database will now throw an exception if you want to load a bean (by providing an id). You can turn this
	off using: RedBean_Plugin_Cooker::enableBeanLoading(true); 
</p>
<h3>Uppercase characters</h3>
<p>
	Formally RedBeanPHP never allowed the use of uppercase chars in properties. However this was always easy to
	circumvent if you knew how. In RedBeanPHP 3.4 uppercase characters will be used to generate 'beautiful' column names.
	For instance, a property called 'singleMalt' will result in a column single_malt. The reason why RedBeanPHP never
	allowed uppercase chars (and still does not allow) is because this tends to cause inter-operating system issues as
	well as fundamental cross database issues (some OSes and database engines are case sensitive while others are not).
	However like I said the restriction was easy to circumvent if you studied the API carefully. In RedBeanPHP 3.4
	You'll have to turn off the beautifier to use circumvent the restriction using: RedBean_OODBBean::setFlagBeautifulColumnNames(false); 
	Of course, I still recommend not to do this. Instead I hope you enjoy the beautiful underscore-columns, generated by the
	'beautifier'.
</p>
<h3>No more SET(1) in MySQL</h3>
<p>
	From now on RedBeanPHP will use <b>BOOLEAN</b> (TINYINT 1) as the default column for boolean values instead of
	<b>SET(1)</b>. This has been done to make the behaviour across database platforms more consistent. Also
	SET(1) columns have some issues regarding <b>NULL</b> because they either represent 1 or NULL (or empty) 
	while <b>TINYINT(1)</b> can
	respresent <b>NULL</b>, <b>TRUE (1)</b> and <b>FALSE (0)</b>. Unfortunately none of the database platforms has a good boolean column type
	(actually Postgres has a real boolean value but it's too strict and required a cast for every comparison).
	Therefore I feel TINYINT or INTEGERS are the best way to represent booleans given the current state of database
	platforms.
</p>

<h2>Upgrade 3.2 to 3.3</h2>
<p>
	Welcome to the RedBeanPHP ORM upgrade guide for upgrading from version 3.2 to version 3.3. This guide
	describes possible issues when upgrading from release 3.2 to version 3.3.
	RedBeanPHP 3.3 is a minor release and offers new functionality. For the most part this release
	is backward compatible. You should be able to migrate your projects with ease. However there are some
	minor incompatible changes. These are discussed on this page.
</p>
<h3>Strict Bean Types</h3>
<p>
From 3.3 on bean types may only contain alphanumeric characters. The underscore is no longer
allowed. The reason for this is that in RedBeanPHP the underscores signifies a relationship between
two types; for instance 'product_shop' is recognized as a relational bean or link table representing
the relation between a product and a shop. The strict typing feature can be overridden easily by issueing:
</p>

<?php code("
	R::setStrictTyping(false);
"); ?>

<h3>Keyless export</h3>
<p>
From 3.3 on, the bean export behaviour has become more consistent. Prior to 3.3 when you performed 
an export on a bean the lists would be returned as arrays indexed by the IDs. This is very problematic
for Javascript to work with because it creates NULL entries for intermediate entries which is bad for
performance and just ugly. On the other hand exportAll() never did this. In RedBeanPHP 3.3 this has changed.
All exports now return keyless lists. If you need to old bahviour use: 	
</p>

<?php code("
	RedBean_OODBBean::setFlagKeyedExport(true);
"); ?>

<p>
	With the new keyless exports I hope to increase the consistency throughout the library and
	improve support for more Javascript oriented development strategies. 
</p>

<h3>Plugins</h3>

<p>
In RedBeanPHP 3.3 plugin functions no longer have hard coded facade methods. For instance the Cooker plugin
provides a method R::graph(). This method still exists, but only in R. Not in the facade RedBean_Facade.
These plugin extensions of R are now compiled into the R-class by the Replica Build Script. If you use these
methods on the facade class itself you should replace this code using a find replace action on your project.
</p>

<h1>License</h1>
<h2>New BSD License</h2>
<p>
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
</p>
<h2>Disclaimer</h2>
<p>
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

</p>



<category>Tools</category>
<h1>Replica</h1>
<p>
	Replica is the build script for RedBeanPHP. The <i>all-in-one package</i> on the homepage has been
	built using Replica.
	
</p>
<p>
	Using Replica you can build your own all-in-one PHP file. Replica reads the <b>replica.xml</b>
	file which contains a list of files to be added to the <i>rb-file</i>. The 
	<i>R-facade class</i> is dynamically
	generated by Replica.
</p>
<p>
	This is what a line in the <b>replica.xml</b> file looks like:
</p>
<?php code('
	<item type="php">RedBean/Logger.php</item>
');?>
<p>
	This line will instruct Replica to add the PHP file <b>RedBean/Logger.php</b> to the
	package.
</p>
<p>
	To run replica type:
</p>
<kbd>
	php replica.php
</kbd>
<p>
	Replica will tell you which files are included in the build:
</p>
<kbd>
	Adding: RedBean/license.txt 
</kbd>
<p>
	Afterwards, you will find the all-in-one file in your directory:
</p>
<kbd>
	rb.php
</kbd>

<h2 id="flavours">Flavours (version 3.3+)</h2>
<p>
	It's possible to not generate just one but several all-in-one packages, all containing
	different collections of php files. These additional versions are called flavours. To add
	a php file to a 'flavour' called 'oci' we can use:
</p>
<?php code('
	<item type="php" flavour="oci">RedBean/QueryWriter/Oracle.php</item>
');?>
<p>
	This line will add the Oracle driver to the <b>rboci.php</b> file. This file has the same
	contents as <b>rb.php</b> but with the addition of the Oracle.php file.
</p>
<p>
	Replica will report about flavour specific items:
</p>
<kbd>
	Adding: RedBean/QueryWriter/Oracle.php to flavour: oci 
</kbd>
<p>
	And after running Replica you will see two builds in your directory:
</p>
<kbd>
	rb.php<br />
	rboci.php
</kbd>

<h2 id="replica_and_plugins">Replica and Plugins (version 3.3+)</h2>
<p>
	Plugins can add static methods to the R facade class. To do so, a plugin has to add
	a comment containing the <b>@plugin</b> section. What comes after the word <b>@plugin</b>
	will be inserted into the <i>R-facade class</i>.
</p>
<p>
	For instance, consider the imaginary plugin <i>'CSVImport'</i>. If we add the line:
</p>
<?php code('
	// @plugin public static function CSV($file){ ... }
');?>
<p>
	And we include an entry to the XML configuration:
</p>
<?php code('
	<item type="php" >RedBean/Plugins/CSVImport.php</item>
');?>
<p>
	then we can now use the method:
</p>
<?php code('
	$beans = R::CSV($file);
');?>
<p>
	Which allows us to dynamically add methods to the <i>R-facade class</i>.
</p>

<h1>BeanCan Server</h1>
<p>
BeanCan is a PHP class that can act as a backend server for <b>Javascript</b> centered web applications 
(<b>JSON-RPC 2.0</b> compliant). In a JS based web application your views and controllers are written in client-side Javascript while your 
<a title="Models and FUSE" href="/models_and_fuse">models</a> are still stored on the server. 
BeanCan acts as bridge between the client side javascript views and controllers on the one hand and the server side models on the other.
</p>
<p>
BeanCan makes use of <a href="/models_and_fuse" title="What is FUSE?">FUSE</a>. This means that you can send 4 types of commands to the BeanCan Server:
</p>
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
<p>
Requests <b>1-5</b> are handled automatically by RedBeanPHP. 
This means you can <b>store/delete/load</b> any bean automatically if you connect to the bean server without <b>*any*</b> effort. 
If you send an unrecognized command, FUSE tries to locate the model and passes the request. Time for examples...
</p>
<p class="note">
	From version 3.3 on you can use 'export'. Export works the same as 'load' but returns an entire bean hierarchy instead of just
	one bean.	
<p>
<b>Request #1:</b> The following request returns a page with ID 1:
</p>
<?php jcode('
{
"jsonrpc":"2.0",
"method":"page:load",
"params":[1],
"id":"myrequestid"
}
');?>
<p>
<b>Request #2:</b> The following request creates a new page and returns its new ID:
</p>
<?php jcode('
{
"jsonrpc":"2.0",
"method":"page:store",
"params":[{"body":"lorem ipsum"}],
"id":"myrequestid"
}
');?>
<p>
<b>Request #3:</b> The following request changes the text of page 2:
</p>
<?php jcode('
{
"jsonrpc":"2.0",
"method":"page:store",
"params":[{"body":"welcome","id":2}],
"id":"myrequestid"
}
');?>
<p>
<b>Request #4:</b> This example request deletes page with ID 3:
</p>
<?php jcode('
{
"jsonrpc":"2.0",
"method":"page:trash",
"params":[3],
"id":"myrequestid"
}
');?>
<p>
<b>Request #5:</b> executes <b>$page-&gt;mayAccess( $ip )</b> and returns the result. FUSE will connect automatically to the Model_Page class to accomplish this.
</p>
<?php jcode('
{
"jsonrpc":"2.0",
"method":"page:mayAccess",
"params":[ ipAddress ],
"id":"myrequestid"
}
');?>
<p>
The BeanCan server returns <b>JSON</b> reponses like this (created page and returns ID):
</p>
<?php jcode('
{
"jsonrpc":"2.0",
"result":"8",
"id":"myrequestid"
}
');?>
<p>
In case of an error:
</p>
<?php jcode('
{
"jsonrpc":"2.0",
"error":{"code":"-32603","message":"Invalid request"},
"id":"myrequestid"
}
');?>
<br/>
<h2>Full Example</h2>
<p>
	Here is a full <a title="Take a look at this example" href="/downloads/beancan.txt">example</a>. It is a todo list
	written in <b>Javascript</b> and <b>PHP</b> using the BeanCan Server.
</p>

<h2 id="whitelist">Whitelist</h2>
<p>
	To prevent API users from accessing all beans you can use a white list:
</p>
<?php code("
	\$server->setWhitelist(array(
		'candy' => array('store', 'like')
	));
"); ?>
<p>
	This example will only allow you to store candy beans and invoke the custom method 'like'.
	Other beans and other methods will not be accessible.
	To turn off the white list and allow full access:
</p>
<?php code("
	\$sever->setWhitelist('all');
");?>


<p class="alsosee">
	Not familiar with JSON-RPC ? Take a look at: <a href="http://jsonrpc.org/spec.html" title="Learn more about JSON-RPC">JSON-RPC specification</a>. 
</p>


<h1>REST server</h1>
<p>
	In RedBeanPHP 3.5 you can use the new Resty BeanCan Server. The Resty BeanCan server 
	makes it easy to make a REST-like API. 
	To create a Resty BeanCan Server:
</p>
<?php code("	
	\$can = new RedBean_Plugin_BeanCanResty;
"); ?>

<h2>Whitelist</h2>
<p>
	The first thing to do is to tell RedBeanPHP what methods are allowed per type.
	To allow users to perform GET and POST but not PUT and DELETE actions for books use:
</p>
<?php code("
	\$can->setWhitelist(array(
		'book' => array(
			'GET', 'POST'
		)
	));
"); ?>
<p>
	For testing purposes, you might want to allow everything:
</p>
<?php code("
	\$can->setWhitelist('all');
"); ?>

<h2>GET request</h2>
<p>
	The Resty BeanCan Server works with a reference bean. For instance a $user.
	To access or modify a resource you simply pass the path relative to the user and you pass the 
	(HTTP) method:
</p>
<?php code("
	\$can->handleREST(\$user, 'book/2', 'GET'); 
	//returns array('result' => array( \$property => \$value ) )
");?>
<p>
	This will retrieve the own list of the $user and load the book with ID 2. Note that this method will
	fail if no such book exists in the list. By default, the Resty Can searches in the own list, to search
	in the shared list, prefix your list with 'shared-':
</p>
<?php code("
	\$can->handleREST(\$user, 'site/3/page/4/shared-ad/2', 'GET');
"); ?>
<p>
	This will retrieve ad 2 on page 4 of site 3. 
</p>
<h2>POST request</h2>
<p>
	To add a new page:
</p>
<?php code("
	\$can->handleREST(\$user, 'site/3/page', 'POST', array(
		'bean' => array(
			'title' => 'my new page'
		)
	)); //returns array('result'=>array('id' => 1))
");?>
<h2>PUT request</h2>
<p>
	To update page 4:
</p>
<?php code("
	\$can->handleREST(\$user, 'site/3/page/4', 'PUT', array(
		'bean' => array(
			'title' => 'changed title'
		)
	));
"); ?>
<h2>DELETE request</h2>
<p>
	To delete page 4:
</p>
<?php code("
	\$can->handleREST(\$user, 'site/3/page/4', 'DELETE');
"); ?>
<p>

<h2>GET request for lists</h2>
<p>
	To get a list of pages:
</p>
<?php code("
	\$can->setWhitelist(array('page'=>'GET')); //you need access to PAGE!
	\$can->handleREST(\$user, 'site/3/page/list', 'GET');
");
?>
<p>
	You can predefine SQL snippets:
</p>
<?php code("
	\$can->setWhitelist(array('page'=>'GET')); //you need access to PAGE!

	\$sql = array('page'=>array(
		' page.number > ? ', array(3)
	));

	//for shared pages use 'shared-page' as key!

	\$can->handleREST(\$user, 'site/3/page/list', 'GET', array(), \$sql);
"); ?>

<h2>Custom requests</h2>
<p>
	The BeanCan server also accepts non-rest methods, these will invoke methods on
	models connected to beans (FUSE):
</p>
<?php code("
	\$resp = \$can->handleREST(\$user, 
		'site/'.\$site->id.'/page/'.\$page->id, 
		'mail', array('param'=>array('me')));

	//calls \$page->mail('me');
"); ?>


<h2>Return values</h2>
<p>
	The handleRest() method returns 
	an array with an error key or a result key. This allows you to do
	your own post-processing, i.e. convert to JSON or XML.
	If an error occurs, you get an array like this:
</p>
<?php code("
	array(
		'error'=> message,
		'code' => code 
	)
");?>

<p>
	If you want to return beans in a custom REST method, use
	<a href="/import_and_export#toarray" title="Returning beans as an array in REST server.">R::beansToArray()</a>.
</p>

<h2>Error Codes</h2>
<p>
	The error codes in the response array conform to HTTP error codes:
	exceptions generate a 500 code, if the bean is not on the whitelist
	you get a 403 code, if the bean cannot be found you get a 404 code other
	errors (syntax) return a 400 code.
</p>

<h2>Why is PUT used to UPDATE beans?</h2>
<p>
	According to the <a target="_blank" href="http://www.w3.org/Protocols/rfc2616/rfc2616-sec9.html#sec9.6" title="HTTP/1.1 Specification">HTTP/1.1</a> 
	specification, <b>PUT</b> and <b>DELETE</b> need to be <abbr title="Performing an action multiple times has the same outcome as performing the action once.">idempotent</abbr>.
	<i>PUTTING</i> a bean 3 times with the same
	payload will have the same effect as <i>PUTTING</i> that bean just once. Same applies to
	<i>DELETE</i> and <i>GET</i>. On the other hand, POSTING a bean X times creates X new beans, so
	the HTTP POST method is <b>NOT</b> idempotent.
</p>

<p class="note">
	Don't forget to configure the <a href="/beancan_server#whitelist" title="Learn about the whitelist for all BeanCan Servers.">whitelist</a>!
</p>

<h2>Legacy REST Server (only get)</h2>
<p>
	This server is now deprecated.
	In RedBeanPHP 3.0 the BeanCan server also responds to RESTFul GET requests. To setup a REST server
	with beancan:	
</p>
<?php
code("
	\$server = new RedBean_BeanCan();
	\$server->handleRESTGetRequest('/book/2'); //returns book with ID 2
	\$server->handleRESTGetRequest('/book'); //returns books
");

?>




<h1>Namespacer</h1>
<p>
	I don't like PHP namespaces, they have some issues. This <a href="http://pornel.net/phpns/" title="PHP namespaces are flawed.">article</a> by 
	'Pornel' explains why. There are several reasons why I don't use namespaces in RedBeanPHP:
</p>
<ul>
	<li>I want RedBeanPHP to be compatible with PHP 5.2 (and sort of compatible with PHP 5.1)</li>
	<li>I dont want to bother RedBeanPHP users with namespaces, the one-character R::doSomething() formula is quite powerful</li>
	<li>While I admire the work of the PHP core development team, I feel choosing the '\' symbol was a mistake, it's like introducing <b>DOS</b> in <b>PHP</b></li>
</ul>
<p>
	Also, I really like <b>Poorman's namespacing</b>. In fact, it does the same job as
	namespacing... with <b>no additional syntax</b>. I <b>really</b> like that. <i>The less syntax the better</i>.
</p>

<h2>Namespacer Script</h2>
<p>
	For those of you who insist on using namespaces,
	I have written a small PHP script 
	for you to <i>dynamically</i> put RedBeanPHP in a namespace:
	
	<a href="http://www.redbeanphp.com/downloads/namespace.tar.gz" title="namespacer">Namespace Script</a>.
	<br/>Usage:
	
</p>
<kbd>
	php space.php MyNameSpaceForBeans
</kbd>
<p>
	The command above will put the entire RedBeanPHP library in the 
	'MyNameSpaceForBeans' namespace. The namespace script will put the resulting PHP code in a file called:
</p>
<kbd>
	rbn.php
</kbd>
<p>
	This filename stands for: <b>R</b>ed<b>B</b>eanPHP with <b>Namespaces</b>.
	After running this script and including the freshly generated <i>rbn.php</i> file, you can use
	the namespaced RedBeanPHP version:
</p>
<p>
	For instance: <b>R::store</b> becomes <b>\MyNameSpaceForBeans\R::store</b>.
</p>
<p>
	Happy namespacing... ;) 
</p>


<h1>RedUNIT</h1>
<p>
	<strong>RedBeanPHP</strong> has been tested very well. You can find the test files on github.
	The complete set of test files for RedBeanPHP is called RedUNIT. RedBeanPHP has been tested
	with PHP Coverage. With version 3.0 RedBeanPHP has reached <b>99%</b> test coverage.
</p>

<p>
	To run a unit test pack, type the following command in testing/cli:
</p>
<kbd>
	./start.sh
</kbd>
<p>
	This will run the tests. To run all mysql tests (same for Postgres,Sqlite):
</p>
<kbd>
	./start.sh Mysql
</kbd>
<p>
	To run a single test package:	
</p>
<kbd>
	./start.sh Base/Graph
</kbd>
<p class="note">
	Before you run tests yourself you might want to take a look at the
	test configuration file config/test.ini 
</p>

<h1>Archive</h1>
<p>
	Welcome to the RedBeanPHP Archive.
</p>
<h2>News Archive</h2>
<p>
	Old news is no news... but for the sake of archiving...
</p>
<h2>What happened in before...</h2>
<p>
<time>2013-06-30</time>: <a title="New N-M bean relation system" href="https://github.com/gabordemooij/redbean/commit/0205fa8323d2e228dcc4da2dda410921e8be03cd">Improved</a> retrieval of shared beans so you filter/order by links.
<br /> 
<time>2013-06-23</time>: <a href="https://github.com/gabordemooij/redbean/commit/dbad985e1cd89bb3ab0e43f6c4846ac37b9f2634" title="Take a look at the new count methods in RedBeanPHP 3.5!">Sneak preview</a> of relation counts in RedBeanPHP 3.5!
<br /> 
<time>2013-06-12</time>: Released <a title="Read changelog" href="/changelog">version 3.4.7</a> (minor fixes).
<br />
<time>2013-05-23</time>: Re-added getProperties method in OODBBean.
<br />
<time>2013-05-22</time>: Have been interviewed by <a href="http://usererror.fi/2013/05/cleaning-up-your-crud/" title="Cleaning up your CRUD...">UserError</a>.
<br /> 
<time>2013-05-15</time>: Released RedBeanPHP 3.4.5 Minor fix in <a href="https://github.com/saetia/redbean/commit/8139ddc19b3d93468ad164695df68a291a867b25" title="View issue on Github">isChanged()</a>.
<br />
<time>2013-05-09</time>: Released RedBeanPHP 3.4.4 updated <a href="https://github.com/gabordemooij/redbean/issues/262" title="View details on Github">connect()</a> method to send along proper error code.
<br />
<time>2013-05-05</time>: First draft of <a href="https://github.com/gabordemooij/redbean/commit/ade919e616e2a745f921b81d71f248b9cf73ee1b" title="Discover the new RESTful BeanCan server">BeanCan 2</a> available on Github.
<br />
<time>2013-04-29</time>: RedBeanPHP 3.4.3 fixed issue in internal stash cache.

<br />
<time>2013-04-11</time>: RedBeanPHP 3.4.2 fixed a typo
<br />
<time>2013-04-05</time>: RedBeanPHP 3.4.1 has been released; added <a href="/eager_loading#sql" title="SQL in Eager Loading">minor feature</a>.
<br />
<time>2013-04-01</time>: RedBeanPHP 3.4 has been released. See <a href="/changelog" title="Explore RedBeanPHP 3.4">changelog</a> for details.
<br /><time>2013-03-01</time>: We are currently <a href="/beta_testing" title="beta">beta</a> testing RedBeanPHP 3.4. Help us test the new release of RedBeanPHP.
</p>
<h2>Old Manuals</h2>
<p>
	Old manuals can be found here:
</p>
<ul>
<li><a href="/extra">Previous Additional Manual 3.3</a></li>
<li><a href="/manual2_0">Manual RB 2.0</a></li>
<li><a href="http://redbeanphp.com/community/wiki/index.php?title=Main_Page">Manual RB 1.0</a></li>


</ul>






