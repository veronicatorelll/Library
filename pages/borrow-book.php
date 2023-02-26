<?php
require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/Database.php";


session_start();

$user = $_SESSION["user"];

$db = new Database();

$books = $db -> get_all_books();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow book</title>
</head>
<body>

<h1>Borrow book</h1>

<nav>
    <a href="/library">Home</a>
</nav>


<form action="/library/scripts/post-borrow-book.php" method="post">
    <select name="book-id"">

    <?php foreach ($books as $book) : ?>

    <option value="<?= $book->id?>"> <?= $book ?> </option>

    <?php endforeach; ?>

    <br>
    <input type="submit" value="Borrow">
    </select>

</form> 

</body>
</html>