<?php
require_once (__DIR__ . '/../../../src/controllers/admin/insert.php');
session_start();
$name = $_GET['name'];
$comment = $_GET['comment'];
$price = $_GET['price'];

$insert = new Insert($name, $comment, $price);
$insert->insert();

header('Location: /admin');