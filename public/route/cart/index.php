<?php
require_once (__DIR__ . '/../../../vendor/autoload.php');

use src\controllers\user\CartIndex;

// ini_set('display_errors', "On");

$cartIndex = new CartIndex();
[$cartProducts, $cart] = $cartIndex->cartProducts();
require_once (__DIR__ . '/../../user/cart/index.php');