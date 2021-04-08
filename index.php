<?php
require_once 'models/ProductsDao.php';
require_once 'Auth/Auth.php';
require_once 'models/UserDao.php';

ini_set('display_errors', "On");

//ログインしているかどうかの確認
$userDao = new UserDao();
$check_login = $userDao->checkLogin();

//ログインしていた時と、していなかった時の場合分け
if (!$check_login) {
  header('Location: user/t_user_login.php');
  exit;
}
$login_user_name = Auth::name();
try {
  $productsDao = new ProductsDao();
  $products = $productsDao->findAll();
  require 'view/index.php';
} catch (Exception $e) {
  echo $e->getMessage();
  die;
}
