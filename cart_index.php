<?php

require 'domain/Cart.php';
require 'domain/GoodsDao.php';

ini_set('display_errors', "On");
$goodsDao = new GoodsDao();
$goodsDao->pdo();
session_start(); 

if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
$cart = new Cart();

try {
    $goodsDao->searchCartItems($_SESSION['cart'], $cart);
} catch (Exception $e) {
  echo $e->getMessage();
  die;
}

require 't_cart.php';

?>