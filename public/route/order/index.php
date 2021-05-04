<?php
require_once (__DIR__ . '/../../../vendor/autoload.php');

use src\controllers\user\CartIndex;

$cartIndex = new CartIndex();
[$cartProducts, $cart] = $cartIndex->cartProducts();

require_once (__DIR__ . '/../../user/order/index.php');