<?php
require 'domain/GoodsDao.php';

$goodsDao = new GoodsDao();
$goodsDao->pdo();
session_start();

if (@$_POST['submit']) {
  @$_SESSION['cart'][$_POST['id']] += $_POST['num'];
 
}

header('Location: cart_index.php');
