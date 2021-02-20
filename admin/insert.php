<?php
require '../domain/Price.php';
require '../domain/Goods.php';
require '../domain/Comment.php';
require '../domain/GoodsDao.php';

ini_set('display_errors', "On");

$goodsDao = new GoodsDao();

$name = $_POST['name'];
$comment = new Comment($_POST['comment']);
$price = new Price($_POST['price']);

$goodsDao->goodInsert($name, $comment->detail(), $price->value());
header('Location: index.php');
exit();
