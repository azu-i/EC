<?php
require_once (__DIR__ . '/../../models/repository/ProductsRepository.php');
require_once (__DIR__ . '/../../domain/products/ProductId.php');

$productsRepository = new ProductsRepository();
session_start();
$productId = new ProductId($_GET['id']);
$productsRepository->delete($productId);
