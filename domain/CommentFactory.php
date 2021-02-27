<?php
require_once 'Comment.php';

class CommentFactory
{
  public static function create(string $detail)
  {
    return new Comment($detail);
  }
}

?>