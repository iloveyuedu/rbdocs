# Welcome

RedBeanPHP is a **lightweight**, **configuration-less**
<abbr title="Object Relational Mapper">ORM</abbr> library for PHP.
Let's look at the code, this is how you do
<abbr style="font-weight:bold;" title="Create Retrieve Update and Delete">CRUD</abbr> in RedBeanPHP:

```php
$post = R::dispense('post');
$post->text = 'Hello World';

$id = R::store($post);       //Create or Update
$post = R::load('post',$id); //Retrieve
R::trash($post);             //Delete
```

This code creates, stores, loads and deletes a single post object.
This code will run without any prior configuration.
RedBeanPHP **automatically generates** the database, tables and columns **on-the-fly**.
RedBeanPHP infers relations based on naming conventions.

## News

<time>2013-09-13</time>: It's Friday the 13th, let's test some beans! [RedBeanPHP 3.5 beta 6](/beta_testing "RedBeanPHP 3.5 Beta 6") is out!

<time>2013-09-10</time>: [RedBeanPHP 3.5 Beta 5](/beta_testing "RedBeanPHP 3.5 Beta 5") has been released!

<time>2013-09-07</time>: [RedBeanPHP 3.5 Beta 4](/beta_testing "RedBeanPHP 3.5 Beta 4") has been released!

<time>2013-09-04</time>: [RedBeanPHP 3.5 Beta 3](/beta_testing "RedBeanPHP 3.5 Beta 3") has been released!

<time>2013-09-03</time>: [RedBeanPHP 3.5 Beta 2](/beta_testing "RedBeanPHP 3.5 Beta 2") has been released!

<time>2013-08-31</time>: [RedBeanPHP 3.5 Beta 1](/beta_testing "RedBeanPHP 3.5 Beta 1") has been released!

<time>2013-08-17</time>: [RedBeanPHP 3.5 Alpha 7](/beta_testing "RedBeanPHP 3.5 Alpha 7") has been released!

<time>2013-08-15</time>: [RedBeanPHP 3.5 Alpha 6](/beta_testing "RedBeanPHP 3.5 Alpha 6") has been released!

<time>2013-08-13</time>: [RedBeanPHP 3.5 Alpha 4](/beta_testing "RedBeanPHP 3.5 Alpha 4") has been released!

<time>2013-07-25</time>: [Alpha release](/beta_testing "RedBeanPHP 3.5 Alpha 1") of RedBeanPHP 3.5!

## Why RedBeanPHP

RedBeanPHP is a simple, easy-to-use, on-the-fly object mapper, especially suited for
<abbr title="Rapid Application Development - in other words, insane deadlines">RAD</abbr>,
prototyping and people
with deadlines. RedBeanPHP creates tables, columns, constraints and indexes automatically
so you don't have to switch between your database client (phpMyAdmin) and your
editor all the time (this does not mean you will never have to use phpMyAdmin or SQL though, read on... ).
Also you don't have to write configuration files because RedBeanPHP
simply infers the database schema from naming conventions. Because RedBeanPHP saves a lot of
time you can spend more time developing the rest of the application.

## No Configuration

Most ORMs use configuration files (XML, INI or YAML) or some sort of annotation system
to define mappings. These systems force you to map records to objects upfront. RedBeanPHP is different.
Instead of using
configuration it uses conventions; a very small set of rules. RedBeanPHP uses these conventions
to infer relationships and to automate mappings. RedBeanPHP also helps you to follow these
conventions by automatically building the initial tables and columns for you - which also saves
a lot of time. This means there is no configuration, less boilerplate code and more time left
to focus on the business logic, testing and documentation, thus boosting development productivity and
code quality.

## A bridge between objects and records

<abbr title="SQL (structured query language) is the most common query language for most relational database systems.">SQL</abbr>
is a powerful query language for relational databases. Most ORMs act like a wall,
hiding SQL from you. RedBeanPHP on the other hand tries
to integrate both technologies, thus acting more like a bridge.
For instance, RedBeanPHP allows you to embed SQL snippets in ORM methods to tune
the retrieval of related beans from the database. RedBeanPHP seeks to strike a balance
between object oriented programming and relational database querying.

## Code Quality

RedBeanPHP has been carefully architected to be concise and maintainable.
The core codebase is tested daily using about 20.000 unit tests (100% test coverage)
on local servers and a
<abbr title="Travis CI is the continous integration solution used for RedBeanPHP.">Travis CI</abbr>
environment. The codebase contains a lot of inline documentation, is fully object oriented and
improves security by promoting PDO based prepared statements and parameter binding.

## Quick Tutorial

Try the 5-minute guide to RedBeanPHP to get started quickly.
Learn to use basic RedBeanPHP ORM in just [about 5 minutes](/quick_tour "Learn RedBeanPHP in 5 minutes").
Otherwise, if you're not in a hurry
but you just want to get started and learn the basic concepts I recommend to start with
[Create a Bean](/create_a_bean "Basic RedBeanPHP") (see navigation block on the left) and work your
way through the manual from there. I have tried to put the most important (read: basic) topics on top of the list.

## One-File Download

RedBeanPHP has been compiled into one single file for easy installation. No paths, no auto-loaders,
no configurations, just download the all-in-one package and require the single **rb.php** file
in your code.

[DOWNLOAD Latest RedBeanPHP (Version 3.4.7)](/downloadredbean.php "Get RedBeanPHP").

## Enterprise Support

RedBeanPHP commercial support is provided by [Organic Software](http://www.organicsoftware.nl/index_en.html "Organic Software").

_RedBeanPHP is used by:_

![Logos of companies using RedBeanPHP for ORM.](/img/logos3.png)
