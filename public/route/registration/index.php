<?php
require_once (__DIR__ . '/../../../vendor/autoload.php');
use src\controllers\login_function\UserRegistration;
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirmation = $_POST['password_confirmation'];

$userRegistration = new UserRegistration($name, $email, $password, $passwordConfirmation);
$userRegistration->userInsert();

header('Location: /login_function/registration_complete');