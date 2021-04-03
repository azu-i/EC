<?php
session_start();
unset($_SESSION['cart'][$_POST['id']]);

header('Location: cart_index.php');
