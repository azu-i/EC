<?php
  require 'domain/GoodsDao.php';
  ini_set('display_errors', "On");

  $goodsDao = new GoodsDao();
  
  session_start();
  $_SESSION['cart'] = null;
  header('Location: cart_index.php');
?>