<?php
namespace src\controllers\admin;

require_once (__DIR__ . '/../../../vendor/autoload.php');
use src\models\repository\ProductsRepository;
use src\domain\products\ProductId;

class Delete
{
  public function __construct(int $id)
  {
    $this->id = $id;
  }

  public function productDelete()
  {
    $productsRepository = new ProductsRepository();
    session_start();
    $productId = new ProductId($this->id);
    $productsRepository->delete($productId);
  }
}
