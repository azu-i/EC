<?php
require_once (__DIR__ .'/../../controllers/user/order.php');

$_SESSION['cart'] = null;
exit();
;
require (__DIR__ . '/../../../public/user/order_complete/index.php');
