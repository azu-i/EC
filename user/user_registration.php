<?php
session_start();
require_once '../domain_user/UserDao.php';
require_once '../domain_user/UserFactory.php';
require_once 'security.php';

session_start();
ini_set('display_errors', "On");

$token = filter_input(INPUT_POST, 'csrf_token');
if(!isset($_SESSION['csrf_token']) || $token != $_SESSION['csrf_token']){
  throw new Exception('不正なリクエストです');
}
unset($_SESSION['csrf_token']);


$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$user = UserFactory::create($name, $email, $password);

if($password !== $_POST['password_confirmation']){
  throw new Exception('確認用パスワードと異なっています。');
}

$userDao = new UserDao();
$userDao->insert($user);

header('Location: t_user_registration_complete.php');