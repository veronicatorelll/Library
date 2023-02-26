<?php


class Loan{
    public $id;
    public $book_id;
    public $user_id;
    public $date;



    public function __construct($user_id, $book_id, $start_date, $id = 0)
    {
        if($id > 0){
            $this -> id = $id;
        }


    $this -> user_id = $user_id;
    $this -> book_id = $book_id;
    $this -> start_date = $start_date;
    }

}