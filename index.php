<?php
require_once (__DIR__ . '/models/ProductsDao.php');
require_once (__DIR__ . '/Auth/Auth.php');
require_once (__DIR__ . '/models/UserDao.php');

ini_set('display_errors', "On");

//ログインしているかどうかの確認
$userDao = new UserDao();
$check_login = $userDao->checkLogin();

//ログインしていた時と、していなかった時の場合分け
if ($check_login === false) {
  require (__DIR__ . '/views/login_function/user_login.php');
  exit;
}
$login_user_name = Auth::name();
try {
  $productsDao = new ProductsDao();
  $products = $productsDao->findAll();
 
  require (__DIR__ . '/views/user/index.php');
} catch (Exception $e) {
  echo $e->getMessage();
  die;
}

