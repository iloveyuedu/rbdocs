# Adding Lists

Relational mapping in RedBeanPHP is done using lists.
For instance let's say we have a village and buildings. The buildings belong to the village,
so the village 'owns' buildings. This is a **one-to-many** relationship because we have **ONE**
village that has **MANY** buildings. In RedBeanPHP this is an **own-list**:

```php
$village = R::dispense('village');
list($mill,$tavern) = R::dispense('building',2);

//replaces entire list
$village->ownBuilding = array($mill,$tavern);

R::store($village);
```

Now, the _mill_ and _tavern_ buildings belong to the village. In the database,
RedBeanPHP will add a **village_id** field to the **building** table, pointing
to the village record the building belongs to.

An own-list always bears the name of the **type** of beans it contains:
**ownBuilding** only contains beans of type 'building', **ownPage** contains
pages etc..

Adding the same building to another village causes the other village to steal
the building! This is because the own-list contains only beans exclusively owned
by the owner bean. That makes sense because it's an one-to-many relationship,
not a many-to-many relationship.

Once stored, lists will be retrieved the
moment you access the property (we call this **lazy loading**). To retrieve all the buildings in a village:

```php
$village = R::load('village',$id);
$buildings = $village->ownBuilding;
```

To **add** a building to an existing own-list use:

```php
//add a building
$village->ownBuilding[] = $building;
```

to replace all buildings in an own-list:

```php
$village->ownBuilding = array( $building1, $building2 );
```

The buildings are keyed by their database **IDs**.
So to replace a bean:

```php
$village->ownBuilding[$id] = $house;
```

To delete a building from the list use unset()...

```php
unset($village->ownBuilding[$someID]);
R::store($village);
```

## Dependencies

By default if you remove a bean from a list the connection will be broken (in case of a shared list the
intermediate bean is also deleted) but the referenced bean will remain
in the database. If you want RedBeanPHP to remove beans for you that have been removed from lists use:

```php
R::dependencies(array('page'=>array('book','magazine')));
//will now also destroy the page.
unset($book->ownPage[$id]);
```

Note that you can only call this method once. If you call it for a second time it will replace the
previous dependency list. Also, you can't use this method to remove the constraints in the database; this
have to be done manually.

From RedBeanPHP **3.2** on making beans dependent on other beans will also add an **ON CASCADE DELETE** trigger on the
corresponding foreign key.

## Ordering and Limiting Lists (3.3+)

Imagine you have a shelf with books. To obtain the books from the shelf you can use
the own-list: $shelf-&gt;ownBook. Sometimes you want to modify this list; ordering the
books in the list for instance. To do this you can add a little SQL like this:

```php
$books = $shelf->with(' ORDER BY title ASC ')->ownBook;
```

To limit the number of books in the list:

```php
$books = $shelf->with(' LIMIT 10 ')->ownBook;
```

To filter:

```php
$books = $shop->withCondition(' price < 50 ')->ownBook;
```

A with() or withCondition() method triggers a reload of the list,
even if the query has not changed.

withCondition() and with() have been added in version 3.3

## Adhoc parameter binding (3.4+)

From 3.4 on you can also bind parameters in these SQL snippets:

```php
$books = $shop->withCondition(' price < ? ',
	array($price))->ownBook;
```

## In other words&hellip;

The own-list is the RedBeanPHP implementation of one-to-many relations.
Many-to-one relations are implemented using so-called
[parent beans](/parent_object "Learn about many-to-one relations, aka parent beans.").
