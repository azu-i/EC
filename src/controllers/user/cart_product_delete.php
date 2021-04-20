<?php
session_start();
unset($_SESSION['cart'][$_POST['id']]);

header('Location: /src/controllers/user/cart_index.php');
