<?php
  require '../domain/GoodsDao.php';
  $goodsDao = new GoodsDao();
  session_start(); 
  $id = $_GET['id'];
  $goodsDao->delete($id);
  header('Location: index.php');
