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
