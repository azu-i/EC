<?php
require_once '../domain_user/UserDao.php';
require_once '../domain_user/UserEmailFactory.php';
require_once '../domain_user/UserNameFactory.php';
ini_set('display_errors', "On");

$userDao = new UserDao();

$name = UserNameFactory::create($_POST['name'])->user_name();
$email = UserEmailFactory::create($_POST['email'])->mail();
$password = $_POST['password'];

$userDao->userInsert($name, $email, $password);
header('Location: ../index.php');
?>