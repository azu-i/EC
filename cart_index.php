<?php

require_once 'domain/Cart.php';
require_once 'domain/GoodsDao.php';
require_once 'domain/CartFactory.php';
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
  $cart = CartFactory::create();
  $goodsDao = new GoodsDao();
  $cart_items = $goodsDao->searchCartItems($_SESSION['cart'], $cart);
  require 't_cart.php';
} catch (Exception $e) {
  echo $e->getMessage();
  die;
}
