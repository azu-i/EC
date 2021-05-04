<?php
namespace src\domain\cart;
require_once (__DIR__ . '/../../../vendor/autoload.php');

use src\domain\cart\Cart;

class CartFactory
{
  public static function create()
  {
    return new Cart();
  }
}
?>