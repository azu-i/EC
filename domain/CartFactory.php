<?php
require_once 'domain/Cart.php';

class CartFactory
{
  public static function create()
  {
    return new Cart();
  }

}
?>