<?php

require_once __DIR__ ."/../classes/Database.php";

$db = new Database();

$books = $db->get_all_books;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
</head>
<body>
    <h1>Books</h1>
<hr>
    <nav>
    <a href="/library">Home</a>
    </nav>

    <hr>

    <?php foreach($books as $book) : ?>

        <p>
            <?= $book -> title ?>
        </p>

    <?php endforeach; ?>


    <form action="/library/scripts/post-book.php" method="post">
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="author" placeholder="Author">
        <input type="submit" value="Save">
    </form>
</body>
</html>