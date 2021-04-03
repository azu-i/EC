<?php
ini_set('display_errors', "On");
require_once 'order/Order.php';
require_once 'order/OrderDao.php';
require_once 'domain/CartFactory.php';
require_once 'domain/ProductsDao.php';
require_once 'domain_user/UserDao.php';

session_start();
$userDao = new UserDao();
$check_login = $userDao->checkLogin();

if (!$check_login) {
  header('Location: user/t_user_login.php');
  exit;
}
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
$cart = CartFactory::create();
$productsDao = new ProductsDao();
$cart_products = $productsDao->searchCartProducts($_SESSION['cart'], $cart);
require 't_order.php';
