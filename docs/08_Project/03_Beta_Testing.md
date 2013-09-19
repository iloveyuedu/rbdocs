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
