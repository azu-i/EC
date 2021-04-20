<?php
require_once (__DIR__ . '/Product.php');
require_once (__DIR__ . '/Comment.php');
require_once (__DIR__ . '/Price.php');
require_once (__DIR__ . '/ProductId.php');
ini_set('display_errors', "On");

class ProductsFactory
{
  public static function create(int $id, string $name, int $price, string $comment): Product
  {
    return new Product(
      new ProductId($id),
      $name,
      new Price($price),
      new Comment($comment)
    );
  }
}
