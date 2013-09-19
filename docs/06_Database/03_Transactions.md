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
