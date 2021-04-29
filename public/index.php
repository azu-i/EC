<?php
require_once(__DIR__ . '/../src/models/UserDao.php');
require_once(__DIR__ . '/../src/auth/Auth.php');
require_once(__DIR__ . '/../src/models/repository/ProductsRepository.php');

session_start();
$userDao = new UserDao();
$checkLogin = $userDao->checkLogin();

if ($checkLogin === false) {
  header('Location: http://l-ec.com/login_function/login');
  exit;
}

$loginUserName = Auth::name();
$productsRepository = new ProductsRepository();
$products = $productsRepository->findAll();

require_once(__DIR__ . '/user/index.php');
