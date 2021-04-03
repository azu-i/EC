<?php

class Cart
{
  private $cart_products;

  public function __construct(array $cart_products = [])
  {
    $this->cart_products = $cart_products;
  }

  public function cart_products(): array
  {
    return $this->cart_products;
  }

  public function total_price(): int
  {
    $total_price = 0;

    foreach ($this->cart_products as $cart_product) {
      $total_price += $cart_product->sum_price();
    }

    return $total_price;
  }

  public function append_cart_product(CartProducts $cart_products)
  {
    $this->cart_products[] = $cart_products;
  }
}
