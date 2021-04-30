<?php
require_once (__DIR__ . '/../../../src/controllers/user/order_insert.php');
require_once (__DIR__ . '/../../../src/auth/Auth.php');

session_start();
$authId = Auth::id();
// $address = $_GET['address'];
// $tell = $_GET['tell'];
// $payment = $_GET['payment'];

$orderInsert = new OrderInsert($authId, $_GET['address'], $_GET['tell'], $_GET['payment']);

$orderInsert->orderInsert();
$orderInsert->orderProductInsert();

$paymentDispray = $orderInsert->paymentDispray();
$_SESSION['cart'] = [];

require_once (__DIR__ . '/../../user/order_complete/index.php');

