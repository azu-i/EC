<?php
namespace src\controllers\user;

require (__DIR__ . '/../../models/ProductsDao.php');
ini_set('display_errors', "On");
class CartStock
{
  public function __construct(int $productId, int $stockNum)
  {
    $this->productId = $productId; 
    $this->stockNum = $stockNum; 
  }

  public function cartStock(): array
  {
    session_start();
    if ($this->stockNum > 0) {
      $_SESSION['cart'][$this->productId] +=
      $this->stockNum;
      return $_SESSION['cart']; 
    }
  }
}
