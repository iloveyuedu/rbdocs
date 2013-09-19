# Namespacer

I don't like PHP namespaces, they have some issues. This [article](http://pornel.net/phpns/ "PHP namespaces are flawed.") by
'Pornel' explains why. There are several reasons why I don't use namespaces in RedBeanPHP:

*   I want RedBeanPHP to be compatible with PHP 5.2 (and sort of compatible with PHP 5.1)
*   I dont want to bother RedBeanPHP users with namespaces, the one-character R::doSomething() formula is quite powerful
*   While I admire the work of the PHP core development team, I feel choosing the '\' symbol was a mistake, it's like introducing **DOS** in **PHP**

Also, I really like **Poorman's namespacing**. In fact, it does the same job as
namespacing... with **no additional syntax**. I **really** like that. _The less syntax the better_.

## Namespacer Script

For those of you who insist on using namespaces,
I have written a small PHP script
for you to _dynamically_ put RedBeanPHP in a namespace:

[Namespace Script](http://www.redbeanphp.com/downloads/namespace.tar.gz "namespacer").

Usage:

<kbd>
php space.php MyNameSpaceForBeans
</kbd>

The command above will put the entire RedBeanPHP library in the
'MyNameSpaceForBeans' namespace. The namespace script will put the resulting PHP code in a file called:

<kbd>
rbn.php
</kbd>

This filename stands for: **R**ed**B**eanPHP with **Namespaces**.
After running this script and including the freshly generated _rbn.php_ file, you can use
the namespaced RedBeanPHP version:

For instance: **R::store** becomes **\MyNameSpaceForBeans\R::store**.

Happy namespacing... ;)
