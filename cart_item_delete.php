<?php
require_once 'cart_index.php';

$_SESSION['cart'][$_POST['id']] = [];

require 't_cart.php';

