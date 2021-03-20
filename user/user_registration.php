<?php
session_start();
require_once '../domain_user/UserDao.php';
require_once '../domain_user/UserFactory.php';
require_once 'security.php';

ini_set('display_errors', "On");

$token = filter_input(INPUT_POST, 'csrf_token');

try{
  // if(!isset($_SESSION['csrf_token']) || $token != $_SESSION['csrf_token']){
  //   throw new Exception('不正なリクエストです');
  if ($_POST['password'] !== $_POST['password_confirmation']) {
    throw new Exception('確認用パスワードと異なっています。');
  }

}catch(Exception $e) {
    echo $e->getMessage();
    die;
 
}
unset($_SESSION['csrf_token']);


$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$user = UserFactory::create($name, $email, $password);
$setToken = escape(setToken());

$userDao = new UserDao();
$userDao->insert($user);

header('Location: t_user_registration_complete.php');