<?php
namespace src\domain\products;

ini_set('display_errors', "On");

class ProductsFactory
{
  public static function create(int $id, string $name, string $price, string $comment): Product
  {
    return new Product(
      new ProductId($id),
      $name,
      new Price($price),
      new Comment($comment)
    );
  }
}
