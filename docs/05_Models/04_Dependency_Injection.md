# Dependency Injection

RedBeanPHP **3.2** and higher supports [Dependency Injection](http://martinfowler.com/articles/injection.html "What is DI?").
Dependency Injection is a way to keep your models free from dependencies, reducing [coupling](http://en.wikipedia.org/wiki/Loose_coupling "Loose Coupling").
Here is how DI works in RedBeanPHP:

```php
//Dependencies
class Dependency_Coffee {}
class Dependency_Cocoa {}

//The model that needs these things
class Model_Geek extends RedBean_SimpleModel {
private $cocoa;
private $coffee;
public function setCoffee(Dependency_Coffee $coffee) {
	$this->coffee = $coffee;
}
public function setCocoa(Dependency_Cocoa $cocoa) {
	$this->cocoa = $cocoa;
}
public function getCoffee() {
	return $this->coffee;
}
..same for cocoa..
}
```

First, we need to tell RedBeanPHP we would like to use DI. RedBeanPHP ships with a very
decent injector which can be extended
 if necessary:

```php
$di = new RedBean_DependencyInjector;
RedBean_ModelHelper::setDependencyInjector( $di );
```

Now, add the services to your injector:

```php
$di->addDependency('Coffee',new Dependency_Coffee);
$di->addDependency('Cocoa',new Dependency_Cocoa);
```

That's all. Let's get our caffeinated geek!

```php
$geek = R::dispense('geek');
$coffee = $geek->getCoffee(); //returns the coffee
```

This is how dependency injection in RedBeanPHP 3.2 and higher works. If you need even more
flexibility you can override the getModelForBean( $bean ) method in the Bean Helper, this method
returns the model for the bean. Here you can bootstrap your own dependency injector. In this method
you can call RedBean_ModelHelper::factory($modelName) to obtain a model (and it's dependencies).
