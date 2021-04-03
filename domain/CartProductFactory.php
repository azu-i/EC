<?php
require_once 'Quantity.php';
require_once 'Products.php';
require_once 'CartProducts.php';


class CartProductFactory
{
    public static function create(Products $products, int $quantity): CartProducts
    {
        return new CartProducts($products, new Quantity($quantity));
    }
}
