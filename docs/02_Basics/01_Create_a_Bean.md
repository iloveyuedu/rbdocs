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
