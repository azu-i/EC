<?php
session_start();
require_once (__DIR__ . '/../../models/UserDao.php');
require_once (__DIR__ . '/../../domain/login_function/UserLogin.php');

$email = $_GET['email'];
$password = $_GET['password'];
$user_login = new UserLogin($email, $password);

$error_message = $user_login->countError();

if (count($error_message) > 0) {
  $_SESSION = $error_message;
  header('Location: /login_function/login');
  return;
}

$user_dao = new UserDao();
$login_user_data = $user_dao->getUserDataByEmail($email);
$_SESSION['login_user'] = $login_user_data;

//メールアドレスとパスワードの照合
$login_result = $user_dao->login($user_login);
// $error_message = [];
// if($user_dao->checkUserExistenceByEmail($email) == false){
//   $error_message['email'] = "入力したメールアドレスは登録されていません";
//   $_SESSION = $error_message;
//   header('Location: /login_function/login');
// }
// if($login_result == true) {
//   header('Location: http://l-ec.com');
// }else{
//   $error_message['password'] = "パスワードが一致しません";
//   $_SESSION = $error_message;
//   header('Location: /login_function/login');
// }

