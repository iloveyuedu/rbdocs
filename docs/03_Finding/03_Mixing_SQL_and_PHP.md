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
