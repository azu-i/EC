<?php
require '../domain/Price.php';
require '../domain/Products.php';
require '../domain/Comment.php';
require '../domain/ProductsDao.php';

ini_set('display_errors', "On");

$productsDao = new ProductsDao();

  $id = $_GET['id'];
  $products = $productsDao->selectProduct($id);

require 't_edit.php';
?>