<category>Models</category>

# Models and FUSE

A **model** is a place to put validation and business logic.
Although you can put validations in your controller that would require you to
copy-and-paste it whenever you need it. So putting validation and business logic
into a central place saves you a lot of work. Models are connected to beans
using **FUSE**. The best thing about FUSE is that you don't have to write any
code to connect a bean to a model. FUSE will make sure every bean finds its model
automatically.

Imagine a Jazz band that accepts just 4 members, in this case
we need to add a validation rule 'no more than 4 band members'.
We could add this rule to the controller:

```php
if (count($_post['bandmembers'] > 4) ...
```

But like I said, we need to copy this code to every controller
that deals with band members.
Now let's define a
band model to see how this works with FUSE:

```php
class Model_Band extends RedBean_SimpleModel {
	public function update() {
		if (count($this->ownBandmember)>4) {
			throw new Exception('too many!');
		}
	}
}
```

This model contains an **update()** method. FUSE makes sure that the update() method will get invoked
as soon as we try to store the bean:

```php
$band = R::dispense('band');
$musicians = R::dispense('bandmember',5);
$band->ownBandmember = $musicians;
R::store($band);
```

This code will trigger an exception because it tries to add too many band members to the band.
As you can see, the model is automatically connected to the bean; we store the bean using R::store() and
update() is called on a populated instance of Model_Band. Just like update there are several other hooks:

If you use PHP namespaces and your model resides in namespace \Models simply add the following constant
on top of your code:

define( 'REDBEAN_MODEL_PREFIX', '\\Models\\' );

(supported since 3.5)

<table>
	<thead><tr><th>Action on bean</th><th>Invokes method on Model</th></tr></thead>
	<tbody>
		<tr><td>R::store</td><td>$model-&gt;update()</td></tr>
		<tr><td>R::store</td><td>$model-&gt;after_update()</td></tr>
		<tr><td>R::load</td><td>$model-&gt;open()</td></tr>
		<tr><td>R::trash</td><td>$model-&gt;delete()</td></tr>
		<tr><td>R::trash</td><td>$model-&gt;after_delete()</td></tr>
		<tr><td>R::dispense</td><td>$model-&gt;dispense()</td></tr>
	</tbody>
</table>

To demonstrate the order and use of all of these methods let's consider
an example:

```php
$lifeCycle = '';
class Model_Bandmember extends RedBean_SimpleModel {
	public function open() {
	   global $lifeCycle;
	   $lifeCycle .= \"called open: \".$this->id;
	}
	public function dispense(){
		global $lifeCycle;
		$lifeCycle .= \"called dispense() \".$this->bean;
	}
	public function update() {
		global $lifeCycle;
		$lifeCycle .= \"called update() \".$this->bean;
	}
	public function after_update(){
		global $lifeCycle;
		$lifeCycle .= \"called after_update() \".$this->bean;
	}
	public function delete() {
		global $lifeCycle;
		$lifeCycle .= \"called delete() \".$this->bean;
	}
	public function after_delete() {
		global $lifeCycle;
		$lifeCycle .= \"called after_delete() \".$this->bean;
	}
}
$bandmember = R::dispense('bandmember');
$bandmember->name = 'Fatz Waller';
$id = R::store($bandmember);
$bandmember = R::load('bandmember',$id);
R::trash($bandmember);
echo $lifeCycle;
```

output:

```php
called dispense() {\"id\":0}
called update() {\"id\":0,\"name\":\"Fatz Waller\"}
called after_update() {\"id\":5,\"name\":\"Fatz Waller\"}
called dispense() {\"id\":0}
called open: 5
called delete() {\"id\":\"5\",\"band_id\":null,\"name\":\"Fatz Waller\"}
called after_delete() {\"id\":0,\"band_id\":null,\"name\":\"Fatz Waller\"}
```

## $this

In the model, $this is bound to the bean. As is $this-&gt;bean.

## Boxing

RedBeanPHP **3.2** offers $bean->box and $model->unbox() to easily switch between models and beans.
For instance if you have a bean $band, to box it use: $modelBand = $band->box(); This also works the other way
around; if you have a model $band and you want to obtain the bean, use $bean = $band->unbox();

## Using namespaces

If you use PHP native namespaces you can adjust the model mapping to load
your models from the
[desired namespace](/how_fuse_works#namespaces "Learn more about using RedBeanPHP ORM models with PHP namespaces").

# How Fuse Works

Fuse adds an event listener (Observer pattern) to the RedBeanPHP object database.
If an event occurs it creates an instance of the model that belongs to the bean.
It looks for a class with the name Model_**X** where **X** is the type of the bean.
If such a model exists, it creates an instance of that model and calls loadBean(), passing the bean.
This will copy the bean to the internal bean property of the model (defined by the superclass [SimpleModel]).
All bean properties will become accessible to $this because FUSE relies on magic getters and setters.

![](img/fuse.jpeg)

## Remapping models

By default RedBeanPHP maps a bean to a model using the Model_**X** convention where **X** gets replaced by the
**type** of the bean. You can also provide your own mapper, here is how:

<?php
echo code("
$formatter = new MyModelFormatter;
RedBean_ModelHelper::setModelFormatter($formatter);
```

Here we tell RedBeanPHP to use the MyModelFormatter class to find the correct bean-to-model mapping.
This class looks like this:

<?php
echo code("
class MyModelFormatter implements RedBean_IModelFormatter {
	public function formatModel($model) {
		return $model.'_Object';
	}
}
```

This class will make sure that a bean of type 'coffee' will be mapped to Coffee_Object instead of Model_Coffee.

## Namespaces

RedBeanPHP uses Poor man's namespacing, not the PHP backslash namespaces.
However if you want to use models in a PHP backslash namespace you can remap the Model Formatter
like this:

```php
class MyModelFormatter implements RedBean_IModelFormatter {
		public function formatModel($model) {
				return '\\\'.'Models'.'\\\'.$model;
		}
}
$formatter = new MyModelFormatter;
RedBean_ModelHelper::setModelFormatter($formatter);

```

This example will load Models from the Models namespace.

In RedBeanPHP 3.5 the space.php script will append this code (NSModelFormatter)
for you to the namespaced file.

In formatModel() use func_get_arg(1) to obtain the bean as well. (since RedBeanPHP 3.1)

## Setting the bean in a Model

Sometimes you want FUSE to work the other way around. You call a **static method** on a model
and you want to set a bean in the model manually.
To accomplish this set the reference to the model as a meta property:

```php
$this->bean = R::dispense('bean');
$this->bean->setMeta('model',$this);
```

Now, the bean will be connected to the current Model instance.

## $this

In the model, $this-&gt;bean refers to the bean. You can access the real bean using $this->bean from inside a model.
If a property does not exist $this-&gt;$property will return a the property, but it will not return a reference to lists
so I recommend to always use $this-&gt;bean-&gt;$property if you want to access $property of the bean in your model.

# Fuse Custom Method

FUSE does not only support hooks like [update() and delete()](/models_and_fuse "Learn how to use Models and FUSE"). You can also call
a **non-existent** method on a bean and it will fire the corresponding method on the model.

```php
class Model_Dog extends RedBean_SimpleModel {
		public function bark() {
				echo 'Whaf!';
		}
}

$dog = R::dispense('dog');
$dog->bark(); //echos 'Whaf!'
```

Learn how you can write Models that automatically connect to be beans using [FUSE](/models_and_fuse "Learn about FUSE").

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
