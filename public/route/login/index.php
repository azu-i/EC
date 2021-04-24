<?php
require_once(__DIR__ . '/../../../src/controllers/login_function/user_login.php');
session_start();

$error_message = [];
if ($user_dao->checkUserExistenceByEmail($email) == false) {
  $error_message['email'] = "入力したメールアドレスは登録されていません";
  $_SESSION = $error_message;
  header('Location: http://l-ec.com/login_function/login');
}
if ($login_result == true) {
  header('Location: http://l-ec.com');
} else {
  $error_message['password'] = "パスワードが一致しません";
  $_SESSION = $error_message;
  header('Location: /login_function/login');
}