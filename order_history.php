<?php
require_once 'Auth/Auth.php';
require_once 'order/OrderDao.php';
ini_set('display_errors', "On");

$orderDao = new OrderDao();
// $order_join = $orderDao->orderJoin();

$auth_id = Auth::id();
$auth_order_items = $orderDao->orderedDataByAuth($auth_id);


 
require 't_order_history.php';