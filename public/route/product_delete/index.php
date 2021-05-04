<?php
require_once (__DIR__ . '/../../../vendor/autoload.php');

use src\controllers\admin\Delete;

$delete = new Delete($_GET['id']);
$delete->productDelete();
header('Location: /route/admin');
