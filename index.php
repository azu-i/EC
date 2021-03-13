<?php
require_once 'domain/GoodsDao.php';
require_once 'domain_user/UserDao.php';
ini_set('display_errors', "On");

try {
  $goodsDao = new GoodsDao();
  $goods = $goodsDao->findAll();
} catch (Exception $e) {
  echo $e->getMessage();
  die;
}

require 't_index.php';
