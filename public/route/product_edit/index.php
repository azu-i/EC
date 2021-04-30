<?php
require_once (__DIR__ . '/../../../src/controllers/admin/edit_uplode.php');
require_once (__DIR__ . '/../../../src/domain/products/ProductId.php');

// $id = $_GET['id'];
// $name = $_GET['name'];
// $comment = $_GET['comment'];
// $price = $_GET['price'];
$edit = new Edit($_GET['id'], $_GET['name'], $_GET['comment'], $_GET['price']);
$edit->edit();

header('Location: /admin');