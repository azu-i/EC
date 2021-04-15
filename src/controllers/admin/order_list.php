<?php
require_once (__DIR__ . '/../../models/OrderDao.php');

$orderDao = new OrderDao();
$order_lists = $orderDao->orderedDataWithUserAndProductData();

require (__DIR__ . '/../../views/admin/order_list.php');