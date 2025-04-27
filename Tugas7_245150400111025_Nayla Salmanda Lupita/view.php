<h1>Library Book List</h1>
<a href="index.php?action=create">Add New Book</a>
<ul>
    <?php foreach ($books as $book): ?>
        <li>
            <?php echo $book['title']; ?> by <?php echo $book['author']; ?> (<?php echo $book['year']; ?>)
            <a href="index.php?action=edit&id=<?php echo $book['id']; ?>">Edit</a>
            <a href="index.php?action=delete&id=<?php echo $book['id']; ?>">Delete</a>
        </li>
    <?php endforeach; ?>
</ul>
