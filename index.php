<?php // http://localhost/library

require_once __DIR__."/classes/Database.php";
require_once __DIR__."/classes/User.php";

session_start();


$db = new Database();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
</head>
<body>

<link rel="stylesheet" href="./library/assets/style.css">

<h1>Library</h1>

<nav>

<?php if (!$is_logged_in) : ?>
    <a href="/library/pages/register-user.php">To registration</a>
    <a href="/library/pages/login.php">Login</a>

    <?php else: ?>

      <a href="/library/pages/borrow-book.php">Borrow book</a>

    <?php endif; ?>

    <a href="/library/pages/books.php">Books</a>
</nav>

<?php if ($is_logged_in) : ?>
    <p>
            <b>Logged in as</b>
            <?= $_SESSION["user"]->username ?>
        </p>
        


<form action="/library/scripts/post-logout.php" method="post">
    <input type="submit" value="Logout">
</form> 


    
</body>
</html>