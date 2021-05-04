<?php
namespace src\domain\products; 

// require_once (__DIR__ . '/Comment.php');

class CommentFactory
{
  public static function create(string $detail): Comment
  {
    return new Comment($detail);
  }
}

?>