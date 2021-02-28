<?php
require '../domain/Price.php';
require '../domain/CommentFactory.php';
require '../domain/PriceFactory.php';
require '../domain/GoodsDao.php';

ini_set('display_errors', "On");

$goodsDao = new GoodsDao();

$name = $_POST['name'];
$comment = CommentFactory::create($_POST['comment']);
$price = PriceFactory::create($_POST['price']);

$goodsDao->goodInsert($name, $comment->detail(), $price->value());
header('Location: index.php');
exit();
