# Meta Data

Beans contain meta information; for instance the type of the bean.
This information is hidden in a meta information field.
You can use simple accessors to get and modify this meta information.
<p>
<p>
To get a meta property value:

```php
$value = $bean->getMeta('my.property', $defaultIfNotExists);
```

The default default value is NULL.

To set a meta property:

```php
$bean->setMeta('foo', 'bar');
```

The type (in 3.0+ this is always the same as the database table)
of the bean is stored in meta property 'type' and can be retrieved as follows:

```php
$bean->getMeta('type');
```

**Since 3.0:** Meta data can be used for explicit casts. For instance if you want to store something
as a POINT datatype:

```php
$bean->setMeta('cast.myproperty','point');
```

## Public Meta properties

Here is an overview of all public meta properties used by the system. These
meta properties are safe to read and can be used reliably to extract information
about beans. Don't change them though!

<table>
	<thead><tr><th>Property</th><th>Function</th></tr></thead>
	<tbody>
		<tr><td>type</td><td>(string) Determines the type of the bean, don't change!</td></tr>
		<tr><td>tainted</td><td>(boolean) Whether the bean has been modified.</td></tr>
		<tr><td>cast.*</td><td>Used for explicit casting</td></tr>
	</tbody>
</table>

## Private Meta properties

Here is an overview of all system meta properties. These
meta properties should not be relied on, they are only for RedBeanPHP internal subsystems.

<table>
	<thead><tr><th>Property</th><th>Function</th></tr></thead>
	<tbody>
		<tr><td>buildcommand.indexes</td><td>issues extra options for query writer, for internal use only</td></tr>
		<tr><td>buildreport.flags.*</td><td>Information about internal processes</td></tr>
		<tr><td>sys.*</td><td>System information, never touch!</td></tr>
		<tr><td>idfield</td><td>Deprecated. Don't touch!</td></tr>
		<tr><td>buildcommand.unique</td><td>issues an extra option for query writer, use with care</td></tr>

	</tbody>
</table>
