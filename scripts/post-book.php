<?php

require_once __DIR__ . "/..classes/Database.php";
require_once __DIR__ . "/..classes/Book.php";

if(isset($_POST["title"]) && isset($_POST["author"])) {
    $book_title = $_POST["title"];
    $book_author = $_POST["author"];

    $book = new Book($book_title, $book_author);
 
    $db = new Database();

    $success = $db -> save_book($book);
}
else {
    echo "Invalid input";
}



if($success) {
    header ("Location: /library/pages/books.php");

}
else {
    echo "Error saving book to db";
}