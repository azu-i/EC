<?php
ini_set('display_errors', "On");
require 'order/Order.php';
require 'order/OrderDao.php';
require_once 'user/security.php';
require_once 'domain_user/UserDao.php';

session_start();

$userDao = new UserDao();
$check_login = $userDao->checkLogin();
if ($check_login) {
  $user_id = $_SESSION['login_user']['id'];
  $address = $_POST['address'];
  $tell = $_POST['tell'];
  $payment = $_POST['payment'];
  // $items_id = array_keys($_SESSION['cart']);
  // $amount = array_values($_SESSION['cart']);
  $status = 1;

  $orderDao = new OrderDao();
  $st = $orderDao->order($user_id, $address, $tell, $payment);  

  $_SESSION['cart'] = null;
  require 't_order_complete.php';
  exit();
} else {
  header('Location: t_user_login.php');
}

require 't_order.php';
