<?php
require_once (__DIR__ . '/../../../vendor/autoload.php');
use src\controllers\user\OrderHistory;

ini_set('display_errors', "On");
ini_set('error_reporting', E_ALL & ~E_WARNING & ~E_NOTICE);

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$orderHistory = new OrderHistory();
[$AuthOrderData, $AuthProductsData] = $orderHistory->AuthOrderList();

require_once(__DIR__ . '/../../user/order_history/index.php');