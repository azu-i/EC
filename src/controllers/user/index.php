<?php

// require_once (__DIR__ . '/../../../vendor/autoload.php');
require_once (__DIR__ . '/../../models/UserDao.php');
require_once (__DIR__ . '/../../models/repository/ProductsRepository.php');
require_once (__DIR__ . '/../../auth/Auth.php');
// use src\models\UserDao;


//ログインしているかどうかの確認
$userDao = new UserDao();
$check_login = $userDao->checkLogin();

//ログインしていた時と、していなかった時の場合分け
if ($check_login === false) {
  require_once (__DIR__ . '/../../../public/login_function/login/index.php');
  exit;
}



$login_user_name = Auth::name();
try {
  $productsRepository = new ProductsRepository();
  $products = $productsRepository->findAll();
  require_once (__DIR__ . '/../../../public/user/index.php');
} catch (Exception $e) {
  echo $e->getMessage();
}
