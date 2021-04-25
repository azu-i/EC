<?php
require_once(__DIR__ . '/../../../src/controllers/login_function/user_login.php');
session_start();
$login = new Login($_GET['email'], $_GET['password']);

$errorMessage = $login->countError();
if(count($errorMessage) > 0){
  $_SESSION = $errorMessage;
  header('Location: http://l-ec.com/login_function/login');
}else{
  $loginUserData = $login->userData();
  $_SESSION['loginUser'] = $loginUserData;
  header('Location: http://l-ec.com'); 
}