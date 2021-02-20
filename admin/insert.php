<?php
require '../domain/Price.php';
require '../domain/Goods.php';
require '../domain/Comment.php';
require '../domain/GoodsDao.php';

ini_set('display_errors', "On");

$dao = new GoodsDao();
  
  $name = $_POST['name'];
  $comment = new Comment($_POST['comment']);
  $price = new Price($_POST['price']);

  $comment_insert = $comment->detail();
  $price_insert = $price->value();

    $pdo->query("INSERT INTO goods(name,comment,price) VALUES('$name','$comment_insert',$price_insert)");
    header('Location: index.php');
    exit();
?>