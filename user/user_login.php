<?php
session_start();
require_once '../domain_user/UserDao.php';
require_once '../domain_user/UserLogin.php';


$email = $_POST['email'];
$password = $_POST['password'];
$user_login = new UserLogin($email, $password);

$error_message = $user_login->countError();

if (count($error_message) > 0) {
  $_SESSION = $error_message;
  header('Location: t_user_login.php');
  return;
}

$userDao = new UserDao();
$loginResult = $userDao->login($user_login);

$error_message = [];
if($userDao->checkUserExistenceByEmail($email) == false){
  $error_message['email'] = "入力したメールアドレスは登録されていません";
  $_SESSION = $error_message;
  header('Location: t_user_login.php');
}

if($loginResult == true) {
  header('Location: ../index.php');
}else{
  $error_message['password'] = "パスワードが一致しません";
  $_SESSION = $error_message;
  header('Location: t_user_login.php');
} 
