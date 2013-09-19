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
