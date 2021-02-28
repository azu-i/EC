<?php
session_start();
require_once '../domain_user/UserDao.php';

$pdo = new UserDao();
$pdo->pdo();

$mail = $_POST['mail'];
$password = $_POST['password'];
?>