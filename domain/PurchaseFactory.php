<?php
require_once 'Purchase.php';

class PurchaseFactory
{
  
  public static function create(string $name, string $address, int $tell, string $payment): Purchase
  {
    return new Purchase($name, $address, $tell, $payment);
  }
}
?>