<?php
namespace src\controllers\user;

require_once (__DIR__ . '/../../../vendor/autoload.php');

use src\domain\cart\Cart;
use src\models\ProductsDao;

ini_set('display_errors', "On");

class CartIndex
{
  public function cartProducts()
  {
    session_start();
    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
    $cart = new Cart();
    $productsDao = new ProductsDao();
    $cartProducts = $productsDao->searchCartProducts($_SESSION['cart'], $cart);
    return [$cartProducts, $cart];
  }
}
