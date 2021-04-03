<?php
require '../domain/ProductsDao.php';
$productsDao = new ProductsDao();
session_start();
$id = $_GET['id'];
$productsDao->delete($id);
header('Location: index.php');
