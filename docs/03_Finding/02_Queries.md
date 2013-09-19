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
