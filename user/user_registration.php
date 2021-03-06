<?php
require_once '../domain_user/UserDao.php';
require_once '../domain_user/UserFactory.php';

ini_set('display_errors', "On");

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