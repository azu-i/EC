<?php
require '../domain/Price.php';
require '../domain/CommentFactory.php';
require '../domain/PriceFactory.php';
require '../domain/ProductsDao.php';

ini_set('display_errors', "On");

$productsDao = new ProductsDao();

$name = $_POST['name'];
$comment = CommentFactory::create($_POST['comment']);
$price = PriceFactory::create($_POST['price']);

$st = $productsDao->productInsert($name, $comment->detail(), $price->value());
header('Location: index.php');
exit();
