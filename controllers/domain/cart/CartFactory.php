<?php
require_once (__DIR__ . '/Cart.php');

class CartFactory
{
  public static function create()
  {
    return new Cart();
  }

}
?>