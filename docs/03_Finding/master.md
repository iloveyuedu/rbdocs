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
