<?php
require 'common.php';

$pdo = connect();

if (@$_POST['submit']) {
  @$_SESSION['cart'][$_POST['id']] += $_POST['num'];
}

header('Location: cart_index.php');
?>