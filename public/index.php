<?php
// require_once(__DIR__ . '/../src/models/UserDao.php');
// require_once(__DIR__ . '/../src/auth/Auth.php');
// require_once(__DIR__ . '/../src/models/repository/ProductsRepository.php');
require_once (__DIR__ . '/../vendor/autoload.php');
use src\auth\Auth;
use src\models\UserDao;
use src\models\repository\ProductsRepository;

session_start();
$userDao = new UserDao();
$checkLogin = $userDao->checkLogin();

if ($checkLogin === false) {
  header('Location: /login_function/login');
  exit;
}

$auth = new Auth();
$loginUserName = $auth->name();
$productsRepository = new ProductsRepository();
$products = $productsRepository->findAll();

require_once(__DIR__ . '/user/index.php');
