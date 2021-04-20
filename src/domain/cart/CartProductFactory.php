<?php
require_once (__DIR__ . '/../products/Quantity.php');
require_once (__DIR__ .'/../products/Product.php');
require_once (__DIR__ . '/CartProducts.php');


class CartProductFactory
{
    public static function create(Product $product, int $quantity): CartProducts
    {
        return new CartProducts($product, new Quantity($quantity));
    }
}
