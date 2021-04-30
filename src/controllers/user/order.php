<?php
ini_set('display_errors', "On");
require_once (__DIR__ . '/../../domain/order/Order.php');
require_once (__DIR__ . '/../../models/OrderDao.php');
require_once (__DIR__ . '/../../domain/cart/CartFactory.php');
require_once (__DIR__ . '/../../models/ProductsDao.php');
require_once (__DIR__ . '/../../models/UserDao.php');

session_start();

if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
$cart = CartFactory::create();
$productsDao = new ProductsDao();
$cartProducts = $productsDao->searchCartProducts($_SESSION['cart'], $cart);

require (__DIR__ . '/../../../public/user/order/index.php');
