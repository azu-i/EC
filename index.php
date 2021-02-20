<?php
  require 'domain/Price.php';
  require 'domain/Goods.php';
  require 'domain/Comment.php';
  require 'domain/GoodsDao.php';
  
  try {
    $goodsDao = new GoodsDao();
    $goods = $goodsDao->findAll();
    
  } catch (Exception $e) {
    echo $e->getMessage();
    die;
  }


  require 't_index.php';
?>