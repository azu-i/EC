<?php
require 'common.php';
require '../domain/Price.php';
require '../domain/Goods.php';
require '../domain/Comment.php';

ini_set('display_errors', "On");

$error = '';
$pdo = connect();

if (@$_POST['submit']) {
  $code = $_POST['id'];
  $name = $_POST['name'];
  $comment = $_POST['comment'];
  $price = $_POST['price'];
  if (!$name) $error .= '商品名がありません。<br>';
  if (!$comment) $error .= '商品説明がありません。<br>';
  if (!$price) $error .= '価格がありません。<br>';
  if (preg_match('/\D/', $price)) $error .= '価格が不正です。<br>';
  if (!$error) {
    $pdo->query("UPDATE goods SET name=$name, comment=$comment, price=$price WHERE id=$code");
    header('Location: index.php');
    exit();
  }
} else {
  $code = $_GET['id'];
  $st = $pdo->query("SELECT * FROM goods WHERE id=$code");
  $row = $st->fetch();
  $price = new Price($row['price']);
  $comment = new Comment($row['comment']);
  
  $goods = new Goods(
    $code,
    $row['name'],
    $price, 
    $comment
  );
}
require 't_edit.php';
?>