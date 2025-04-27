<h1>Edit Book</h1>
<form method="POST">
    Title: <input type="text" name="title" value="<?php echo $book['title']; ?>" required><br>
    Author: <input type="text" name="author" value="<?php echo $book['author']; ?>" required><br>
    Year: <input type="text" name="year" value="<?php echo $book['year']; ?>" required><br>
    <button type="submit">Update</button>
</form>
