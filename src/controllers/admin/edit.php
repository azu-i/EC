<?php
require_once (__DIR__ . '/../../domain/products/Price.php');
require_once (__DIR__ . '/../../domain/products/Product.php');
require_once (__DIR__ . '/../../domain/products/Comment.php');
require_once (__DIR__ . '/../../models/ProductsDao.php');

ini_set('display_errors', "On");

$productsDao = new ProductsDao();

  $id = $_GET['id'];
  $products = $productsDao->selectProduct($id);

require (__DIR__ . '/../../../public/admin/edit/index.php')
?>