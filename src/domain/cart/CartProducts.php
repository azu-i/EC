<?php

class CartProducts
{
  private $products;
  private $quantity;

  public function __construct(Product $product, Quantity $quantity)
  {
    if (empty($quantity)) {
      throw new Exception('足りていないパラメーターがあります');
    }
    $this->products = $product;
    $this->quantity = $quantity;
  }

  public function name(): string
  {
    return $this->products->name();
  }

  public function price(): int
  {
    return $this->products->price();
  }

  public function id(): ProductId
  {
    return $this->products->id();
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
