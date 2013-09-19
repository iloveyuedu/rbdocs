<category>Project</category>

# FAQ

## Why do you use so much static functions? What about coupling?

That's only the Facade. Behind the facade you will find a
landscape of elegant classes, see the
[API](/api "API documentation")
for advanced usage/more information.
The **API** closely resembles the interface
of the facade class.

## Is it wrong to use the static facade functions?

If you're not planning to swap frameworks regularly you can rely on
the easy-to-use static facade functions like **R::dispense()** and
**R::load()** etc. People often complain about static methods but in
reality many of those so-called pure **OOP** style projects
tend to become heaps of powerless miniature objects
and countless wirings. I don't believe that works very well.

## Why does RedBeanPHP not protect me from race conditions?

Because I believe the best way to prevent race conditions
is to use database **transactions**. RedBeanPHP offers simple
functions to use transactions: R::begin(), R::commit() and
R::rollback(). All you need to do is bundle your related queries
together in a transaction by wrapping them in a begin-commit block.
Not familiar with transactions yet?
Read about [Transactions on Wikipedia](http://en.wikipedia.org/wiki/Database_transaction) or
[
read this discussion on StackOverflow](http://stackoverflow.com/questions/2808794/does-a-transaction-stop-all-race-condition-problems-in-mysql "ACID").

## Why is RedBeanPHP one file? Isn't that bad practice?

RedBeanPHP is distributed as one file to ease
installation and deployment. The build script called **Replica** compiles
the RedBeanPHP class files to one file.
So in reality, RedBeanPHP is not one file, read more
about [Replica](/replica "Read more about building your own RedBeanPHP!").

## How active is RedBeanPHP?

RedBeanPHP is being developed quite actively by me and
the RedBeanPHP community.

## Why don't you implement my feature request?

Depends. RedBeanPHP is being developed in a very careful way.
I try to keep RedBeanPHP clean yet comfortable. It's tempting to
implement lots of features but that would make RedBeanPHP bloated.
Feel free to write your own plugin or fork the project.

## Is RedBeanPHP Lightweight?

You can use Replica to strip all modules and plugins you don't need.
The default distribution is not bloated but you can compile
a lighter RedBeanPHP by using the Replica build tool.

## Why does RedBeanPHP not support custom table mapping (anymore)?

The idea of RedBeanPHP is to generate a useable and queryable
schema based on your code and without any configuration.
Custom table mappings don't fit very well in this model.
However there are other reasons as well. Many so called
power features like deep-copy have to make assumptions about database
layout and table naming conventions. They can of course use
some kind of configuration file to figure things out, but hey the whole
idea of RedBeanPHP was **NOT** to use configuration!

## Why does RedBeanPHP not provide a portable query language?

I do not believe in portable query languages or database independent query
builders. The whole point of selecting a database is to
choose the system that provides the most useful features.
A portable query language by definition can't use
database specific features, so you simply get the worst of all.
Just dare to choose your the database system that fits the best for the
task at hand.

## Why are underscores and uppercase chars not allowed in type and property names?

Underscores ARE allowed in property names, just not in type names.
RedBeanPHP uses underscores to denote relationships among beans.
Uppercase characters cause problems on different operating system platforms.
These characters have one further disadvantage; because programmers like me are
often lazy, they get overused to form ambiguous words. The English vocabulary
is quite big and you should better be creative and find the best word for
the concept your bean or model describes. For instance; instead of
&quot;user_project&quot; or &quot;ProjectUsr&quot; you can use &quot;participant&quot;. This makes your
database prettier and easier to read as well.

Note that RedBeanPHP 3.4+ supports so-called beautiful column names, this will turn camelCased column names in underscored_column_names.
You can turn this feature off as well. For more information please consult the RedBeanPHP documentation on how [to create
and store beans](/create_a_bean "Read about creating and storing new bean objects.").

# Roadmap

RedBeanPHP is actively developed by a community of open source
developers. The development cyclus of RedBeanPHP consists of two releases
a year; a spring release and an autumn release. This means every six
months there will be a new version of RedBeanPHP.

*   Spring Beta release: **March**
*   Spring Final release: **April**
*   Autumn Beta release: **September**
*   Autumn Final release: **October**

For actual information about the upcoming (beta) release visit the
[beta
testing pages](/beta_testing "Help us test the latest beta release!").

## Upcoming versions

RedBeanPHP is quite mature and stable. All features necessary have been implemented and even
more features are implemented using the plugin architecture - however we don't want RedBeanPHP
to become bloated. For the next version of RedBeanPHP we are considering features like
improved support of Composer and namespaces. Feel free to discuss feature requests on our
[forum](https://groups.google.com/forum/?fromgroups#!forum/redbeanorm "Discuss the future of RedBeanPHP!").

For details concerning **versioning** guidelines of RedBeanPHP take a look at the
[versioning page](/versioning "Learn more about RedBeanPHP versioning").

# Versioning

RedBeanPHP uses a very sane version numbering system. The version number tells you something about the version; it has meaning.
All RedBeanPHP versions have a version number. The version number consists of three parts; major, minor and point release.

<kbd>
Version X.X.X
</kbd>

Meaning:

<kbd>
Version MAJOR.MINOR.POINT
</kbd>

## Major version

When the major version number increases, this means the new version is **NOT** backward compatible with
all previous versions. Most of the time this means you better not use it in your current project if you are already
using RedBeanPHP or you might have to make some changes to the project to make it work with the new version of RedBeanPHP.
This is not always as bad as it sounds. For instance version 3 is not backward compatible with version 2, but only if you use
the optimizers (which by default are turned off). So while this is a major version bump it's actually not that bad.
However, while difference between 2 and 3 is relatively small, the gap between 1 and 2 was a really big one. Anyway
whenever the major version number changes make sure you check the [changelog](/changelog "Check the changelog after a release.") to determine whether you can upgrade or not.

## Minor version

A minor version change means new **features**! Minor versions don't break backward compatibiltity, they just mean new features
have been added. Often, this goes hand in hand with changes in documentation or **bugfixes**. Therefore it's relatively
**safe**
to do a minor upgrade. Be sure though to check the changelog on the website. You might be able to take
advantage of the new features!

## Point version

A point version or point release happens when the last digit has been increased. Note that although you might assume
a digit normally varies from 0-9, you might encounter minor and point releases like X.X.12 or X.30.X. Not sure if this will
happen, however as RedBeanPHP matures you will see less major upgrades and more minor upgrades and point releases.
A point release version is normally a maintenance version. This may include bugfixes, new tests, documentation changes or
just some code cleanup. While it's always a good idea to scan the changelog most of the time you can be pretty sure
there are no compatibility issues nor interesting new feature. Of course if you have reported an issue the point release can
be quite interesting because the bug might have been fixed. In this case, the Github bug report number and the fix will
be mentioned in the changelog.

Where is RedBeanPHP **heading**? Take a look into the crystal ball, peek into the future on the
[RedBeanPHP roadmap](/roadmap "Upcoming features in the object relational mapper").

For actual information about the **latest** beta testing for RedBeanPHP ORM for PHP, consult the
[beta testing page](/beta_testing "Help us test the new beta version of RedBeanPHP ORM for PHP").

# Beta Testing

Welcome to the **Beta Testing** section of the RedBeanPHP ORM site.
Help us test the latest beta version of RedBeanPHP.
We need your help to deliver the best **ORM** tool ever!
Without your feedback it is very difficult to create a high quality product.
Join the community, let us know what you think about **RedBeanPHP** **ORM**
for **PHP** and how
it can be improved. You can provide feedback using the _comments system_ on this website
or using the
[forum](https://groups.google.com/forum/?fromgroups#!forum/redbeanorm "Forum"), or the
[Github repository issue tracker](https://github.com/gabordemooij/redbean/issues?direction=desc&sort=created&state=open "Issue tracker on Github").

RedBeanPHP 3.5 Beta 6 is here!
Download
[RedBeanPHP 3.5 Beta 6](downloads/RedBeanPHP3_5beta6.tar.gz "Download the latest beta").
and start testing the new RedBeanPHP !

## Changes in RedBeanPHP 3.5

*   DONE - added [R::inspect()](/schema "Inspect method") replaces ugly R::$writer-&gt;methods().
*   DONE - [R::beansToArray](/import_and_export#toarray "Turn a list of beans into an array")
*   DONE - Refactored glueSQLCondition method, added tests
*   DONE - Improved support for named parameters
*   DONE - Graph() now hardcoded in facade, no need for replica (easy for Composer)
*   DONE - TimeLine log() now hardcoded in facade, no need for replica (easy for Composer)
*   DONE - Removed sync() and R::unrelated()
*   DONE - Automatically switches to utf8mb4 if MySQL/MariaDB version higher &gt;= 5.5
*   DONE - [ENUMs](/enums_and_more "Learn about RedBeanPHP ENUM")
*   DONE - [Tree traversal](/trees#traversal "Searching trees with RedBeanPHP!")
*   DONE - Filter shared items by [link conditions](/shared_lists#linkfilters "Use withCondition() to filter by linking criteria")
*   DONE - [Via()](/shared_lists#via "Read more about Via method") - alias for R::renameAssociation
*   DONE - [Count related beans using countOwn and countShared](/counting_beans "Learn how to use countOwn and countShared")
*   DONE - [Model Formatter](/how_fuse_works#nsmodel "Namespaced models") support PHP namespaces out-of-the-box
*   DONE - READ SUPPORT for UUIDS (primary key no longer cast to integer)
*   DONE - [White list](/beancan_server#whitelist "Protect your API with the whitelist") for BeanCan Server
*   DONE - [BeanCan Server 2](/rest_server "Learn about the new REST-like BeanCan Server"): REST-like routes
*   DONE - Improve performance sharedList
*   DONE - Improve query readability
*   DONE - Improve notation Preloader, use 'ownPage|page' instead of 'ownPage'=&gt;'page'
<li>DONE - [Cheatsheet / relational matrix](/cheatsheet "Cheatsheet for relational mapping")

For details concerning **versioning** guidelines of RedBeanPHP take a look at the
[versioning page](/versioning "Learn more about RedBeanPHP versioning").

Where is RedBeanPHP **heading**? Take a look into the crystal ball, peek into the future on the
[RedBeanPHP roadmap](/roadmap "Upcoming features in the object relational mapper").

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

# Upgrade 3.3 to 3.4

Welcome to the RedBeanPHP ORM upgrade guide for upgrading from version 3.3 to version 3.4.
RedBeanPHP 3.4 is a minor release, this means that it's almost backward compatible with previous
releases in the 3-series. However even in a minor release there might be minor incompatibilities
because the product has to move forward. This chapter describes the minor backward compatibilities
and how to deal with them.

## No more escaping

RedBeanPHP 3.4 no longer has an $adapter-&gt;escape() / $database-&gt;Escape() method.
RedBeanPHP has always offered parameter binding and parameter binding has always been the
preferred way to write queries. The escape methods therefore have been confusing and
might lead to SQL injection because people don't know how to use them. Parameter binding
is much more safe and this is why I have decided to remove the escape() methods completely.
If you have code that relies on the escape() methods please rewrite this code to use
parameter binding, it makes your code safer and more consistent. If you insist on using
escaping instead of parameter binding you can still use the underlying PDO instance for this:
[R::$adapter->getDatabase->getPDO()->quote();](http://php.net/manual/en/pdo.quote.php "PDO quote() documentation").

## TimeLine and Sync

RedBeanPHP has grown a little fat. Therefore I removed two plugins from the main distribution; namely
TimeLine and Sync. Since they are only useful to some people I figured they can just as well remain on
github. You can compile them into rb.php yourself using
[Replica](http://www.redbeanphp.com/replica "read more about Replica") the RedBeanPHP build tool.

## Extra Cooker flag

The Cooker (R::graph()) - a tool in RedBeanPHP to quickly turn entire array hierarchies in bean hierarchies and
store them in the database will now throw an exception if you want to load a bean (by providing an id). You can turn this
off using: RedBean_Plugin_Cooker::enableBeanLoading(true);

## Uppercase characters

Formally RedBeanPHP never allowed the use of uppercase chars in properties. However this was always easy to
circumvent if you knew how. In RedBeanPHP 3.4 uppercase characters will be used to generate 'beautiful' column names.
For instance, a property called 'singleMalt' will result in a column single_malt. The reason why RedBeanPHP never
allowed uppercase chars (and still does not allow) is because this tends to cause inter-operating system issues as
well as fundamental cross database issues (some OSes and database engines are case sensitive while others are not).
However like I said the restriction was easy to circumvent if you studied the API carefully. In RedBeanPHP 3.4
You'll have to turn off the beautifier to use circumvent the restriction using: RedBean_OODBBean::setFlagBeautifulColumnNames(false);
Of course, I still recommend not to do this. Instead I hope you enjoy the beautiful underscore-columns, generated by the
'beautifier'.

## No more SET(1) in MySQL

From now on RedBeanPHP will use **BOOLEAN** (TINYINT 1) as the default column for boolean values instead of
**SET(1)**. This has been done to make the behaviour across database platforms more consistent. Also
SET(1) columns have some issues regarding **NULL** because they either represent 1 or NULL (or empty)
while **TINYINT(1)** can
respresent **NULL**, **TRUE (1)** and **FALSE (0)**. Unfortunately none of the database platforms has a good boolean column type
(actually Postgres has a real boolean value but it's too strict and required a cast for every comparison).
Therefore I feel TINYINT or INTEGERS are the best way to represent booleans given the current state of database
platforms.

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

# License

## New BSD License

Copyright &copy; 2009-<?php echo date('Y');?> Gabor de Mooij and the RedBeanPHP community
All rights reserved.

Redistribution and use in source and binary forms are permitted
provided that the above copyright notice and this paragraph are
duplicated in all such forms and that any documentation,
advertising materials, and other materials related to such
distribution and use acknowledge that the software was developed
by the RedBeanPHP Community.  The name of the
University may not be used to endorse or promote products derived
from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED ``AS IS'' AND WITHOUT ANY EXPRESS OR
IMPLIED WARRANTIES, INCLUDING, WITHOUT LIMITATION, THE IMPLIED
WARRANTIES OF MERCHANTIBILITY AND FITNESS FOR A PARTICULAR PURPOSE.

## Disclaimer

THIS SOFTWARE IS PROVIDED BY Gabor de Mooij ''AS IS'' AND ANY
EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL Gabor de Mooij BE LIABLE FOR ANY
DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
