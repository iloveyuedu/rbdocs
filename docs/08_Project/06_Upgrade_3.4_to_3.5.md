# Upgrade 3.4 to 3.5

Welcome to the RedBeanPHP ORM upgrade guide for upgrading from version 3.4 to version 3.5.
RedBeanPHP 3.5 is a minor release, this means that it's almost backward compatible with previous
releases in the 3-series. However even in a minor release there might be minor incompatibilities
because the product has to move forward. This chapter describes the minor backward compatibilities
and how to deal with them.

## Unrelated method removed

The R::unrelated() method has been removed. This method had become quite problematic because
the architecture could not be cleanup up because of this method. Also, this method has
nothing to do with object relational mapping anyway - it was a feature request during a period
in which I was less critical. Well, it's gone now. If you have some code depending on this
method you'll have to write a query.

## Internal select method removed

The internal select() method in writers has been removed. Nobody should have used this
internal method anyway.

## Plugin Sync removed

This plugin is still available in other branches and work as expected however I do
not consider this core functionality.
