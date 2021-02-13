<?php
  require 'common.php';
  require 'domain/DAO.php';

  $dao = new DAO();
  $pdo = $dao->connect();
  $_SESSION['cart'] = null;
  header('Location: cart_index.php');
?>