<?php
session_start();
unset($_SESSION['cart'][$_GET['id']]);

header('Location: /route/cart');