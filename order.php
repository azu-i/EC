<?php
ini_set('display_errors', "On");
require_once 'order/Order.php';
require_once 'order/OrderDao.php';
require_once 'user/security.php';
require_once 'domain_user/UserDao.php';

session_start();

$userDao = new UserDao();
$check_login = $userDao->checkLogin();
if ($check_login) {
  $order = new Order($_SESSION['login_user']['id'],
                     $_POST['address'],
                     $_POST['tell'],
                     $_POST['payment']
                     );
  [$user_id, $address, $tell, $payment] = $order->extractParamsForRegister();
  // $items_id = array_keys($_SESSION['cart']);
  // $amount = array_values($_SESSION['cart']);

  $orderDao = new OrderDao();
  $st = $orderDao->insert($user_id, $address, $tell, $payment);
  if($payment = 1) $payment_display = "コンビニ支払い";
  if($payment = 2) $paymant_display = "現金引き換え";

  $_SESSION['cart'] = null;
  require 't_order_complete.php';
  // header('Location: order_complete.php');
  exit();
} else {
  header('Location: t_user_login.php');
}

require 't_order.php';
