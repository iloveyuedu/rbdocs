# Installing

To install **RedBeanPHP**, [download the RedBeanPHP All-in-one pack](http://www.redbeanphp.com/downloadredbean.php "All in one pack") from the website.
After unzipping you will see just one file:

<kbd>
rb.php
</kbd>

This file contains everything you need to start RedBeanPHP. Just include it in your
PHP script like this:

```php
require 'rb.php';
```

You are now ready to use RedBeanPHP!

## Installing using composer

You can install
RedBeanPHP using **Composer** if you like. For details please read the
[README file on github](https://github.com/gabordemooij/redbean "Composer").
While installing RedBeanPHP using Composer is possible it's **not** the same as downloading the all-in-one pack.
The all-in-one pack contains a file called rb.php which has been compiled using the Replica Build script.
This means the _R-class_ in the all-in-one pack contains some plugins that are **not** available in
the aliased Facade Class of the composer package.

**I therefore recommend to just download the all-in-one package.**

The all-in-one package has been designed to be **easy to install** and contains a **carefully selected** set of
plugins and writers.

While Composer is an awesome tool I don't think it offers real benefits in our case
because we already have thought out the _distribution process_.

## Installing using a framework

RedBeanPHP is a library and as such it can be integrated in a framework.
There are some really nice frameworks out there that ship with built-in support for RedBeanPHP.
Here is a brief overview of Frameworks that ship with RedBeanPHP:

*   [PrismaPHP](http://prismaphp.org "Visit the PrismaPHP MVC Framework.") Framework
*   [Nibble](http://nibble-development.com/nibble-framework-php-plugin-based-framework/ "Visit the Nibble Framework.") Framework

Besides these frameworks, RedBeanPHP modules are available for various other frameworks like Code Igniter, Kohana, Laravel and Zend Framework.
Please consult your framework provider for more details about these modules.
