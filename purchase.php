<?php
require 'domain/DAO.php';
require 'domain/Purchase.php';
require 'domain/Cart.php';
ini_set('display_errors', "On");

if (@$_POST['submit']) {
  $name = htmlspecialchars($_POST['name']);
  $address = htmlspecialchars($_POST['address']);
  $tel = htmlspecialchars($_POST['tel']);
  $payment = htmlspecialchars($_POST['payment']); 
  
  $purchase_data = new Purchase(
    $name,
    $address,
    $tel,
    $payment
  );

    $dao = new DAO();
    $pdo = $dao->connect();
    $body = "商品が購入されました。\n\n"
      . "お名前: $purchase_data->name\n"
      . "ご住所: $purchase_data->address()\n"
      . "電話番号: $purchase_data->tell()\n\n";
    foreach ($_SESSION['cart'] as $id => $num) {
      $st = $pdo->prepare("SELECT * FROM goods WHERE id = ?");
      $st->execute(array($id));
      $row = $st->fetch();
      $st->closeCursor();
      $body .= "商品名: {$row['name']}\n"
        . "単価: {$row['price']} 円\n"
        . "数量: $num\n\n";
    }
    $from = "newuser@localhost";
    $to = "newuser@localhost";
    mb_send_mail($to, "購入メール", $body, "From: $from");
    $_SESSION['cart'] = null;
    require 't_purchase_complete.php';
    exit();
}

require 't_purchase.php';
