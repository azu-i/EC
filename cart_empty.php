<?php
  ini_set('display_errors', "On");

  session_start();
  $_SESSION['cart'] = null;
  header('Location: cart_index.php');
?>