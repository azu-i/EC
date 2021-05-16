<?php
namespace src\controllers\admin;

require_once (__DIR__ . '/../../../vendor/autoload.php');
use src\models\repository\ProductsRepository;
use src\domain\products\ProductId;

// ini_set('display_errors', "On");

class Edit
{
  public function __construct(int $id)
  {
    $this->id = $id;
  }

  public function productEdit()
  {
    $productsRepository = new ProductsRepository();
    $id = new ProductId($this->id);
    $products = $productsRepository->findById($id);
    return $products;
  }
}
