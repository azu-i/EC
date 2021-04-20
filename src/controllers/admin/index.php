<?php
require_once(__DIR__ . '/../../models/ProductsDao.php');
ini_set('display_errors', "On");

try {
  $products_dao = new ProductsDao();
  $products = $products_dao->findAll();
  require(__DIR__ . '/../../../public/admin/index.php');
} catch (Exception $e) {
  echo $e->getMessage();
  die;
}
