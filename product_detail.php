<?php
require_once 'domain/ProductsDao.php';
session_start();

$product_id = $_POST['id'];

$productsDao = new ProductsDao();
$product_details = $productsDao->selectProduct($product_id);
$productsDao->browdingHistoriesInsert($product_id);



require 'views/product_detail.php';
