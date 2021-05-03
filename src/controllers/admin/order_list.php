<?php
namespace src\controllers\admin;

// require_once (__DIR__ . '/../../models/OrderDao.php');
require_once (__DIR__ . '/../../../vendor/autoload.php');
use src\models\OrderDao;

$orderDao = new OrderDao();
$orderLists = $orderDao->orderedDataWithUserAndProductData();
