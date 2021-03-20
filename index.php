<?php
require_once 'domain/GoodsDao.php';
require_once 'domain_user/UserDao.php';
require_once 'user/security.php';
require_once 'domain_user/UserDao.php';

ini_set('display_errors', "On");

//ログインしているかどうかの確認
session_start();
$userDao = new UserDao();
$check_login = $userDao->checkLogin();

//ログインしていた時と、していなかった時の場合分け
if ($check_login) {
  $login_user = $_SESSION['login_user'];
  $login_user_name = escape($login_user['name']);
  try {
    $goodsDao = new GoodsDao();
    $goods = $goodsDao->findAll();
  } catch (Exception $e) {
    echo $e->getMessage();
    die;
  }
} else {
  header('Location: user/t_user_login.php');
}

require 't_index.php';
