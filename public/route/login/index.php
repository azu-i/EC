<?php
require (__DIR__ . '/../../../vendor/autoload.php');

use src\controllers\login_function\Login;

ini_set('display_errors', "On");
session_start();

$email = $_POST['email']; 
$password = $_POST['password'];

$login = new Login($email, $password);

$errorMessage = $login->countError();
if(count($errorMessage) > 0){
  $_SESSION = $errorMessage;
  header('Location: /login_function/login');
}else{
  $loginUserData = $login->userData();
  $_SESSION['loginUser'] = $loginUserData;
  header('Location: /'); 
}