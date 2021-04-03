<?php

require_once 'domain/Cart.php';
require_once 'domain/ProductsDao.php';
require_once 'domain_user/UserDao.php';

ini_set('display_errors', "On");

// ログインしていなければログイン画面へ
session_start();

$userDao = new UserDao();
$check_login = $userDao->checkLogin();
if (!$check_login) {
  header('Location:user/t_user_login.php');
  exit;
}
try {
  if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
  $cart = new Cart();
  $productsDao = new ProductsDao();
  $cart_products = $productsDao->searchCartProducts($_SESSION['cart'], $cart);
  require 't_cart.php';
} catch (Exception $e) {
  echo $e->getMessage();
  die;
}
