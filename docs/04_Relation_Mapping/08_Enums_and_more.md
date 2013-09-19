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
