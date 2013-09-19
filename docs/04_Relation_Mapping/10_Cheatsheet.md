# Cheatsheet

If you are new to RedBeanPHP but you have been working with
relational databases in the past you might be a bit confused with the
terminology in RedBeanPHP. Here is a little 'cheatsheet' mapping
relational terms to RedBeanPHP terms. You might find this useful.

<table class="matrix">
<thead>
	<tr><th>Relation</th><th>RedBeanPHP method</th></tr>
</thead>
<tbody>
	<tr><td>one-to-one        </td><td>R::loadMulti('author,bio', 1)<sup>[1]</sup></td></tr>
	<tr><td>one-to-many       </td><td>$author-&gt;ownBook[] = $book</td></tr>
	<tr><td>many-to-one       </td><td>$book-&gt;author = $author</td></tr>
	<tr><td>many-to-many      </td><td>$book-&gt;sharedCategory[] = $category</td></tr>
	<tr><td>one-to-many self-referential</td><td>$category-&gt;ownCategory = $category</td></tr>
	<tr><td>many-to-many self-referential</td><td>$category-&gt;sharedCategory = $category</td></tr>
	<tr><td>one-to-X          </td><td>$book-&gt;fetchAs('author')-&gt;coauthor = $coAuthor;</td></tr>
	<tr><td>X-to-one          </td><td>$author-&gt;alias('coauthor')-&gt;ownBook;</td></tr>
	<tr><td>many-to-many + properties</td><td>$book-&gt;link('category_book', array('location'=&gt;'2nd floor'))-&gt;category = $category<sup>[2]</sup></td>
	<tr><td>polymorph         </td><td>$eBook = $book-&gt;poly('media_type')-&gt;media<sup>[3]</sup></td></tr>
</tbody>
<tfoot>
	<tr><td colspan="2"><sup>1</sup>This is a very uncommon relation. You can also use One-to-many plus a unique constraint for this.</td></tr>
	<tr><td colspan="2"><sup>2</sup>You can also rename this association and use access shared lists using via() (3.5+).</td></tr>
	<tr><td colspan="2"><sup>3</sup>Kind of defeats the purpose of a relational database though because you cannot use foreign keys now.</td></tr>
</tfoot>
</table>

While RedBeanPHP is perfectly capable of managing almost any
kind of relationship, I recommend to keep things simple.
Most of the time the basic relations like one-to-many, many-to-one, self-referential relations and many-to-many will do.
Sometimes I use one-to-X and X-to-one (aliasing). Personally I never use one-to-one or polymorph, these are
extremely uncommon.
