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
