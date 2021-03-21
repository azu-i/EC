<?php

class CartItem
{
  private $goods;
  private $quantity;

  public function __construct(Goods $goods, Quantity $quantity)
  {
    if (empty($quantity)) {
      throw new Exception('足りていないパラメーターがあります');
    }
    $this->goods = $goods;
    $this->quantity = $quantity;
  }

  public function name(): string
  {
    return $this->goods->name();
  }

  public function price(): int
  {
    return $this->goods->price();
  }

  public function id(): int
  {
    return $this->goods->id();
  }

  public function quantity(): int
  {
    return $this->quantity->count();
  }

  public function sum_price(): int
  {
    return $this->price() * $this->quantity->count();
  }
}
