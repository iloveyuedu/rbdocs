# Finding Beans

**RedBeanPHP** allows
you to use good old <abbr title="Structured Query Language">SQL</abbr> to find beans:

```php
$pages = R::find('page',' title = ? ',
			array( $title )
		   );
```

The result of a find operation is an array of beans; the **ID**s are used as keys.
Find takes **3** arguments; the **type** of bean you are looking for,
the [SQL query](/queries "Learn how to write queries with RedBeanPHP")
and an array
containing the **values** to be used for the question marks. Named slots are supported as well:

```php
$pages = R::find('page',
	' title = :title LIMIT :limit',
		array(
			':limit' => $limit,
			':title' => $title
		)
	);
```

...and so are **IN-clauses**:

```php
$all = R::find('page',
	' id IN ('.R::genSlots($ids).') ', $ids);
```

If you don't use any conditions but you just want to **ORDER** or **LIMIT** result rows,
use **findAll()**:

```php
$all = R::findAll('page',
	' ORDER BY title LIMIT 2 ');
```

To find just **one** bean; use **findOne()**:

```php
$prod = R::findOne('product',
	' code = ? ',array($code));
```

findOne returns the first bean in the result set. Use **findLast()** to get the last bean.

You can only bind **literal** values. This will not work: &quot;ORDER BY :sortcolumn DESC&quot;
- because the parameter refers to a column, **NOT** a literal.

## Return values

If no beans are found, find() and findAll() return an **empty array**,
findOne(), findFirst() and findLast() return **NULL**.

There is no need to use **mysql_real_escape**, just bind the parameters to the slots in
the query. **Never** use PHP variables directly in your **SQL** string!
