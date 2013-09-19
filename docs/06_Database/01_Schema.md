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
