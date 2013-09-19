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
