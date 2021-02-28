<?php
ini_set('display_errors', "On");
require 'domain/Purchase.php';
require 'domain/GoodsDao.php';


if (@$_POST['submit']) {
  $name = htmlspecialchars($_POST['name']);
  $address = htmlspecialchars($_POST['address']);
  $tell = htmlspecialchars($_POST['tel']);
  $payment = htmlspecialchars($_POST['payment']); 
  
  $purchase_data = new Purchase(
    $name,
    $address,
    $tell,
    $payment
  );
 

  $name_buyer = $purchase_data->name();
  $address_buyer = $purchase_data->address();
  $tell_buyer = $purchase_data->tell();
  $payment_buyer = $purchase_data->payment();
    $goodsDao = new GoodsDao();
    $goodsDao->pdo();
    session_start();
    $_SESSION['cart'] = null;
    require 't_purchase_complete.php';
    exit();
}

require 't_purchase.php';
