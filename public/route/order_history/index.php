<?php
require_once (__DIR__ . '/../../../vendor/autoload.php');
use src\controllers\user\OrderHistory;

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$orderHistory = new OrderHistory();
[$AuthOrderData, $AuthProductsData] = $orderHistory->AuthOrderList();

require_once(__DIR__ . '/../../user/order_history/index.php');