# Loading a Bean

To load a bean from the database use the **load()** function and pass both the **type** of the bean and the **id**:

```php
$book = R::load('book', $id);
```

If the bean cannot be loaded a new **empty** bean will be dispensed with id **0**.
To check whether a bean has been loaded correctly you can
verify the id using:

```php
if (!$bean->id) { ...help bean not found!!.. }
```

This behaviour is very useful. For instance, consider loading a page bean:

```php
$page = R::load('page',$id);
show_form($page); //imaginary function
```

If the page does exists, the contents of the page will be shown in the form to allow
the user to update the page. However if the page does not exist, what are we going to do?
Well the page is gone after all (maybe someone has removed the page?),
so we can just as well present the user with an empty form.
This saves a lot of unnecessary _if-then-else_ code.

After a bean has been loaded, you can simply access properties like you expect:

```php
echo $book->title; //displays value of property title
```

Properties of a loaded bean only contain **STRING** or **NULL** values.

## Batch Loader

To load a **batch** of beans at once:

```php
$books = R::batch('book',array($id1,$id2));
```

## Counting

To **count** beans:

```php
R::count('page'); //counts all pages
```

Since RedBeanPHP 3.3 you can also add some SQL:

R::count('page',' chapter = ?',array($chapter))

## Empty Beans

**Remember**: If the bean _cannot_ be loaded a **new empty bean** will be dispensed with id **0**.

Next: learn how to [delete](/deleting_a_bean "Learn how to delete a bean.") a bean.
