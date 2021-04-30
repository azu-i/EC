<?php

class Cart
{
  private $cartProducts;

  public function __construct(array $cartProducts = [])
  {
    $this->cartProducts = $cartProducts;
  }

  public function cartProducts(): array
  {
    return $this->cartProducts;
  }

  public function totalPrice(): int
  {
    $totalPrice = 0;
    foreach ($this->cartProducts as $cartProduct) {
      $totalPrice += $cartProduct->sumPrice();
    }

    return $totalPrice;
  }

  public function appendCartProduct(CartProducts $cartProducts)
  {
    $this->cartProducts[] = $cartProducts;
  }
}
