# Tags

Tags are often used to categorize or group items into meaningful groups.
To tag a an item:

```php
R::tag( $page, array('topsecret','mi6') );
```

To **fetch all tags** attached to a certain bean we use the same method but without the tag parameter:

```php
$tags = R::tag( $page ); //returns array with tags
```

To **untag** an item use

```php
R::untag($bean,$tagListArray);```

To get all beans that have been tagged with $tags, use **tagged()**:

```php
R::tagged( $beanType, $tagList );```

To find out whether beans have been tagged with specific tags, use **hasTag()**:

```php
R::hasTag($\bean, $tags, $all=false)```

To **add tags** without removing the old ones:

```php
R::addTags( $page, array('funny','hilarious') );
```

To get beans that have ALL these tags: (since 3.2)

```php
//must be tagged with both tags
R::taggedAll( $page, array('funny','hilarious') );
```
