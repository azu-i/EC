<?php
require_once (__DIR__ . '/../../auth/Auth.php');
require_once (__DIR__ . '/../../models/OrderDao.php');
ini_set('display_errors', "On");

$orderDao = new OrderDao();
$authId = Auth::id();
$authOrderLists = $orderDao->makeOrderedDataList($authId);
