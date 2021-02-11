<?php
require 'common.php';
require '../domain/Price.php';
require '../domain/Goods.php';
require '../domain/Comment.php';

ini_set('display_errors', "On");

$pdo = connect();

  $id = $_GET['id'];
  $st = $pdo->query("SELECT * FROM goods WHERE id=$id");
  $row = $st->fetch();
  $price = new Price($row['price']);
  $comment = new Comment($row['comment']);
  
  $goods = new Goods(
    $id,
    $row['name'],
    $price, 
    $comment
  );

require 't_edit.php';
?>