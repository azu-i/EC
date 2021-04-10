<?php
require_once 'order.php';

$_SESSION['cart'] = null;
exit();

require (__DIR__ . '/../../views/login_function/order_complete.php');