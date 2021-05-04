<?php
namespace src\domain\cart;

require_once (__DIR__ . '/../../../vendor/autoload.php');

use src\domain\products\Product;
use src\domain\cart\CartProducts;
use src\domain\products\Quantity;

class CartProductFactory
{
    public static function create(Product $product, int $quantity): CartProducts
    {
        return new CartProducts($product, new Quantity($quantity));
    }
}
