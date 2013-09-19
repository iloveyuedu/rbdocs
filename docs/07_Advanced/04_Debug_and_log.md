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
