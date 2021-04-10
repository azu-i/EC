<?php
require_once (__DIR__ . '/../../Auth/Auth.php');
require_once (__DIR__ . '/../../models/OrderDao.php');
ini_set('display_errors', "On");

$orderDao = new OrderDao();
$auth_id = Auth::id();
$auth_order_lists = $orderDao->makeOrderedDataList($auth_id);

require (__DIR__ . '/../../views/user/order_history.php');