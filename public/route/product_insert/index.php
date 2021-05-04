<?php
require_once (__DIR__ . '/../../../vendor/autoload.php');

use src\controllers\admin\Insert;

session_start();
;
$insert = new Insert($_GET['name'], $_GET['comment'], $_GET['price']);
$insert->insert();

header('Location: /route/admin');