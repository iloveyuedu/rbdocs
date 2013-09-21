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
