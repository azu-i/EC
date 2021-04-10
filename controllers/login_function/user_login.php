<?php
session_start();
require_once (__DIR__ . '/../../models/UserDao.php');
require_once (__DIR__ . '/../domain/login_function/UserLogin.php');


$email = $_POST['email'];
$password = $_POST['password'];
$user_login = new UserLogin($email, $password);

$error_message = $user_login->countError();

if (count($error_message) > 0) {
  $_SESSION = $error_message;
  header('Location: /views/login_function/user_login.php');
  return;
}

$userDao = new UserDao();
$login_user_data = $userDao->getUserDataByEmail($email);
$_SESSION['login_user'] = $login_user_data;

//メールアドレスとパスワードの照合
$loginResult = $userDao->login($user_login);
$error_message = [];
if($userDao->checkUserExistenceByEmail($email) == false){
  $error_message['email'] = "入力したメールアドレスは登録されていません";
  $_SESSION = $error_message;
  header('Location: /views/login_functionuser_login.php');
}
if($loginResult == true) {
  header('Location: /index.php');
}else{
  $error_message['password'] = "パスワードが一致しません";
  $_SESSION = $error_message;
  header('Location: /views/login_function/user_login.php');
}

