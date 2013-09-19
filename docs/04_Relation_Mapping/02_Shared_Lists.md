# Shared Lists

Consider the following example concerning a strategy game:
An army can defend one or more villages. Thus an army can belong to many villages, _or
do the villages belong to the army?_ In any case, this is an example of a
**many-to-many** relationship. Many villages can be associated with many armies.
In RedBeanPHP we describe this kind of relation with a **shared-list**.

```php
$army = R::dispense('army');
$village->sharedArmy[] = $army;
$village2->sharedArmy[] = $army;
```

Now both villages have the **same** army. Once again the name of the shared list
property needs to match the type of bean it stores. In the database, RedBeanPHP will
make a link table **army_village** to associate the armies with their villages.

## The other end of the beans&hellip;

Which villages does an army belong to? To answer this question use:

```php
$myVillages = $army->sharedVillage;
//or.. R::related($army,'village');
```

For the rest, shared lists work just like [own-lists](/adding_lists "Adding Lists").
For instance, just like own lists, shared lists can be filtered using withCondition() and sorted or limited
using with().

## Filtering by link (3.5)

Unlike own lists, you can filter a shared lists by their linking beans.
For instance if we want to obtain all villages that our army defends:

```php
$villages = $army->withCondition(' army_village.action = ? ',
	array('defend'))->sharedVillage;
```

## Access the link bean

To access the links between an army and its villages:

```php
$links = $army->ownArmyVillage;
//Prior to 3.4 use: ownArmy_village
```

Once you have obtained a link you can add additional properties:

```php
$link->action = 'defend';
```

## Additional properties (3.4)

To add additional properties to a relation you can add the
shared beans using the link() method like this:

```php
$village->link('army_village',
	array('action'=>'defend'))->army = $army1;
```

This will not just associate the army and the village but also
qualify the relation by adding the property 'action' to the relationship.
Instead of an array you may also use a JSON string:

```php
$village->link('army_village',
	'{\"action\":\"defend\"}')->army = $army1;
```

Sometimes N-M relations are hidden in concepts (or we could argue
that N-M relations are hidden concepts).
For instance, if you have a bean called visit that has both
an army and a village you can use this bean as a link table associating
armies and villages.
To use regular tables as link tables, just rename the
association:

```php
$village->link('visit',
	'{\"action\":\"defend\"}')->army = $army1;

R::store($village);

//returns armies linked in visit table
$armies = $village->via('visit')->sharedArmy;

//access the visit information
$visit = $army->ownVisit;

//or...
$village->ownVisit;
```

Instead of via(), you can also use R::renameAssociation, this method also accepts an associative array instead of just
single values. The via() method is an alias for renameAssociation since 3.5.

## In other words&hellip;

Shared lists are the RedBeanPHP way of saying: 'many-to-many'.
