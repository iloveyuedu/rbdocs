# Import and Export

You can **import** an array into a bean using:

```php
$book->import($_POST);
```

The code above is handy if your **$_POST** request array only contains book data. It will
simply load all data into the book bean. You can also add a selection filter:

```php
$book->import($_POST, 'title,subtitle,summary,price');
```

This will restrict the import to the fields specified. Note that this does not
apply any form of validation to the bean. Validation rules have to be written in the [model](/models_and_fuse "Models and FUSE")
or the controller.

You can **export** the data inside a bean to an array like this:

```php
$bookArray = $book->export();
```

Calling **export()** on a bean will export the data of a single bean into an array.
R::beansToArray takes an array of beans and returns an array containing their values (requires version 3.5 or higher).

## Recursive Export

To recursively export one or an array of beans use:

```php
$arrays = R::exportAll( $beans );
```

Bean lists in exports have keyless.

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

Since version 3.3: R::exportAll( $beans, true ) -- exports parent beans as well.

Since version 3.3: to only export a specific set of bean types:
R::exportAll( $beans, true, $filters ); here $filters contains the list of
types to be exported.

If the exportAll() function does not export enough related beans (for instance you also want to load some of the
shared relations) you can do a R::preload() first (RedBeanPHP 3.4+).

## Careful&hellip;

Import functions do not validate user input.

exportAll() is **slow**. You can speed up by passing an array of cache tables:

R::$duplicationManager->setTables($tables); (**3.3+**)
or export manually using the bean->export() functions.

## Swap

It's very common in real life applications to swap properties.
For instance, in a <abbr title="Content Management System">CMS</abbr> you often have a feature to change the order of pages or menu items.
To swap a property use:

```php
$books = R::batch('book',array($id1,$id2));
R::swap($books,'rating');
```

We simply load two books using the [batch loader](/loading_a_bean "Learn how to load a batch of beans"), then we pass the array with two books to swap() as well as the
name of the property we which to swap values of.
