# Association API

Another way to use **many-to-many** relations is to use the **R::associate()** function. This function takes two beans
and associates them. To get all beans related to a certain bean you can use its counterpart **R::related()**.

```php
R::associate( $book, $page );
R::related( $page, 'book' );
R::relatedOne( $page, 'book'); //just the first bean
```

To **break** the association between the two:

```php
R::unassociate( $book, $page );
```

To **unassociate** all related beans:

```php
R::clearRelations( $book, 'page' );
```

From version 3.3 on you can use multiple beans with (un)associate, like this:
R::associate($wines, $barrels);

## Are Related

To find out whether two specific beans are **related**, use the
R::areRelated() function.

```php
R::areRelated( $husband, $wife );
```

This function returns TRUE if the two beans have been associated using
a many-to-many relation (associate) and FALSE otherwise.

## Association and SQL

With the Association API it's possible to include some <abbr title="Structured Query Language">SQL</abbr> in your relational
query:

```php
R::related( $album, 'track', ' length > ? ', array($seconds) );
```

## Extended Associations

**Extended Many-to-many relations** are _deprecated_ as of RedBeanPHP 3.4.

As of RedBeanPHP 3.4 you really don't need this functionality anymore. Instead use the
[intermediate bean notation](/shared_lists#link "Use the intermediate bean notation to store extended N-M relations").

An **extended association** is a **many-to-many** association with some extra information.

```php
R::associate($track,$album,array('sequencenumber'=>$s));
```

<abbr title="Javascript Object Notation">JSON</abbr> is also allowed:

```php
R::associate($track,$album,'{\"order\":\"2\"}');
```

Or just a **string**:

```php
R::associate($track,$album,'2'); //stored in property 'extra'
```

To **load** a association link:

```php
$keys = R::$extAssocManager->related($album,'track');
```

## Be careful with extended relations

Note that you almost never need extended associations at all. In most cases
an intermediate bean is better.
For instance, imagine a **project** bean and a **person** bean.
You want to connect a
**person** to a **project** so maybe you think:

```php
R::associate($project,$person);
```

But then you realize you need to specify
a role as well. It's tempting to switch to an extended association now, however this is not a good idea.
What you are really looking at is an **intermediate bean**. Don't try to obscure this bean in a relation. In this
case we have to differentiate between a **person** and a **participant**.

```php
$participant->person = $person;
$participant->role = 'developer';
$project->ownParticipant[] = $participant;
```

This approach has several advantages; you can easily add more information to the participant bean:

```php
$participant->leader = true;
```

You can model the fact that participants can be represented by multiple persons (for instance if someone gets ill):

```php
$participant->person = $replace;
```

...and it's also easy to find out how frequently someone is
participating in projects:

```php
$activities = $person->ownParticipant;
```

It would be cumbersome hide all this in a link table by using extended associations.

## Rule of thumb&hellip;

Here is my rule of thumb: if you need to **qualify** a relationship you
**probably** need to use an intermediate bean.
