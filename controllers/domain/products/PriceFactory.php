<?php
require_once (__DIR__ . '/Price.php');

class PriceFactory
{
  public static function create(int $value): Price
  {
    return new Price($value);
  }
}
?>