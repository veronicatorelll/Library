<?php

require_once __DIR__ ."/User.php";
require_once __DIR__ ."/Book.php";
require_once __DIR__ ."/Loan.php";




class Database{
private $host = "localhost";
private $user = "root";
private $pass = "";
 private $db = "library-db";
    
 private $conn;

 public function __construct(){

    $this -> conn = mysqli_connect($this -> host, $this -> user, $this -> pass, $this -> db);

    if(!$this -> conn){
        die("Connection failed");
    }

    echo "DB CONNECTED";

 }


 public function save_user(User $user){

    $query = "INSERT INTO users (username, `password-hash`) VALUES (?,?)";

    $stmt = mysqli_prepare($this->conn, $query);

    $username = $user->username;
    $password_hash = $user->get_password_hash();

    $stmt -> bind_param("ss", $username, $password_hash);

    $success = $stmt -> execute();

    return $success;
 }
 


 public function get_user_by_username($username){
   $query = "SELECT * FROM users WHERE username = ?";

   $stmt = mysqli_prepare($this->conn, $query);

   $stmt->bind_param("s", $username);

   $stmt->execute();

   $result = $stmt->get_result();

   $db_user = mysqli_fetch_assoc($result);

   $user = null;

   if($db_user){
       $user = new User($username, $db_user["id"]);
       $user->set_password_hash($db_user["password-hash"]);
   }

   return $user;
}



public function save_book(Book $book){
   $query = "INSERT INTO books (title, author) VALUES (?,?)";

   $stmt = mysqli_prepare($this->conn, $query);

   $stmt->bind_param("ss", $book -> title, $book -> author);

   return $stmt->execute();
    
}



// --------- Hämta alla böcker
public function get_all_books(){
   $query = "SELECT * FROM books";

  $result = mysqli_query($this->conn, $query);

  $db_books = mysqli_fetch_all($result, MYSQLI_ASSOC);

  $books = [];

  foreach($db_books as $db_book){
     $title = $db_book["title"];
     $author = $db_book["author"];
     $id = $db_book["id"];

     $books[] = new Book($title, $author, $id);

  }

  return $books;

}


public function save_loan(Loan $loan){
   $query = "INSERT INTO loans (´user-id´, ´book-id´, ´start-date´) VALUES (?,?, ?)";

    $stmt = mysqli_prepare($this->conn, $query);
   
    $stmt -> bind_param("iis", $loan -> user_id, $loan->book_id, $loan->start_date);

    $success = $stmt -> execute();

    return $success;

}

}