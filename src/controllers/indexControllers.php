<?php

namespace src\controllers;

class IndexController
{

  public function index()
  {
    echo 'index';
    //ログインしているかどうかの確認
    // $userDao = new UserDao();
    // $check_login = $userDao->checkLogin();

    //ログインしていた時と、していなかった時の場合分け
  //   if ($check_login === false) {
  //     require(__DIR__ . '/login_function/login/index.php');
  //     exit;
  //   }
  //   $login_user_name = Auth::name();
  //   try {
  //     $productsDao = new ProductsDao();
  //     $products = $productsDao->findAll();


  //     require(__DIR__ . '/user/index.php');
  //   } catch (Exception $e) {
  //     echo $e->getMessage();
  //   }
  }
}
