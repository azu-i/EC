<?php
require (__DIR__ . '/../../models/ProductsDao.php');

$productsDao = new ProductsDao();
$productsDao->pdo();
session_start();

if ($_POST['num'] > 0) {
  $_SESSION['cart'][$_POST['id']] += $_POST['num'];
 
}

header('Location: /controllers/user/cart_index.php');
