<category>Relation Mapping</category>

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

# Counting beans

In version 3.5 and higher you can count related beans like this:

```php
$numPages = $book->countOwn('page');
```

This also works for shared lists:

```php
$numProjects = $member->countShared('project');
```

And with conditions:

```php
$numProj = $member
		->withCondition(' member_project.role ', array('lead'))
		->countShared('project');

$numPages = $book
		->withCondition(' book_page.number > ? ', array(100))
		->countOwn('page');
```

The first line in the code block above counts all projects in which
$member participates as a leader. The second example counts all pages
in book $book after page number 100.

Relation counts also play nice with aliases and via:

```php
$shop->via('relation')->countShared('customer');

$Andy->alias('coAuthor')->countOwn('book');
```

The first line in the code block above counts all customers
for shop $shop using link type: relation. The second line
counts all books written by Andy as a co-author.

Note that 'coAuthor' will be converted to co_author - the
canonical name of the property.

# Eager loading

Preloading/Eager loading requires RedBeanPHP version 3.3+

If you know in advance that you need some parent beans you can inform RedBeanPHP about this
to avoid unnecessary queries:

```php
$books = R::find('book');
R::preload($books,array('author'));
foreach($books as $book) echo $book->author;
```

Here RedBeanPHP will **NOT** query each author separately. Instead, the preload() will attach
all author beans upfront. Preload also understands aliases:

```php
$books = R::find('book');
R::preload($books,array('coauthor'=>'author'));
foreach($books as $book) echo $book->coauthor;
```

## More powerful preloader

These power-user features require RedBeanPHP version 3.4+

From version 3.4+ on you can preload multiple parents like this:

```php
$texts = R::find('text');
//to preload page, book and author parents:
R::preload($texts,'page,page.book,page.book.author');
//or use the short-syntax:
R::preload($texts,'page,*.book,*.author');
```

To retrieve the parent of a previous parent you can use the '*'.
If you would like to retrieve a parent bean on the same level as the previous parent
in the list use '&amp;' instead.

```php
$p = R::find('page');
//preloads page->book, page->book->author
//and page->book->shelf
R::preload($p,'book,*.author,&.shelf');
```

Note that both 'shelf' and 'author' are parents of book. Therefore
we prefixed the '.shelf' with an &amp; and not an '*'. If we would have used the
latter, preload() would have tried to fetch page-&gt;book-&gt;author-&gt;shelf which
does not exist of course.
To preload lists:

```php
$books = R::find('book');

R::preload($books,'ownPage|page,sharedGenre|genre');

foreach($books as $book) {
	print_r($book->ownPage);
}
```

Preloading is embedded in the syntax of RedBeanPHP, for instance instead of
using an ugly foreach-loop, RedBeanPHP can make your code more
elegant by preparing the preloaded beans for you as arguments of a closure
(requires PHP 5.3):

```php
R::each($texts,'page,*.book',
function($text,$page,$book){
	...no ugly foreach-loop...
});
```

R::each is exactly the same as R::preload. The difference is just stylistic.
If you use the closure variant I recommend to use **'each'** to highlight the
iteration.

Since RedBeanPHP 3.4.1 you can use with() conditions in preloading like this:
'ownBook'=&gt;array('book',' AND category = ? ',array($category)) - i.e. simply replace
the string 'book' for an array containing:

1. the type string

2. the SQL snippet you want to use and

3. the parameter bindings

Please be aware that these snippets are embedded in the query that retrieves all records
so adding LIMIT clauses will cause undesirable results.

# Aliasing

Normally, a property that contains a bean needs to be **named after it's type**.
We have seen this with parent objects; to access the village a building belongs to, you
just read the

```php
$building->village
```

property.
90% of the time this is _exactly_ what you need.
A parent object can be **aliased** though.

When dealing with people you often have to store persons using a _role name_.
For instance, two people are working on a science project. Both people are in fact
'person' beans. However one of them is a _teacher_ and the other is a _student_.

```php
list($teacher,$student) = R::dispense('person',2);
$project->student = $student;
$project->teacher = $teacher;
```

RedBeanPHP will store both the student and the teacher as persons because
RedBeanPHP simply **ignores** the property name when saving.
RedBeanPHP stores the student and the teacher both as person beans and
the project table will get two fields:
_teacher_id_ and _student_id_ pointing to the respective person records.
However when you
_retrieve_ the project from the **database**, you need to
to tell RedBeanPHP that a student or teacher is in fact a **person**. To do so,
you have to use the **fetchAs()** function:

```php
$teacher = $project->fetchAs('person')->teacher;
```

## Aliased Lists (3.3+)

To get a list of all projects associated with a certain person, in the role
of a student (aliased as student) use:

```php
$person->alias('student')->ownProject;
```

Note that some functions do **not** support
aliased properties; most notably R::dependencies() and R::exportAll().
Also, aliased names are cached, a list won't reload if prefixed with an
alias() method. In version 3.5+ the list will reload if the alias has changed though.

Aliased lists have been added in version 3.3

## In other words&hellip;

Aliasing is the RedBeanPHP way of saying 'one-to-X'.

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

# Enums and more

An enum type is a special bean that enables for a property to be a set of predefined values.
To use an ENUM:

```php
$tea->flavour = R::enum( 'flavour:english' );
```

The ENUM method will do a lot of work here. First it checks whether there exists
a type of bean with a property name set to 'ENGLISH'. If this is the case, enum() will
return this bean, otherwise it will create such a bean, store it in the database and
return it. This way your ENUMs are created on the fly - properly. To compare an
enum value:

```php
$tea->flavour->equals( R::enum('flavour:english') );
//stores ENGLISH in the database... UPPERCASE!
```

To get a list of all flavours, just omit the value part:

```php
$flavours = R::enum('flavour');
```

To get a comma separated list of flavours you might want to combine
this method with other Label Maker methods:

```php
echo implode( ',', R::gatherLabels( R::enum('flavour') ) );
```

Since RedBeanPHP enums are beans you can add other properties as well.

The enum() method has been added in RedBeanPHP version 3.5

## Other relations

Most of the time you use one-to-many and many-to-many relations.
As of 3.4 RedBeanPHP offers **limited** (mostly to enable you to
communicate with legacy databases more easily) support for other relations as well.

## One-to-one

One-to-one relations are not used frequently. Traditional 1-1 records are
linked by their primary keys. In RedBeanPHP you can load them like this:

```php
list($author,$bio) = R::loadMulti('author,bio',$id);
```

This loads an author and a biography with the same ID.
You need to make sure the IDs are in sync yourself, you can use
transactions for this. Note that real one-to-one relations are rare and
most of the time they represent legacy records. Also consider using
a simple own-list instead of a real one-to-one or just put the
records in the same table.

One-to-one relations are not very 'RedBeanish'. In RedBeanPHP you would
simply store this information in the same bean.

## Polymorph relations

Relational database are **not** suitable for polymorph relations.
However if you ever need to load a bean of which the type is based on a
field value you can use a slight variation of fetchAs():

```php
$ad = $page->poly('contentType')->content;
```

Returns the bean referred to in content_id using the bean type
specified in content_type. If content type contains the value 'advertisement'
the content will be a bean with type 'advertisement' and id = content_id.

Don't try to use new polymorph relations with poly(), RedBeanPHP does not
support polymorph relations. This method has been added to ease loading
existing polymorph relations only.  Use poly() to retrieve polymorph data
from an external or legacy database.

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

# Cheatsheet

If you are new to RedBeanPHP but you have been working with
relational databases in the past you might be a bit confused with the
terminology in RedBeanPHP. Here is a little 'cheatsheet' mapping
relational terms to RedBeanPHP terms. You might find this useful.

<table class="matrix">
<thead>
	<tr><th>Relation</th><th>RedBeanPHP method</th></tr>
</thead>
<tbody>
	<tr><td>one-to-one        </td><td>R::loadMulti('author,bio', 1)<sup>[1]</sup></td></tr>
	<tr><td>one-to-many       </td><td>$author-&gt;ownBook[] = $book</td></tr>
	<tr><td>many-to-one       </td><td>$book-&gt;author = $author</td></tr>
	<tr><td>many-to-many      </td><td>$book-&gt;sharedCategory[] = $category</td></tr>
	<tr><td>one-to-many self-referential</td><td>$category-&gt;ownCategory = $category</td></tr>
	<tr><td>many-to-many self-referential</td><td>$category-&gt;sharedCategory = $category</td></tr>
	<tr><td>one-to-X          </td><td>$book-&gt;fetchAs('author')-&gt;coauthor = $coAuthor;</td></tr>
	<tr><td>X-to-one          </td><td>$author-&gt;alias('coauthor')-&gt;ownBook;</td></tr>
	<tr><td>many-to-many + properties</td><td>$book-&gt;link('category_book', array('location'=&gt;'2nd floor'))-&gt;category = $category<sup>[2]</sup></td>
	<tr><td>polymorph         </td><td>$eBook = $book-&gt;poly('media_type')-&gt;media<sup>[3]</sup></td></tr>
</tbody>
<tfoot>
	<tr><td colspan="2"><sup>1</sup>This is a very uncommon relation. You can also use One-to-many plus a unique constraint for this.</td></tr>
	<tr><td colspan="2"><sup>2</sup>You can also rename this association and use access shared lists using via() (3.5+).</td></tr>
	<tr><td colspan="2"><sup>3</sup>Kind of defeats the purpose of a relational database though because you cannot use foreign keys now.</td></tr>
</tfoot>
</table>

While RedBeanPHP is perfectly capable of managing almost any
kind of relationship, I recommend to keep things simple.
Most of the time the basic relations like one-to-many, many-to-one, self-referential relations and many-to-many will do.
Sometimes I use one-to-X and X-to-one (aliasing). Personally I never use one-to-one or polymorph, these are
extremely uncommon.
