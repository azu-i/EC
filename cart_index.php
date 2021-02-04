<?php
ini_set('display_errors', "On");

require 'domain/Price.php';
require 'domain/Goods.php';
require 'domain/CartItem.php';
require 'domain/Cart.php';
require 'common.php';

$pdo = connect();

if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
if (@$_POST['submit']) {
  @$_SESSION['cart'][$_POST['id']] += $_POST['num'];
}

$cart = new Cart();

try {
  foreach ($_SESSION['cart'] as $code => $num) {
    $st = $pdo->prepare("SELECT * FROM goods WHERE id = ?");
    $st->execute(array($code));
    $row = $st->fetch();
    $st->closeCursor();

    $price = new Price($row['price']);
    $goods = new Goods($row['id'], $row['name'], $price, $row['comment']);
    $cart_item = new CartItem($goods, strip_tags($num));
      
    $cart->append_cart_item($cart_item);
  }

} catch (Exception $e) {
  echo $e->getMessage();
  die;
}

require 't_cart.php';
