<?php
require_once (__DIR__ . '/../../auth/Auth.php');
require_once (__DIR__ . '/../../models/ProductsDao.php');
require_once (__DIR__ . '/../../models/BrowdingHistoriesDao.php');

$product_id = $_POST['id'];
$auth_id = Auth::id();

$productsDao = new ProductsDao();
$product_details = $productsDao->selectProduct($product_id);

$browdingHistoriesDao = new BrowdingHistoriesDao();
$browdingHistoriesDao->browdingHistoriesInsert($product_id, $auth_id);

//注文できる商品の最大値
$max_order_number = 9;

require (__DIR__ . '/../../../public/user/product_detail/index.php');
