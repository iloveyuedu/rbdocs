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
