<?php
require_once (__DIR__ . '/Quantity.php');

class QuantityFactory
{
  public static function create(int $count): Quantity
  {
    return new Quantity($count);
  }
}
?>