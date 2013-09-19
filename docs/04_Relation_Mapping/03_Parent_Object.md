# Parent Object

We previously discussed the own-list. This is RedBeanPHP's version
of a **one-to-many** relationship. However, if we look from the other end
of the relationship we have a **many-to-one** relationship: many buildings
belong to **one** village. Suppose you are working on this end
of the relationship; you have a building, how can you access its village?

```php
$village = $building->village;
```

We call this the _parent bean_.
The term _'parent'_ may be confusing but on the other hand it clearly indicates that
on the other side the bean is part of a _list_ **owned** by another bean.

You can unset the parent bean like this:

```php
unset($building->village);

$building->village = null;
```

Trying to assign something other than a bean to a parent object field will
throw an exception:

```php
//throws a RedBeanPHP Security exception
$building->village = 'Lutjebroek';
```

Once a property has been used to store a bean, it can only be
used to store a bean afterwards.

## The Reserved Column

While RedBeanPHP uses the **village_id** column to refer to the actual
related record, the **village** property of the bean will be used to
return the village bean (_a magic getter_). This means that both the
**village_id** and **village** columns are actually **reserved** for the relation mapping.
_Please_, do <u>not</u> use a column with the **same name as the magic getter** (&quot;village&quot; in this case)
for a different purpose. In RedBeanPHP terms this is called the _'reserved'_ column.

## In other words&hellip;

Parent beans are the RedBeanPHP way of saying: 'many-to-one'.
