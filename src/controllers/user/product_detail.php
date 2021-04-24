<?php
require_once (__DIR__ . '/../../auth/Auth.php');
require_once (__DIR__ . '/../../models/repository/ProductsRepository.php');
require_once (__DIR__ . '/../../models/BrowdingHistoriesDao.php');
$product_id = $_POST['id'];

$auth_id = Auth::id();

$productsRepository = new ProductsRepository();
$product_details = $productsRepository->findById($product_id);

$browdingHistoriesDao = new BrowdingHistoriesDao();
$browdingHistoriesDao->browdingHistoriesInsert($product_id, $auth_id);

//注文できる商品の最大値
$max_order_number = 9;

// require (__DIR__ . '/../../../public/user/product_detail/index.php');
