# Cache

There are two caching mechanisms in RedBeanPHP, the
[Query Cache](#querycache "Easy caching for RedBeanPHP!") and the
[Bean Cache](#beancache "Advanced caching for RedBeanPHP!").
I recommend to use the Query Cache, the Bean Cache is a plugin and it makes RedBeanPHP somewhat more
complex to use.

## Query Cache

In RedBeanPHP 3.4 you can use a very **easy-to-use** caching system: the **Query Writer Cache**.
This _caching_ mechanism will return the same result set for identical _query-value_ pairs.
The cache gets automatically _flushed_ everytime something other than a _select_ query is fired (i.e. an INSERT or DELETE).
This means that this is a relatively safe cache to use. Issue the following statement to activate the Query Writer Cache:

```php
R::$writer->setUseCache(true);
```

## Bean Cache

RedBeanPHP offers a Bean Cache. The bean cache can be configured like this:

```php
$cachedOODB = new RedBean_Plugin_Cache($t->getWriter());
")?>

To allow the facade to use the cache (note that $t is a toolbox instance RedBean_ToolBox):

```php
$t = R::$toolbox; //obtain old toolbox
R::configureFacadeWithToolbox(new RedBean_ToolBox(
$cachedOODB,
$t->getDatabaseAdapter(),
$t->getWriter()));
```

To flush cache:

```php
$cache->flushAll();
```

You can also choose to flush cached beans of a given type:

```php
$cache->flush($type);
```
