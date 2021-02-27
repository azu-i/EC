<?php
require_once 'Quantity.php';

class QuantityFactory
{
  public static function create(int $count)
  {
    return new Quantity($count);
  }
}
?>