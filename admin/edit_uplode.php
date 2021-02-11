<?php
  require 'common.php';
  require '../domain/Price.php';
  require '../domain/Goods.php';
  require '../domain/Comment.php';

  ini_set('display_errors', "On");

  $error = '';
  $pdo = connect();
  try {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $comment = new Comment($_POST['comment']);
    $price = new Price($_POST['price']);
   
    $goods = new Goods($id, $name, $price, $comment);

    $name = $goods->name();
    $comment = $goods->comment();
    $price = $goods->price();
    $id = $goods->id();

    $sql = "UPDATE goods SET name='$name', comment='$comment', price=$price WHERE id=$id";
    $pdo->query($sql);


    header('Location: index.php');
    exit();
  } catch (Exception $e) {
    echo $e->getMessage();
    exit;
  }

  require 't_edit.php';
?>