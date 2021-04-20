<?php
require_once (__DIR__ . '/../../models/ProductsDao.php');

ini_set('display_errors', "On");
$productsDao = new ProductsDao();

try {

  $id = $_POST['id'];
  $name = $_POST['name'];
  $comment = $_POST['comment'];
  $price = $_POST['price'];

  $productsDao->editUplode($id, $name, $price, $comment);

  header('Location: /controllers/admin/index.php');
  exit();
} catch (Exception $e) {
  echo $e->getMessage();
  exit;
}

require (__DIR__ . '/edit.php');
