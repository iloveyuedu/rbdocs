# Deleting a Bean

To remove a bean from the **database**:

```php
R::trash( $book );
```

To delete **more** beans of type book:

```php
R::trashAll( $books );
```

To delete **all** beans of type book:

```php
R::wipe( 'book' );
```

## Nuke

You can also empty an entire database with the R::nuke() command. Be very careful with this!

Next: learn how to stop RedBeanPHP from modifying the schema any further; before _deploying_
your RedBeanPHP based application you should
[freeze](/freeze "Learn how to freeze the database") the database.
