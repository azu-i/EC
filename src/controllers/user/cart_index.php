<?php

require_once (__DIR__ . '/../../domain/cart/Cart.php');
require_once (__DIR__ . '/../../models/ProductsDao.php');
require_once (__DIR__ . '/../../models/UserDao.php');

ini_set('display_errors', "On");

// ログインしていなければログイン画面へ
session_start();

$userDao = new UserDao();
$check_login = $userDao->checkLogin();
if (!$check_login) {
  header('Location:/pubic/login_function/login.php');
  exit;
}
try {
  if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
  $cart = new Cart();
  $productsDao = new ProductsDao();
  $cart_products = $productsDao->searchCartProducts($_SESSION['cart'], $cart);
  require (__DIR__ . '/../../views/user/cart.php');
  require (__DIR__ . '/../../../public/user/cart/index.php');
} catch (Exception $e) {
  echo $e->getMessage();
  die;
}
