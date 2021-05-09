<?php
require_once (__DIR__ . '/../../../vendor/autoload.php');
use src\controllers\admin\EditUplode;

$edit = new EditUplode($_GET['id'], $_GET['name'], $_GET['comment'], $_GET['price']);
$edit->edit();

header('Location: /route/admin');