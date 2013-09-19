# Tainted

To see whether a bean has been changed:

```php
$bean->getMeta('tainted');
```

Note that certain properties, like lists (see chapter lists) also cause a bean to get
marked as tainted.
In RedBeanPHP version 3.4 there is a shorthand method: isTainted().

## Old Values (3.4)

In RedBeanPHP 3.4+ you can check whether a certain property has changed and you can retrieve
the previous value.

```php
$post->hasChanged('title'); //has title been changed?
$oldTitle = $post->old('title');
```
