<?php
//adminControllerへ転記済み
require_once (__DIR__ . '/../../models/ProductsDao.php');

$productsDao = new ProductsDao();
session_start();
$id = $_GET['id'];
$productsDao->delete($id);
