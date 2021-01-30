<?php

class Cart
{
  private $name;
  private $price;
  private $sum_goods_price;
  private $sum_cart;
  private $num;

  public function __construct($name, $price, $num, $sum_goods_price, $sum_cart)
  {
   if(empty($name)  || empty($num) || empty($sum_goods_price) || empty($sum_cart)){
      throw new Exception('足りていないパラメーターがあります');
   } 
   $this->name = $name;
   $this->price = $price;
   $this->num = $num;
   $this->sum_goods_price = $sum_goods_price;
   $this->sum_cart = $sum_cart;
  }

  public function name()
  {
    return $this->name;
  }

  public function price()
  {
    return $this->price->value();
  }

  public function sum_goods_price()
  {
    return $this->sum_goods_price->value();
  }

  public function sum_cart()
  {
    return $this->sum_cart->value();
  }

  public function num()
  {
    return $this->num;
  }


}