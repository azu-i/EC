<?php
namespace src\controllers\admin;

require_once (__DIR__ . '/../../../vendor/autoload.php');
use src\models\ProductsDao;
use src\domain\products\ProductsFactory;

ini_set('display_errors', "On");

class EditUplode
{
  public function __construct(int $id, string $name, string $comment, string $price)
  {
    $this->id = $id;
    $this->name = $name;
    $this->comment = $comment;
    $this->price = $price;
  }

  public function edit(): void
  {
    $productFactory = ProductsFactory::create($this->id, $this->name, $this->price, $this->comment);
    $id = $productFactory->id()->value();
    $name = $productFactory->name();
    $price = $productFactory->price();
    $comment = $productFactory->comment(); 
    $productsDao = new ProductsDao();
    $productsDao->editUplode($id, $name, $price, $comment);
  }
}
