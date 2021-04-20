<?php
require_once (__DIR__ . '/../../domain/products/CommentFactory.php');
require_once (__DIR__ . '/../../domain/products/PriceFactory.php');
require_once (__DIR__ . '/../../models/ProductsDao.php');

ini_set('display_errors', "On");

$productsDao = new ProductsDao();

$name = $_POST['name'];
$comment = CommentFactory::create($_POST['comment']);
$price = PriceFactory::create($_POST['price']);

$st = $productsDao->productInsert($name, $comment->detail(), $price->value());
header('Location: /src/controllers/admin/index.php');
exit();
