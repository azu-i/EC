<?php

require 'domain/Price.php';
require 'domain/Goods.php';
require 'domain/CartItem.php';
require 'domain/Cart.php';
require 'domain/Quantity.php';
require 'domain/Comment.php';
require 'domain/GoodsDao.php';

ini_set('display_errors', "On");
$goodsDao = new GoodsDao();
$goodsDao->pdo();
session_start(); 

if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
$cart = new Cart();

try {
  foreach ($_SESSION['cart'] as $id => $num) {
    $st = $goodsDao->pdo()->prepare("SELECT * FROM goods WHERE id = ?");
    $st->execute(array($id));
    $row = $st->fetch();
    $st->closeCursor();
    $price = new Price($row['price']);
    $comment = new Comment($row['comment']);
    $goods = new Goods($row['id'], $row['name'], $price, $comment);
    $num = new Quantity(strip_tags($num));
    $cart_item = new CartItem($goods, $num);

    $cart->append_cart_item($cart_item);
  }
} catch (Exception $e) {
  echo $e->getMessage();
  die;
}

require 't_cart.php';

?>