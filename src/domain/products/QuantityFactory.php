<?php
namespace src\domain\products;

class QuantityFactory
{
  public static function create(int $count): Quantity
  {
    return new Quantity($count);
  }
}
?>