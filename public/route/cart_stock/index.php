<?php
require_once (__DIR__ . '/../../../src/controllers/user/cart_stock.php');

$productId = $_GET['id'];
$stockNum = $_GET['num'];
$cartStock = new CartStock($productId, $stockNum);
$cart = $cartStock->cartStock();

header('Location: /route/cart');




