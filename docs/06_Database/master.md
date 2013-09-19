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
