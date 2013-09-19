# Aliasing

Normally, a property that contains a bean needs to be **named after it's type**.
We have seen this with parent objects; to access the village a building belongs to, you
just read the

```php
$building->village
```

property.
90% of the time this is _exactly_ what you need.
A parent object can be **aliased** though.

When dealing with people you often have to store persons using a _role name_.
For instance, two people are working on a science project. Both people are in fact
'person' beans. However one of them is a _teacher_ and the other is a _student_.

```php
list($teacher,$student) = R::dispense('person',2);
$project->student = $student;
$project->teacher = $teacher;
```

RedBeanPHP will store both the student and the teacher as persons because
RedBeanPHP simply **ignores** the property name when saving.
RedBeanPHP stores the student and the teacher both as person beans and
the project table will get two fields:
_teacher_id_ and _student_id_ pointing to the respective person records.
However when you
_retrieve_ the project from the **database**, you need to
to tell RedBeanPHP that a student or teacher is in fact a **person**. To do so,
you have to use the **fetchAs()** function:

```php
$teacher = $project->fetchAs('person')->teacher;
```

## Aliased Lists (3.3+)

To get a list of all projects associated with a certain person, in the role
of a student (aliased as student) use:

```php
$person->alias('student')->ownProject;
```

Note that some functions do **not** support
aliased properties; most notably R::dependencies() and R::exportAll().
Also, aliased names are cached, a list won't reload if prefixed with an
alias() method. In version 3.5+ the list will reload if the alias has changed though.

Aliased lists have been added in version 3.3

## In other words&hellip;

Aliasing is the RedBeanPHP way of saying 'one-to-X'.
