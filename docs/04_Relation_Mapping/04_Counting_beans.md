# Counting beans

In version 3.5 and higher you can count related beans like this:

```php
$numPages = $book->countOwn('page');
```

This also works for shared lists:

```php
$numProjects = $member->countShared('project');
```

And with conditions:

```php
$numProj = $member
		->withCondition(' member_project.role ', array('lead'))
		->countShared('project');

$numPages = $book
		->withCondition(' book_page.number > ? ', array(100))
		->countOwn('page');
```

The first line in the code block above counts all projects in which
$member participates as a leader. The second example counts all pages
in book $book after page number 100.

Relation counts also play nice with aliases and via:

```php
$shop->via('relation')->countShared('customer');

$Andy->alias('coAuthor')->countOwn('book');
```

The first line in the code block above counts all customers
for shop $shop using link type: relation. The second line
counts all books written by Andy as a co-author.

Note that 'coAuthor' will be converted to co_author - the
canonical name of the property.
