<?php
session_start();
require_once (__DIR__ . '/../../models/UserDao.php');
require_once (__DIR__ . '/../domain/login_function/UserFactory.php');
require_once (__DIR__ . '/../login_function/security.php');

ini_set('display_errors', "On");

$token = filter_input(INPUT_POST, 'csrf_token');

try{
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

header('Location: /views/login_function/user_registration_complete.php');