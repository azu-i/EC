<?php
session_start();
require_once '../domain_user/UserDao.php';

$pdo = new UserDao();
$pdo->pdo();

$mail = $_SESSION['email'];
$password = $_SESSION['password'];

header('Location: ../index.php');