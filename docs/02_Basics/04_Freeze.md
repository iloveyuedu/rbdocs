# Freeze

By default **RedBeanPHP** operates in **fluid** mode. In fluid mode the **database**
**schema** gets updated to meet the requirements of your code.
For instance, if you assign a string to a property that previously only contained numbers RedBeanPHP
will _broaden_ the column to store strings as well.
This is great for development. However because inspecting the database is slow and you don't want
such a dynamic schema on the production server you should freeze the database by
invoking the **R::freeze(true)** command before deployment. This will lock the schema to prevent
further modifications.

```php
R::freeze( true ); //will freeze redbeanphp
```

Between freezing and deployment you need to review the database schema to make sure
it fits the bill. Here is a simple checklist:

1.  Check the column types. RedBeanPHP tries to guess the right types based on usage during development, however
	column types may be improved based on your expectations about real world usage.
2.  This issue concerns relations, if you haven't read about RedBeanPHP relations yet, you can skip this
	item for now.
	RedBeanPHP sets foreign keys for [relations automatically](/adding_lists#dependencies "Learn about relational mapping"),		however by default RedBeanPHP selects 'SET NULL'
	as the default action for deletions because the system can't predict whether a cascaded delete is desired. Make sure
	Check these foreign keys before deployment. If you don't know anything about foreign keys these default settings are
	probably just allright.
3.  RedBeanPHP adds some indexes. However, additional indexes may improve performance. Once again
	I recommend to review the indexes and adjust them where necessary based on your knowledge about		production environment.

## Chill Mode

Instead of freezing all beans you can freeze certain bean types only:

```php
R::freeze( array('book','page') );
	//book,page tables remain untouched.
```

this we call 'Chill Mode'.

Chill Mode has been added in version 3.2

Next: finding stuff with RedBeanPHP is really easy.
[RedBeanPHP uses familiar SQL](/finding_beans "Finding beans with RedBeanPHP ORM with some good old SQL") to
search for beans in the database.
