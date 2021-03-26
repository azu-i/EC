<?php
ini_set('display_errors', "On");
require_once 'order/Order.php';
require_once 'order/OrderDao.php';
require_once 'domain_user/UserDao.php';

session_start();
$userDao = new UserDao();
$check_login = $userDao->checkLogin();
if (!$check_login) {
  header('Location: t_user_login.php');
  exit;
}

$order = new Order(
  $_SESSION['login_user']['id'],
  $_POST['address'],
  $_POST['tell'],
  $_POST['payment']
);
[$user_id, $address, $tell, $payment] = $order->extractParamsForRegister();
$orderDao = new OrderDao();
$st = $orderDao->orderInsert($user_id, $address, $tell, $payment);


$order_id = $orderDao->pdo()->lastInsertId();
$stmt = $orderDao->orderItemInsert($_SESSION['cart'], $order_id);
$_SESSION['cart'] = null;

if ($payment = 1) $payment_display = "コンビニ支払い";
if ($payment = 2) $paymant_display = "現金引き換え";

require 't_order_complete.php';
