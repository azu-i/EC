<?php
require_once 'order.php';

$_SESSION['cart'] = null;
exit();

require 't_order_complete.php';