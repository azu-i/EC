<?php
require_once (__DIR__ . '/../../models/OrderDao.php');

$orderDao = new OrderDao();
$orderLists = $orderDao->orderedDataWithUserAndProductData();

// require (__DIR__ . '/../../../public/admin/order_list/index.php');