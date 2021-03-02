<?php
require_once '../domain_user/UserDao.php';
require_once '../domain_user/UserFactory.php';

ini_set('display_errors', "On");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$user = UserFactory::create($name, $email, $password);

$userDao = new UserDao();
$userDao->insert($user);

header('Location: ../index.php');