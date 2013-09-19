# Eager loading

Preloading/Eager loading requires RedBeanPHP version 3.3+

If you know in advance that you need some parent beans you can inform RedBeanPHP about this
to avoid unnecessary queries:

```php
$books = R::find('book');
R::preload($books,array('author'));
foreach($books as $book) echo $book->author;
```

Here RedBeanPHP will **NOT** query each author separately. Instead, the preload() will attach
all author beans upfront. Preload also understands aliases:

```php
$books = R::find('book');
R::preload($books,array('coauthor'=>'author'));
foreach($books as $book) echo $book->coauthor;
```

## More powerful preloader

These power-user features require RedBeanPHP version 3.4+

From version 3.4+ on you can preload multiple parents like this:

```php
$texts = R::find('text');
//to preload page, book and author parents:
R::preload($texts,'page,page.book,page.book.author');
//or use the short-syntax:
R::preload($texts,'page,*.book,*.author');
```

To retrieve the parent of a previous parent you can use the '*'.
If you would like to retrieve a parent bean on the same level as the previous parent
in the list use '&amp;' instead.

```php
$p = R::find('page');
//preloads page->book, page->book->author
//and page->book->shelf
R::preload($p,'book,*.author,&.shelf');
```

Note that both 'shelf' and 'author' are parents of book. Therefore
we prefixed the '.shelf' with an &amp; and not an '*'. If we would have used the
latter, preload() would have tried to fetch page-&gt;book-&gt;author-&gt;shelf which
does not exist of course.
To preload lists:

```php
$books = R::find('book');

R::preload($books,'ownPage|page,sharedGenre|genre');

foreach($books as $book) {
	print_r($book->ownPage);
}
```

Preloading is embedded in the syntax of RedBeanPHP, for instance instead of
using an ugly foreach-loop, RedBeanPHP can make your code more
elegant by preparing the preloaded beans for you as arguments of a closure
(requires PHP 5.3):

```php
R::each($texts,'page,*.book',
function($text,$page,$book){
	...no ugly foreach-loop...
});
```

R::each is exactly the same as R::preload. The difference is just stylistic.
If you use the closure variant I recommend to use **'each'** to highlight the
iteration.

Since RedBeanPHP 3.4.1 you can use with() conditions in preloading like this:
'ownBook'=&gt;array('book',' AND category = ? ',array($category)) - i.e. simply replace
the string 'book' for an array containing:

1. the type string

2. the SQL snippet you want to use and

3. the parameter bindings

Please be aware that these snippets are embedded in the query that retrieves all records
so adding LIMIT clauses will cause undesirable results.
