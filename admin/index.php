<?php

ini_set('display_errors', "On");
require_once '../domain/GoodsDao.php';

try {
  $goodsDao = new GoodsDao();
  $goods = $goodsDao->findAll();

} catch (Exception $e) {
  echo $e->getMessage();
  die;
}
require 't_index.php';
?>