<?php
  ini_set('display_errors', "On");

  session_start();
  unset($_SESSION['cart']);
  header('Location: cart_index.php');
?>