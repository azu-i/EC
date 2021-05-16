<?php
namespace src\controllers\user;

require_once (__DIR__ . '/../../../vendor/autoload.php');

use src\domain\cart\Cart;
use src\models\ProductsDao;
use src\models\repository\ProductsRepository;

// ini_set('display_errors', "On");

class CartIndex
{
  public function cartProducts()
  {
    session_start();
    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
    $cart = new Cart();
    $productsRepository = new ProductsRepository();
    $cartProducts = $productsRepository->cartProducts($_SESSION['cart'], $cart);
    return [$cartProducts, $cart];
  }
}
