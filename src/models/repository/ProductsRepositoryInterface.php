<?php
require_once ( __DIR__ . '/../../domain/products/ProductsFactory.php');
require_once (__DIR__ . '/../../domain/cart/CartProductFactory.php');
require_once (__DIR__ . '/../../domain/products/QuantityFactory.php');

ini_set('display_errors', "On");

//ProductsRepositoryであることの条件
interface ProductsRepositoryInterface
{
  public function findAll(): array;
  public function findById(ProductId $id): Product;
  public function delete(ProductId $id): void;
  public function edit(Product $product): void;
  public function insert(Product $product): void; 
}
