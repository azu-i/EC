<?php
ini_set('display_errors', "On");
require 'order/Order.php';
require 'order/OrderDao.php';

session_start();
$user_id = $_SESSION['login_user']['id'];
$address = $_POST['address'];
$tell = $_POST['tell'];
$payment = $_POST['payment'];
$items_id = [];
$items_id = array_keys($_SESSION['cart']);
$amount = [];
$amount = array_values($_SESSION['cart']);
$status = 'order_completed';

$orderDao = new OrderDao();

foreach($items_id as $item_id){
  $orderDao->order($user_id,
                   $address,
                   $tell,
                   $payment,
                   $item_id,
                   $amount,
                   $status
                   );
}
$_SESSION['cart'] = null;
require 't_order_complete.php';
exit();


// if (@$_POST['submit']) {
//   $name = htmlspecialchars($_POST['name']);
//   $address = htmlspecialchars($_POST['address']);
//   $tell = htmlspecialchars($_POST['tel']);
//   $payment = htmlspecialchars($_POST['payment']); 
  
//   $purchase_data = new Purchase(
//     $name,
//     $address,
//     $tell,
//     $payment
//   );
 

//   $name_buyer = $purchase_data->name();
//   $address_buyer = $purchase_data->address();
//   $tell_buyer = $purchase_data->tell();
//   $payment_buyer = $purchase_data->payment();
//     $goodsDao = new GoodsDao();
//     $goodsDao->pdo();
//     session_start();
//     $_SESSION['cart'] = null;
//     require 't_order_complete.php';
//     exit();
// }

require 't_order.php';
