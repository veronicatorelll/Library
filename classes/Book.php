<?php

class Book{
   public $id;
   public $title;
   public $author;


public function __construct($title, $author, $id = 0){
    if($id > 0){
        $this -> id = $id;
    }

    $this -> title = $title;
    $this -> author = $author; 
  }


  public function __toString()
  {
      return "{$this ->title} ({$this->author})";
  }
}