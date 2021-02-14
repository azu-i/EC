<?php
  require 'domain/DAO.php';
  ini_set('display_errors', "On");

  $dao = new DAO();
  $pdo = $dao->connect();
  
  $_SESSION['cart'] = null;
  header('Location: cart_index.php');
?>