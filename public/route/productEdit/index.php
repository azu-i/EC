<?php
require_once (__DIR__ . '/../../../vendor/autoload.php');

use src\controllers\admin\Edit;

// ini_set('display_errors', "On");

$edit = new Edit($_GET['id']);
$products = $edit->productEdit();
require_once (__DIR__ . '/../../admin/edit/index.php');