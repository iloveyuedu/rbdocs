# Changelog

<style>
table { margin-bottom: 50px; }
table th:nth-child(1) { width: 200px; }
</style>

## 2013-06-12: V 3.4.7

*   DONE - Database name now visible in exception string.
*   DONE - getCell now returns NULL instead of an empty array in case of an exception.
*   DONE - Added static method for Null flag in Cooker to fix a test case.

## 2013-05-23: V 3.4.6

*   DONE - Backward compatibility fix: re-added getProperties() in Bean class.

## 2013-05-15: V 3.4.5

*   DONE - [isChanged](https://github.com/saetia/redbean/commit/8139ddc19b3d93468ad164695df68a291a867b25 "View issue on Github") now also returns true if change to NULL.

## 2013-05-09: V 3.4.4

*   DONE - Send along error code with [connect](https://github.com/gabordemooij/redbean/issues/262 "See issue").

## 2013-04-29: V 3.4.3

*   DONE - Fixed Stash cache

## 2013-04-11: V 3.4.2

*   DONE - Fixed typo

## 2013-04-05: V 3.4.1

*   DONE - Added possibility to [add SQL to ownList and sharedList in Preloader](/eager_loading#sql "Read more about Preloading with SQL")

## 2013-04-01: V 3.4

<ul>
<li>DONE - [Beautification](/create_a_bean#beau "Beautiful column names") of column names</li>
<li>DONE - Basic support for [1-1 and polymorph](/enums_and_more "misc. relations") relations</li>
<li>DONE - Integrate [SQLHelper](/adding_lists#adhoc_binding "adhoc parameter binding") and with() withCondition()</li>
<li>DONE - Easy way to [add properties](/shared_lists#additional_properties) to a shared relation</li>
<li>DONE - Easy way to use [R::preload()](/eager_loading#preload34) for nested beans</li>
<li>DONE - Renewed Support for [spatial types](/create_a_bean#datatypes)</li>
<li>DONE - [Query Writer Cache](/query_cache "Query Cache")</li>
<li>DONE - Make Facade thinner (Harmonize APIs)</li>
<li>DONE - [$bean-&gt;old('property');](/tainted "Old properties") - Read previous value (3.3.4)</li>
<li>DONE - [$bean-&gt;hasChanged('property'); (3.3.4)](/tainted "Changed bean properties")</li>
<li>DONE - [$bean-&gt;isTainted();](/tainted "isTainted") - shorthand for getMeta('tainted') (3.3.4)</li>
<li>DONE - Advanced [exportAll](/import_and_export#export34)</li>
<li>DONE - MySQL boolean type now uses BOOLEAN columns</li>
<li>DONE - Transactions will be disabled in fluid mode to suppress errors due to schema changes</li>
<li>DONE - R::transaction(closure);</li>
<li>DONE - SQL Helper integration one step further: $bean-&gt;with($sqlBuilderQuery)...</li>
<li>DONE - Moved sync() and timeline() out of all-in-one package</li>
<li>DONE - Added PostgreSQL types: line segments, circles and money</li>
<li>DONE - [nest](/mixing_sql_and_php#nesting "Read more about nesting queries in the query builder") query builders in the query builder.</li>
<li>DONE - Removed escaping method from adapter</li>
<li>DONE - Refactored escaping</li>
<li>DONE - Added -- keep-cache in SQL to instruct writer cache to keep cache even if query is non-read</li>
<li>DONE - Lots of code formatting</li>
<li>DONE - Cleaned up documentation now using references to avoid duplicate comments</li>
</p>

## 2012-11-16: V 3.3.7

*   DONE - Fixed: Cant store initial literal 1.0 value

## 2012-11-16: V 3.3.6

*   DONE - Fixed bug empty beans in R::preload()
*   DONE - Fix minor issue cache loader with id 0

## 2012-11-01: V 3.3.5

*   DONE - Fixed bug in R::preload()
*   DONE - Harmonized Facade (preload and configure) for advanced users

## 2012-10-11: V 3.3.4

*   DONE - Removed support spatial data types.

## 2012-10-11: V 3.3.3

*   DONE - Performance improvement (schema cache) for [Duplication and Export](/import_and_export#speed_up_dup).

## 2012-10-05: V 3.3.2

*   DONE - Fixed SQLite buildcommand-issue. [See issue on Github.](https://github.com/gabordemooij/redbean/pull/203 "Build command issue for Unique in SQLite")

## 2012-10-04: V 3.3.1

</p>

*   DONE - setAttr() does not taint bean. [See issue on Github.](https://github.com/gabordemooij/redbean/issues/201 "Bean Can issue fix")
</p>

## 2012-10-01: V 3.3

*   DONE - Fixed ID-0 issue in BeanCan Server.[See issue on Github.](https://github.com/gabordemooij/redbean/issues/199 "Bean Can issue fix")
*   DONE - Added eager loading for parent beans.[R::preload(...)](/parent_object#preloading "Learn about eager loading")
*   DONE - OCI/Oracle fixes
*   DONE - Tests for bean inject()
*   DONE - Improvements documentation and clean up
*   DONE - Backward compatibility switch for keyed exports: RedBean_OODBBean::setFlagKeyedExport()
*   DONE - $bean->with() now also reloads the list, can now be used multiple times
*   DONE - Beans now accept DateTime objects (convert to string)
*   DONE - Keyless export
*   DONE - Filtered export
*   DONE - [Order and filter own-lists](/adding_lists#ordering "the with() modifier")
*   DONE - Aliased lists
*   DONE - Benchmarking
*   DONE - Support for Oracle Database (plugin Writer) (thanks Stephane)
*   DONE - [Replica: Extend R-facade with plugins](/replica#replica_and_plugins "Read more about building RedBeanPHP with Replica XML")
*   DONE - [Replica: 'flavours'](/replica#flavours "Learn how to assemble your own ORM package with Replica Flavours")
*   DONE - Composer Support
*   DONE - [R::syncSchema()](/multiple_databases#sync "Read the SyncSchema documentation.") easy way to sync databases
*   DONE - New Cache plugin
*   DONE - Tag caching
*   DONE - Polymorphism: associate($bean,$mixedTypes)
*   DONE - Display errors in fluid-debug mode
*   DONE - BeanCan server: [added export method](/beancan_server "BeanCan Server")
*   DONE - Introduction strict type checking
*   DONE - Improved Dependency Injection (3.2.1)
*   DONE - Integer fix CUBRID writer (3.2.2)
*   DONE - Database Writers optional for unit testing, depending on ini config
*   DONE - Added [$bean->setAttr($property,$value)->...; chainable](/create_a_bean#chain "Read about chainable setters.")*   DONE - Added $bean->unsetAll($properties)->...; chainable*   DONE - Now uses SPLExceptions (requires PHP >= 5.1)
*   DONE - Added index-precheck to avoid redundant index creation Exceptions
*   DONE - Fix index check

2012-06-27 - RedBeanPHP 3.2.3:

<table>
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Fix</td><td>Fixed issue causing some columns not to get indexed</td></tr>
</tbody>
</table>

Note: this update might cause so duplicate indexes, please check your database after
freezing and remove redundant indexes (use the less specific/shortest index).

2012-06-21 - RedBeanPHP 3.2.2:

<table>
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Fix</td><td>Fixed issue with large integers in CUBRID driver</td></tr>
</tbody>
</table>

2012-05-01 - RedBeanPHP 3.2.1:

<table>
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Change</td><td>added CUBRID to replica.xml</td></tr>
<tr><td>Fix</td><td>Fixed naming convention details for CUBRID driver</td></tr>
</tbody>
</table>

2012-05-01 - RedBeanPHP 3.2:

<table >
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Feature</td><td>[Boxing and Unboxing beans](http://www.redbeanphp.com/models_and_fuse)</td></tr>
<tr><td>Feature</td><td>[R::findAll()](http://www.redbeanphp.com/finding_beans) to eliminate queries like R::find('**1** ORDER BY ..);</td></tr>
<tr><td>Feature</td><td>R::find() should accept a Query Helper object as well</td></tr>
<tr><td>Feature</td><td>[TimeLine plugin](http://www.redbeanphp.com/schema) (Schema altering log), R::log()</td></tr>
<tr><td>Feature</td><td>[R::dependencies()](http://www.redbeanphp.com/adding_lists) changes foreign key constraints to cascade on delete</td></tr>
<tr><td>Feature</td><td>[CUBRID](http://www.cubrid.org/) [driver](http://www.redbeanphp.com/compatible)</td></tr>
<tr><td>Feature</td><td>Postgres geometrical types</td></tr>
<tr><td>Feature</td><td>R::isoDate and R::isoDateTime</td></tr>
<tr><td>Feature</td><td>SQLHelper queries may contain spaces</td></tr>
<tr><td>Feature</td><td>[Chill Mode](http://www.redbeanphp.com/freeze)</td></tr>
<tr><td>Feature</td><td>R::related($array,'page'); get multiple many-to-many at once</td></tr>
<tr><td>Feature</td><td>FUSE [Dependency injection](http://www.redbeanphp.com/dependency_injection "Learn about DI")</td></tr>
<tr><td>Feature</td><td>Support for BIG INT primary keys</td></tr>
<tr><td>Feature</td><td>Added R::taggedAll($type,$taglist) to find all beans having all tags in $taglist</td></tr>
<tr><td>Feature</td><td>Added DuplicationManager and TagManager, no API changes</td></tr>
<tr><td>Feature</td><td>Adapter now has clear error reporting</td></tr>
<tr><td>Feature</td><td>Input validation R::related</td></tr>
<tr><td>Feature</td><td>Store() and Trash() now also accept models</td></tr>
<tr><td>Fix</td><td>Dup() no longer taints the bean</td></tr>
<tr><td>Fix</td><td>reset capture mode in SQLHelper</td></tr>
<tr><td>Fix</td><td>Refactored OODB to improve testability</td></tr>
<tr><td>Fix</td><td>R::close() now resets connection flag properly</td></tr>
</tbody>
</table>

2011-10-01 - RedBeanPHP 3.1:

<table>
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Feature</td><td>R::storeAll($beans)</td></tr>
<tr><td>Feature</td><td>R::trashAll($beans)</td></tr>
<tr><td>Feature</td><td>Support for Postgres datetime</td></tr>
<tr><td>Feature</td><td>R::close() - closes database connection</td></tr>
<tr><td>Feature</td><td>Model_Formatter getModelName($model,$bean) now gets a bean</td></tr>
<tr><td>Feature</td><td>R::dispenseLabels($list)</td></tr>
<tr><td>Feature</td><td>R::gatherLabels($beans)</td></tr>
</tbody>
</table>

RedBeanPHP 3.0.4:

<table>
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Fix</td><td>Fixed issue in R::dup() Nullifying Ids after preloaded lists</td></tr>
</tbody>
</table>

RedBeanPHP 3.0.3:

<table>
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Fix</td><td>Fixed issue in R::dependencies()</td></tr>
</tbody>
</table>

RedBeanPHP 3.0.2:

<table >
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Feature</td><td>R::dependencies(...)</td></tr>
</tbody>
</table>

RedBeanPHP 3.0.1:

<table>
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Fix</td><td>Fixed issue in R::dup()</td></tr>
</tbody>
</table>

RedBeanPHP 3.0:

<table >
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Feature</td><td>Support for [special, DB specific data types](/special_types) like DATE, DATETIME and SPATIAL types</td></tr>
<tr><td>Feature</td><td>[Mix](/mixing_sql_and_php) SQL with PHP</td></tr>
<tr><td>Feature</td><td>New Test Architecture</td></tr>
<tr><td>Feature</td><td>Find() works with PostgreSQL without the need for first argument as WHERE</td></tr>
<tr><td>Feature</td><td>R::graph($requestArray) - directly from facade</td></tr>
<tr><td>Feature</td><td>A little REST support in BeanCan Server (more will follow)</td></tr>
<tr><td>Feature</td><td>R::dup() - replaces copy, makes a deep copy of a bean, properly and without storing.</td></tr>
<tr><td>Feature</td><td>new R::exportAll, exports all own-list, automatic recursion protection</td></tr>
<tr><td>Feature</td><td>relaxed interface model formatter</td></tr>
<tr><td>Feature</td><td>you can now unset parent objects using $bean->parent = null/false</td></tr>
<tr><td>Feature</td><td>R::graph() has 2nd parameter to filter empty beans</td></tr>
<tr><td>Feature</td><td>$bean->isEmpty(), returns TRUE if all the properties are empty</td></tr>
<tr><td>Feature</td><td>R::graph() now throws exceptions in case of unexpected structure</td></tr>
<tr><td>Fix</td><td>FALSE is stored as 0 in SQLite now</td></tr>
<tr><td>Fix</td><td>Unrelated no longer triggers error when there are no associations at all</td></tr>
<tr><td>Fix</td><td>R::findOne now returns NULL instead of FALSE - seems more appropriate</td></tr>
<tr><td>Fix</td><td>Removed 3rd param in Exception to avoid issues with PHP 5.2 and earlier</td></tr>
<tr><td>Removed</td><td>Optimizers</td></tr>
<tr><td>Removed</td><td>Old cooker (now in plus-pack)</td></tr>
<tr><td>Removed</td><td>R::setupMultiple() - use R::addDatabase() instead</td></tr>
<tr><td>Removed</td><td>R::relatedOne() - use R::related() instead</td></tr>
<tr><td>Removed</td><td>Facade Helper - never going to work: features for OO purists</td></tr>
<tr><td>Removed</td><td>Legacy Tag API - the explode() hell</td></tr>
<tr><td>Removed</td><td>R::copy</td></tr>
<tr><td>Removed</td><td>By default Bean Exporter plugin no longer loaded, not in all-in-one</td></tr>
<tr><td>Removed</td><td>**Bean Formatter** you can NO LONGER customize database schema (because it breaks things)</td></tr>
<tr><td>Removed</td><td>**R::view()**</td></tr>
</tbody>
</table>

RedBeanPHP 2.2.3:

<table >
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Fix</td><td>Fixed issue [FUSE models dont process nested beans](https://github.com/gabordemooij/redbean/issues/106 "issue 103")</td></tr>
<tr><td>Fix</td><td>Added data type LONG TEXT for MySQL</td>
</tbody>
</table>

RedBeanPHP 2.2.2:

<table >
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Feature</td><td>R::$adapter->getAffectedRows() [now also works with get()](https://github.com/gabordemooij/redbean/issues/104 "issue 104")</td></tr>
<tr><td>Fix</td><td>Fixed incompatibility issue [lcfirst](https://github.com/gabordemooij/redbean/issues/103 "issue 103") for PHP 5.2</td></tr>
</tbody>
</table>

RedBeanPHP 2.2.1:

<table >
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Fix</td><td>Fixed minor issue with indirect modification of nested beans. (issue #100)</td></tr>
</tbody>
</table>

RedBeanPHP 2.2:

<table>
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Feature</td><td>Added R::nuke() - nukes entire database</td></tr>
<tr><td>Feature</td><td>Added R::prefix('cms_') - installs table prefix in one command</td></tr>
<tr><td>Fix</td><td>Cleaned whitespaces</td></tr>
<tr><td>Fix</td><td>Removed some old unused code</td></tr>
<tr><td>Fix</td><td>Fixed uppercase issue in PostgreSQL View Driver</td></tr>
<tr><td>Fix</td><td>Fixed issue in old 1.3 style Cooker concerning 0-values (empty-check)</td></tr>
<tr><td>Fix</td><td>Fixed explicit aliasing issue for old SQLite versions (midnightmonster/patch-1)</td></tr>
</tbody>
</table>

RedBeanPHP 2.1.1 contains a 'change of mind'. Changed default action of foreign keys from NO ACTION to SET NULL. This has the following
advantages:

1. People not interested in FKs will not be bothered by intigrity violations.

2. People interested in FKs have the opportunity to configure them at one moment; the right moment: when leaving fluid mode.

3. Development scenarios and cleaning actions don't interfere with foreign keys.

4. Uncommon scenarios will not clash with foreign keys as well (these are likely in fluid mode, import scripts, tests etc).

RedBeanPHP 2.1 is a minor release and contains some new features as well as some bugfixes. Here is a list. Note that
this release IS backwards compatible with RedBeanPHP 2.

<table >
<thead><tr><th>Type of Change</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Feature</td><td>Added R::genSlots($arr) - generates slots for array</td></tr>
<tr><td>Feature</td><td>Added $bean-&gt;exportToObj( $obj ) - will add the bean properties to $obj</td></tr>
<tr><td>Feature</td><td>Added R::exportAllToObj( $beans, $classname ) - will add the bean properties to instances of $classname</td></tr>
<tr><td>Feature</td><td>Added R::exportAll($beans,TRUE); - will export beans recursive (for use with EXTJS for instance)</td></tr>
<tr><td>Feature</td><td>Added RedBean_Exporter class, for more control over recursive exports</td></tr>
<tr><td>Feature</td><td>Added R::addTags() - adds tags without removing the old ones (thanks to Palicao)</td></tr>
<tr><td>Fix</td><td>Fixed an issue in SQLite that prevented columns in tables with custom ID fields to be widened</td></tr>
<tr><td>Fix</td><td>Removed triggers from SQLite, now uses foreign key constraints</td></tr>
<tr><td>Fix</td><td>Foreign key constraints will now be created correctly for tables with multiple keys as well</td></tr>
<tr><td>Fix</td><td>Fixed an issue that prevented the use of camelCase in own- and shared- properties (still not recommended, bad practice)</td></tr>
<tr><td>Fix</td><td>Fixed some issues in documentation</td></tr>
<tr><td>Fix</td><td>Fixed an issue concerning own/shared property and trash/delete hook (#90)</td></tr>
</tbody>
</table>

## New in 2.0

**RedBeanPHP 2.0** makes <abbr title="Object Relational Mapping">ORM</abbr> even easier and more fun! RedBeanPHP 2.0 has been released on
August 1 and contains the following improvements:

<table>
<tr><td>Support for [N:1 relations](/nested_bean "nested beans")</td></tr>
<tr><td>On-the-fly [Views](/views "views")</td></tr>
<tr><td>Improved [Tag](/tags "tags") API</td></tr>
<tr><td>Automatic constraints to keep link tables clean</td></tr>
<tr><td>Automatic foreign key generation</td></tr>
<tr><td>New and improved Form Cooker</td></tr>
<tr><td>Bean2JSON when casting a bean to a string</td></tr>
<tr><td>New flexbible architecture</td></tr>
<tr><td>Clean up (less than 100KB now!)</td></tr>
<tr><td>Many other improvments, bugfixes and tests&hellip;</td></tr>
</table>

For actual information about the **latest** beta testing for RedBeanPHP ORM for PHP, consult the
[beta testing page](/beta_testing "Help us test the new beta version of RedBeanPHP ORM for PHP").

For details concerning **versioning** guidelines of RedBeanPHP take a look at the
[versioning page](/versioning "Learn more about RedBeanPHP versioning").

Where is RedBeanPHP **heading**? Take a look into the crystal ball, peek into the future on the
[RedBeanPHP roadmap](/roadmap "Upcoming features in the object relational mapper").
