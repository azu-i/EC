<?php

require_once (__DIR__ . '/../../../src/controllers/user/cart_index.php');

$cartIndex = new CartIndex();
[$cartProducts, $cart] = $cartIndex->cartProducts();
require_once (__DIR__ . '/../../user/cart/index.php');