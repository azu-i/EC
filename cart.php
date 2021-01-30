<?php
  require 'Price.php';
  require 'cart_index.php';
  require 'common.php';

  $pdo = connect();
  
  if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
  if(@$_POST['submit']){
    @$_SESSION['cart'][$_POST['id']] += $_POST['num'];
  } 
  
  $rows = [];
  $sum = 0;

  try{
    foreach($_SESSION['cart'] as $code => $num){
      $st = $pdo->prepare("SELECT * FROM goods WHERE id = ?");
      $st->execute(array($code));
      $row = $st->fetch();
      $st->closeCursor();
      $row['num'] = strip_tags($num);
      $sum_goods = $row['price'] * $row['num'];
      $sum += $num * $row['price'];

      $price = new Price($row['price']);
      $sum_goods_price = new Price($sum_goods);
      $sum_cart = new Price($sum);
      
      $rows[] = new Cart(
        $row['name'],
        $price,
        $sum_goods_price,
        $sum_cart,
        $row['num']
      );
      
    }

  } catch (Exception $e) {
  echo $e->getMessage();
  die;
}

  require 't_cart.php';
?>
