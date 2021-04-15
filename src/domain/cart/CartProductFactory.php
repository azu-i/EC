<?php
require_once (__DIR__ . '/../products/Quantity.php');
require_once (__DIR__ .'/../products/Products.php');
require_once (__DIR__ . '/CartProducts.php');


class CartProductFactory
{
    public static function create(Products $products, int $quantity): CartProducts
    {
        return new CartProducts($products, new Quantity($quantity));
    }
}
