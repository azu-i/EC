<?php

class Cart
{
  private $cart_items;

  public function __construct(array $cart_items = [])
  {
    $this->cart_items = $cart_items;
  }

  public function cart_items(): array
  {
    return $this->cart_items;
  }

  public function total_price(): int
  {
    $total_price = 0;

    foreach ($this->cart_items as $cart_item) {
      $total_price += $cart_item->sum_price();
    }

    return $total_price;
  }

  public function append_cart_item(CartItem $cart_item)
  {
    $this->cart_items[] = $cart_item;
  }
}
