<?php
require_once 'Quantity.php';
require_once 'Goods.php';
require_once 'CartItem.php';


class CartItemFactory
{
    public static function create(Goods $goods, int $quantity): CartItem
    {
        return new CartItem($goods, new Quantity($quantity));
    }
}
