# BeanCan Server

BeanCan is a PHP class that can act as a backend server for **Javascript** centered web applications
(**JSON-RPC 2.0** compliant). In a JS based web application your views and controllers are written in client-side Javascript while your
[models](/models_and_fuse "Models and FUSE") are still stored on the server.
BeanCan acts as bridge between the client side javascript views and controllers on the one hand and the server side models on the other.

BeanCan makes use of [FUSE](/models_and_fuse "What is FUSE?"). This means that you can send 4 types of commands to the BeanCan Server:

<table>
<thead>
	<tr>
		<th>Command:</th>
	</tr>
</thead>
<tbody>
	<tr><td>load</td></tr>
	<tr><td>export (since 3.3)</td></tr>

	<tr><td>store</td></tr>
	<tr><td>trash</td></tr>
	<tr><td>custom </td></tr>
</tbody>
</table>

Requests **1-5** are handled automatically by RedBeanPHP.
This means you can **store/delete/load** any bean automatically if you connect to the bean server without ***any*** effort.
If you send an unrecognized command, FUSE tries to locate the model and passes the request. Time for examples...

From version 3.3 on you can use 'export'. Export works the same as 'load' but returns an entire bean hierarchy instead of just
one bean.
<p>
**Request #1:** The following request returns a page with ID 1:

<?php jcode('
{
"jsonrpc":"2.0",
"method":"page:load",
"params":[1],
"id":"myrequestid"
}
');?>

**Request #2:** The following request creates a new page and returns its new ID:

<?php jcode('
{
"jsonrpc":"2.0",
"method":"page:store",
"params":[{"body":"lorem ipsum"}],
"id":"myrequestid"
}
');?>

**Request #3:** The following request changes the text of page 2:

<?php jcode('
{
"jsonrpc":"2.0",
"method":"page:store",
"params":[{"body":"welcome","id":2}],
"id":"myrequestid"
}
');?>

**Request #4:** This example request deletes page with ID 3:

<?php jcode('
{
"jsonrpc":"2.0",
"method":"page:trash",
"params":[3],
"id":"myrequestid"
}
');?>

**Request #5:** executes **$page-&gt;mayAccess( $ip )** and returns the result. FUSE will connect automatically to the Model_Page class to accomplish this.

<?php jcode('
{
"jsonrpc":"2.0",
"method":"page:mayAccess",
"params":[ ipAddress ],
"id":"myrequestid"
}
');?>

The BeanCan server returns **JSON** reponses like this (created page and returns ID):

<?php jcode('
{
"jsonrpc":"2.0",
"result":"8",
"id":"myrequestid"
}
');?>

In case of an error:

<?php jcode('
{
"jsonrpc":"2.0",
"error":{"code":"-32603","message":"Invalid request"},
"id":"myrequestid"
}
');?>

## Full Example

Here is a full [example](/downloads/beancan.txt "Take a look at this example"). It is a todo list
written in **Javascript** and **PHP** using the BeanCan Server.

## Whitelist

To prevent API users from accessing all beans you can use a white list:

```php
$server->setWhitelist(array(
	'candy' => array('store', 'like')
));
```

This example will only allow you to store candy beans and invoke the custom method 'like'.
Other beans and other methods will not be accessible.
To turn off the white list and allow full access:

```php
$sever->setWhitelist('all');
```

Not familiar with JSON-RPC ? Take a look at: [JSON-RPC specification](http://jsonrpc.org/spec.html "Learn more about JSON-RPC").
