<?php
require_once(__DIR__ . '/../../domain/products/Price.php');
require_once(__DIR__ . '/../../domain/products/Product.php');
require_once(__DIR__ . '/../../domain/products/Comment.php');
require_once(__DIR__ . '/../../models/repository/ProductsRepository.php');
require_once(__DIR__ . '/../../domain/products/ProductId.php');

ini_set('display_errors', "On");

$productsRepository = new ProductsRepository();
$id = new ProductId($_GET['id']);

$products = $productsRepository->findById($id);

// require (__DIR__ . '/../../../public/admin/edit/index.php')
