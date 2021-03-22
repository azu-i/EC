<?php
require_once 'cart_index.php';

$_SESSION['cart'][$_POST['id']] = null;
require 't_cart.php';

