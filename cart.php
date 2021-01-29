<?php
  require 'common.php';
  require 'Price.php';
  $rows = [];
  $sum = 0;
  $pdo = connect();

  if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
  if(@$_POST['submit']){
    @$_SESSION['cart'][$_POST['id']] += $_POST['num'];
  } 

  foreach($_SESSION['cart'] as $code => $num){
    $st = $pdo->prepare("SELECT * FROM goods WHERE id = ?");
    $st->execute(array($code));
    $row = $st->fetch();
    $st->closeCursor();
    $row['num'] = strip_tags($num);
    $sum += $num * $row['price'];
    $sum_price = new Price($sum);
    $cart_price = new Price($row['price']);
    
    $rows[] = new Good(
      $row['id'],
      $row['name'],
      $cart_price,
      $row['comment']
    );

    $row[] = $row['num'];

    
  }
   

  require 't_cart.php';
?>