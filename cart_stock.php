<?php
require 'domain/ProductsDao.php';

$productsDao = new ProductsDao();
$productsDao->pdo();
session_start();

if ($_POST['num'] > 0) {
  $_SESSION['cart'][$_POST['id']] += $_POST['num'];
 
}

header('Location: cart_index.php');
