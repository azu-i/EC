<?php
  ini_set('display_errors', "On");

  session_start();
  unset($_SESSION['cart']);
  header('Location: /src/controllers/user/cart_index.php');
?>