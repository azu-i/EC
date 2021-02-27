<?php
require_once 'domain/Quantity.php';
require_once 'domain/Goods.php';
require_once 'domain/CartItem.php';


class CartItemFactory
{
    public static function create(Goods $goods, int $quantity): CartItem
    {
        return new CartItem($goods, new Quantity($quantity));
    }
}
