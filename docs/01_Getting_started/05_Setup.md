# Setup

So, you have decided to start with **RedBeanPHP**. The first thing you need to
get started is setting up the **database**. Luckily this is really easy.

```php
require('rb.php');
R::setup();
```

Yes, that's all if you are working on a *NIX, Linux or Mac system with **SQLite**.
Here is how to connect to **MySQL** on any machine:

```php
require('rb.php');
R::setup('mysql:host=localhost;
	dbname=mydatabase','user','password');
```

RedBeanPHP is also very easy to [setup for use with PostgreSQL and SQLite](/compatible).

## InnoDB only

RedBeanPHP only works with the InnoDB driver for MySQL. MyISAM is too [limited](http://www.kavoir.com/2009/09/mysql-engines-innodb-vs-myisam-a-comparison-of-pros-and-cons.html "article about differences between MyISAM and InnoDB").
