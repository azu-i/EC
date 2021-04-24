<?php
require_once(__DIR__ . '/../../models/repository/ProductsRepository.php');
ini_set('display_errors', "On");

try {
  $productsRepository = new ProductsRepository();
  $products = $productsRepository->findAll();
  // require(__DIR__ . '/../../../public/admin/index.php');
} catch (Exception $e) {
  echo $e->getMessage();
  die;
}
