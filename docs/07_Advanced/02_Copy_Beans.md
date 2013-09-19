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
