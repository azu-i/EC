<?php
require_once (__DIR__ . '/../../../vendor/autoload.php');

use src\controllers\user\CartStock;

// ini_set('display_errors', "On");
$productId = $_GET['id'];
$stockNum = $_GET['num'];
$cartStock = new CartStock($productId, $stockNum);
$cart = $cartStock->cartStock();

header('Location: /route/cart');




