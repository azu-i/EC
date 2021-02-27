<?php
require_once 'Price.php';

class PriceFactory
{
  public static function create(int $value)
  {
    return new Price($value);
  }
}
?>