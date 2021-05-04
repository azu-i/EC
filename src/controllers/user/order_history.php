<?php
require_once (__DIR__ . '/../../../vendor/autoload.php');

use src\auth\Auth;
use src\models\OrderDao;

ini_set('display_errors', "On");
session_start();
$orderDao = new OrderDao();
$auth = new Auth();
$authId = $auth->id();

$authOrderLists = $orderDao->makeOrderedDataList($authId);
