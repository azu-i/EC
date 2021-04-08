<?php

ini_set('display_errors', "On");
require_once '../models/ProductsDao.php';

try {
  $productsDao = new ProductsDao();
  $products = $productsDao->findAll();

} catch (Exception $e) {
  echo $e->getMessage();
  die;
}
require 't_index.php';
?>