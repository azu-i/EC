<?php
//adminControllerへ転記済み

require (__DIR__ . '/../domain/products/ProductsDao.php');
$productsDao = new ProductsDao();
session_start();
$id = $_GET['id'];
$productsDao->delete($id);
header('Location: /controllers/admin/index.php');
