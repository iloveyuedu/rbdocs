<category>Basics</category>

# Create a Bean

Using RedBeanPHP is easy. First create a bean. A bean is just a plain old object with public properties. Every bean has
an **id** and a **type**.

```php
$book = R::dispense('book');
```

Now we have an empty
bean
of type **book** with id **0**.
Let's add some properties:

```php
$book->title = 'Gifted Programmers';
$book->author = 'Charles Xavier';
```

Or&hellip; if you're in the mood for chaining you can use:

$book-&gt;setAttr('title','Gifted Programmers')-&gt;setAttr(..) etc&hellip;

(requires version 3.3+)

Let's store this bean in the database:

```php
$id = R::store($book);
```

**That's all?** _Yes_. Everything has been written to the **database**! RedBeanPHP **automatically** creates the **table** and
the **columns**.

Note that the store() function returns the ID of the record. Also, there is storeAll($beans) in RedBeanPHP 3.1

## How does it work?

RedBean dynamically adds columns if you add new properties:

```php
$book->price = 100;
```

RedBeanPHP also updates the column type to support a different type of value.
For instance, this will cause the column to change from **TINYINT** to **DOUBLE**:

```php
$book->price = 99.99;
```

## More data types

You can store other data types as well:

```php
$meeting->when = '19:00:00'; //Time
$meeting->when = '1995-12-05'; //Date
$photo->created = '1995-12-05 19:00:00'; //Date time
$meeting->place = '(1,2)'; //only works in postgres
```

You can use R::isoDate() and R::isoDateTime()
to generate the current date(time) if you like.

## Multi Dispense

To dispense multiple beans at once:

```php
$twoBooks = R::dispense('book',2);
```

## Use the cache!

Start your code with: R::$writer->setUseCache(true); to make use of query caching.
This will prevent RedBeanPHP from performing unnecessary queries. This feature is
available since RedBeanPHP 3.4. While RedBeanPHP offers other caching mechanisms as
well this is the easiest to use and it's completely transparent!

## The rules

**Bean types** may only consist of **lowercase** **alphanumeric** symbols **a-z** and **0-9**
(no underscores).
A property name has to **begin with a letter** and may consists of letters and numbers. **Underscores
** in property names
are allowed but I recommend to come up with better nouns instead.

Underscores in **Bean types** are _not_ allowed because RedBeanPHP uses these to identify relations.
Underscores are used to
denote a relation between two beans, therefore you should not dispense such beans yourself.

The RedBeanPHP naming restrictions allow RedBeanPHP to figure out relationships among tables and beans
without configuration; however these rules also help you to maintain a clean and consistent database
schema. Moreover, developers often make up terrible names for tables (i.e. 'tbl_userrights', 'person_Project' etc&hellip;).
I try to encourage people to
take some time to find the correct 'name' (often a simple noun) for their beans (i.e. 'privilege','participant').
This also improves the readability
(and maintainability) of your database. Just take some time to find the noun that describes
the entity you're modelling best.

If, for some reason you really need to break these rules use: Use R::setStrictTyping(false); This may cause
some side effects with dup() and export() though.

As of RedBeanPHP 3.4, a property name like 'singleMalt' will be automatically converted to 'single_malt'.
If you don't like that, use: RedBean_OODBBean::setFlagBeautifulColumnNames(false);

# Loading a Bean

To load a bean from the database use the **load()** function and pass both the **type** of the bean and the **id**:

```php
$book = R::load('book', $id);
```

If the bean cannot be loaded a new **empty** bean will be dispensed with id **0**.
To check whether a bean has been loaded correctly you can
verify the id using:

```php
if (!$bean->id) { ...help bean not found!!.. }
```

This behaviour is very useful. For instance, consider loading a page bean:

```php
$page = R::load('page',$id);
show_form($page); //imaginary function
```

If the page does exists, the contents of the page will be shown in the form to allow
the user to update the page. However if the page does not exist, what are we going to do?
Well the page is gone after all (maybe someone has removed the page?),
so we can just as well present the user with an empty form.
This saves a lot of unnecessary _if-then-else_ code.

After a bean has been loaded, you can simply access properties like you expect:

```php
echo $book->title; //displays value of property title
```

Properties of a loaded bean only contain **STRING** or **NULL** values.

## Batch Loader

To load a **batch** of beans at once:

```php
$books = R::batch('book',array($id1,$id2));
```

## Counting

To **count** beans:

```php
R::count('page'); //counts all pages
```

Since RedBeanPHP 3.3 you can also add some SQL:

R::count('page',' chapter = ?',array($chapter))

## Empty Beans

**Remember**: If the bean _cannot_ be loaded a **new empty bean** will be dispensed with id **0**.

Next: learn how to [delete](/deleting_a_bean "Learn how to delete a bean.") a bean.

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

# Freeze

By default **RedBeanPHP** operates in **fluid** mode. In fluid mode the **database**
**schema** gets updated to meet the requirements of your code.
For instance, if you assign a string to a property that previously only contained numbers RedBeanPHP
will _broaden_ the column to store strings as well.
This is great for development. However because inspecting the database is slow and you don't want
such a dynamic schema on the production server you should freeze the database by
invoking the **R::freeze(true)** command before deployment. This will lock the schema to prevent
further modifications.

```php
R::freeze( true ); //will freeze redbeanphp
```

Between freezing and deployment you need to review the database schema to make sure
it fits the bill. Here is a simple checklist:

1.  Check the column types. RedBeanPHP tries to guess the right types based on usage during development, however
	column types may be improved based on your expectations about real world usage.
2.  This issue concerns relations, if you haven't read about RedBeanPHP relations yet, you can skip this
	item for now.
	RedBeanPHP sets foreign keys for [relations automatically](/adding_lists#dependencies "Learn about relational mapping"),		however by default RedBeanPHP selects 'SET NULL'
	as the default action for deletions because the system can't predict whether a cascaded delete is desired. Make sure
	Check these foreign keys before deployment. If you don't know anything about foreign keys these default settings are
	probably just allright.
3.  RedBeanPHP adds some indexes. However, additional indexes may improve performance. Once again
	I recommend to review the indexes and adjust them where necessary based on your knowledge about		production environment.

## Chill Mode

Instead of freezing all beans you can freeze certain bean types only:

```php
R::freeze( array('book','page') );
	//book,page tables remain untouched.
```

this we call 'Chill Mode'.

Chill Mode has been added in version 3.2

Next: finding stuff with RedBeanPHP is really easy.
[RedBeanPHP uses familiar SQL](/finding_beans "Finding beans with RedBeanPHP ORM with some good old SQL") to
search for beans in the database.

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
