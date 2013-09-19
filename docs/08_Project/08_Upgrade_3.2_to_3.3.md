# Upgrade 3.2 to 3.3

Welcome to the RedBeanPHP ORM upgrade guide for upgrading from version 3.2 to version 3.3. This guide
describes possible issues when upgrading from release 3.2 to version 3.3.
RedBeanPHP 3.3 is a minor release and offers new functionality. For the most part this release
is backward compatible. You should be able to migrate your projects with ease. However there are some
minor incompatible changes. These are discussed on this page.

## Strict Bean Types

From 3.3 on bean types may only contain alphanumeric characters. The underscore is no longer
allowed. The reason for this is that in RedBeanPHP the underscores signifies a relationship between
two types; for instance 'product_shop' is recognized as a relational bean or link table representing
the relation between a product and a shop. The strict typing feature can be overridden easily by issueing:

```php
R::setStrictTyping(false);
```

## Keyless export

From 3.3 on, the bean export behaviour has become more consistent. Prior to 3.3 when you performed
an export on a bean the lists would be returned as arrays indexed by the IDs. This is very problematic
for Javascript to work with because it creates NULL entries for intermediate entries which is bad for
performance and just ugly. On the other hand exportAll() never did this. In RedBeanPHP 3.3 this has changed.
All exports now return keyless lists. If you need to old bahviour use:

```php
RedBean_OODBBean::setFlagKeyedExport(true);
```

With the new keyless exports I hope to increase the consistency throughout the library and
improve support for more Javascript oriented development strategies.

## Plugins

In RedBeanPHP 3.3 plugin functions no longer have hard coded facade methods. For instance the Cooker plugin
provides a method R::graph(). This method still exists, but only in R. Not in the facade RedBean_Facade.
These plugin extensions of R are now compiled into the R-class by the Replica Build Script. If you use these
methods on the facade class itself you should replace this code using a find replace action on your project.
