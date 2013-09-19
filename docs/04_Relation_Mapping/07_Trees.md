# Trees

RedBeanPHP also supports **self-referential** **one-to-many** and **many-to-many** relationships.
In RedBeanPHP terminology these are called trees. Here is an example, let's decorate a christmas tree with some
candy canes:

```php
$cane = R::dispense('cane',10);
$cane[1]->ownCane = array( $cane[2], $cane[9] );
$cane[2]->ownCane = array( $cane[3], $cane[4] );
$cane[4]->ownCane = array( $cane[5],
			$cane[7], $cane[8] );
$cane[5]->ownCane = array( $cane[6] );
$id = R::store($cane[1]);
$root = R::load('cane',$id);
echo $root->ownCane[2]->ownCane[4]
	->ownCane[5]->ownCane[6]->id;
//outputs: 6
```

In fact trees are just a special case of lists.

## Traversal (3.5+)

To get **all** parents of a bean:

```php
$page->searchIn('page');
```

You can also insert **SQL snippets**:

```php
$page->withCondition( ' user_id = ? ', array( $me->id ) )
	->searchIn( 'page' );
```

You can search for beans in own-lists as well:

```php
$page->withCondition(' content LIKE ? ', array( $content ) )
	->searchIn( 'ownPage' );
```

The searchIn() method also supports fetchAs, via and alias.
For instance the following code searches all projects that
belong to Linda in the role of 'teacher' (alias).

```php
$linda->withCondition(' subject = ? ', array( 'math' ) )
	->alias( 'teacher' )
	->searchIn( 'ownProject' );

```

While searchIn() is a powerful tool, there are some limitations.
It does not support shared lists and ordering does not work as you expect
(because the recursive filtering it is not possible to use SQL to order the
entire result set). Also note that this method can be slow for large trees.

## In other words&hellip;

A Tree is the RedBeanPHP version of a self-referential relationship.
