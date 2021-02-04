<?php
require 'common.php';
require 'domain/Cart.php';
$error = $name = $address = $tel = $payment= '';

if (@$_POST['submit']) {
  $name = htmlspecialchars($_POST['name']);
  $address = htmlspecialchars($_POST['address']);
  $tel = htmlspecialchars($_POST['tel']);
  $payment = htmlspecialchars($_POST['payment']); 
  if (!$name) $error .= 'お名前を入力して下さい<br>';
  if (!$address) $error .= 'ご住所を入力して下さい<br>';
  if (!$tel) $error .= '電話番号を入力して下さい<br>';
  if (preg_match('/[^\d-]/', $tel)) $error .= '電話番号が正しくありません。<br>';
  if (!$payment) $error .= '支払い方法を入力して下さい<br>';
  if (!$error) {
    $pdo = connect();
    $body = "商品が購入されました。\n\n"
      . "お名前: $name\n"
      . "ご住所: $address\n"
      . "電話番号: $tel\n\n";
    foreach ($_SESSION['cart'] as $code => $num) {
      $st = $pdo->prepare("SELECT * FROM goods WHERE id = ?");
      $st->execute(array($code));
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
    require 't_buy_complete.php';
    exit();
  }
}
require 't_buy.php';
