# System Requirements

**RedBeanPHP** has been tested with PHP 5.3+ but runs under PHP 5.2 as well.
RedBeanPHP works on all well known operating systems.
You need to have <abbr title="PHP Data Objects">PDO</abbr> installed and you need
a PDO driver for the database you want to connect to. Most PHP stacks
come with PDO and a bunch of drivers so this should not be a problem. RedBeanPHP supports
a wide range of relational databases; for a full list feel free to consult the
[compatibility page](/compatible "Compatible Databases").

## MB String extension

RedBeanPHP requires the mb_string extensions. Most PHP distributions have
this already.

## MySQL Strict Mode

RedBeanPHP does **not** work with **MySQL strict mode**.
To turn off strict mode execute the following SQL query:

```php
SET @@global.sql_mode= '';
```

## Existing schemas

RedBeanPHP has been designed to build your database **on-the-fly**, as you go.
Afterwards, you can **manually** change the schema to suit your needs (change column types, add additional indexes);
RedBeanPHP won't revert your changes, not even in fluid mode.

While RedBeanPHP can also be used with existing schemas these have to conform to the RedBeanPHP naming conventions to work.
Remember that the purpose of RedBeanPHP is to have an easy, configuration-less ORM. This can be achieved only by
respecting certain conventions.
