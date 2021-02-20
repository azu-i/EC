<?php
require '../domain/Price.php';
require '../domain/Goods.php';
require '../domain/Comment.php';
require '../domain/GoodsDao.php';

ini_set('display_errors', "On");

$goodsDao = new GoodsDao();

  $id = $_GET['id'];
  $goods = $goodsDao->selectItem($id);

require 't_edit.php';
?>