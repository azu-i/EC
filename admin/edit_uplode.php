<?php
  // require '../domain/Price.php';
  // require '../domain/Goods.php';
  // require '../domain/Comment.php';
  require '../domain/GoodsDao.php';

  ini_set('display_errors', "On");
  $goodsDao = new GoodsDao();
 
  try {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $price = $_POST['price'];
    
    $goodsDao->editUplode($id, $name, $price, $comment);
  
    header('Location: index.php');
    exit();
  } catch (Exception $e) {
    echo $e->getMessage();
    exit;
  }

  require 't_edit.php';
?>