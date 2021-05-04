<?php
namespace src\models\repository;

require_once (__DIR__ . '/../../../vendor/autoload.php');
use src\domain\products\ProductId;
use src\domain\products\Product;

ini_set('display_errors', "On");

//ProductsRepositoryであることの条件
interface ProductsRepositoryInterface
{
  public function findAll(): array;
  public function findById(ProductId $id): Product;
  public function delete(ProductId $id): void;
  public function edit(int $id, string $name, int $price, string $comment): void;
  public function insert(Product $product): void; 
}
