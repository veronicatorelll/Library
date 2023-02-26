<?php

require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/Database.php";
require_once __DIR__ . "/../classes/Loan.php";



session_start();

$success = false;


if(isset($_POST["book-id"]) && isset($_SESSION["user"])) {
   $user = $_SESSION["user"];

   $db = new Database();

   $current_date = date("y-m-d");

   $loan = new Loan($user -> id, $_POST["book-id"], $current_date);

   $success = $db -> save_loan($loan);

}
else {
    echo "Invalid input";
}
if ($success){
    echo "Success";
}
else {
    echo "Error saving loan";
}
