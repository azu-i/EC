<?php
require_once (__DIR__ . '/../../../vendor/autoload.php');

use src\auth\Auth;
use src\controllers\user\OrderInsert;

ini_set('display_errors', "On");

session_start();
$auth= new Auth();
$authId = $auth->id();
$address = $_POST['address'];
$tell = $_POST['tell'];

$orderInsert = new OrderInsert($authId, $address, $tell, $_POST['payment']);

$orderId = $orderInsert->orderInsert();
$orderInsert->orderProductInsert($orderId);

$paymentDispray = $orderInsert->paymentDispray();
$_SESSION['cart'] = [];

require_once (__DIR__ . '/../../user/order_complete/index.php');

