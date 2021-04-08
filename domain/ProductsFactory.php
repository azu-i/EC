<?php
require_once 'PriceFactory.php';
require_once 'Products.php';
require_once 'Comment.php';
ini_set('display_errors', "On");

class ProductsFactory
{
  public static function create(int $id, string $name, int $price, string $comment): Products
  {
    return new Products(
      $id,
      $name,
      new Price($price),
      new Comment($comment)
    );
  }
}
