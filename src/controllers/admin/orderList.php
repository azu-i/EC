<?php
namespace src\controllers\admin;

require_once (__DIR__ . '/../../../vendor/autoload.php');

use src\controllers\user\OrderHistory;

ini_set('display_errors', "On");

$orderHistory = new OrderHistory();
[$orderData, $productsData] = $orderHistory->orderList();
?>;