<?php
require (__DIR__ . '/../domain/products/Price.php');
require (__DIR__ . '/../domain/products/Products.php');
require (__DIR__ . '/../domain/products/Comment.php');
require (__DIR__ . '/../../models/ProductsDao.php');

ini_set('display_errors', "On");

$productsDao = new ProductsDao();

  $id = $_GET['id'];
  $products = $productsDao->selectProduct($id);

require (__DIR__ . '/../../views/admin/edit.php');
?>