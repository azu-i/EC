<?php
require_once (__DIR__ . '/../vendor/autoload.php');
use src\auth\Auth;
// use src\models\UserDao;
use src\models\repository\ProductsRepository;
use src\models\repository\UserRepository;

session_start();
$userRepository = new UserRepository();
$checkLogin = $userRepository->checkLogin();

if ($checkLogin === false) {
  header('Location: /login_function/login');
  exit;
}

$auth = new Auth();
$loginUserName = $auth->name();
$productsRepository = new ProductsRepository();
$products = $productsRepository->findAll();

require_once(__DIR__ . '/user/index.php');
