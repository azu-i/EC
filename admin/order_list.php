<?php
require_once '../order/OrderDao.php';

$orderDao = new OrderDao();
$order_lists = $orderDao->orderedDataWithUserAndProductData();

require 't_order_list.php';