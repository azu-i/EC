<?php
ini_set('display_errors', "On");

class OrderDao
{
  const DSN = "mysql:host=localhost;dbname=shop;charset=utf8";
  const USER = "root";
  const PASS = "root";

  private $pdo;

  public function __construct()
  {
    $this->pdo = new PDO(self::DSN, self::USER, self::PASS);
  }

  public function pdo()
  {
    return $this->pdo;
  }

  public function orderInsert($user_id, $address, $tell, $payment)
  {
    $st = $this->pdo->prepare("INSERT INTO `order`(`user_id`, `address`, `tell`, `payment`, `created_at`)  VALUES(:user_id, :address, :tell, :payment, CURRENT_TIMESTAMP)");
    

    $st->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $st->bindParam(':address', $address, PDO::PARAM_STR);
    $st->bindParam(':tell', $tell, PDO::PARAM_STR);
    $st->bindParam(':payment', $payment, PDO::PARAM_INT);
    $st->execute();
    return $st;
  }

  public function orderItemInsert($order_items, $order_id): array
  {
    $stmt = [];
    foreach($order_items as $item_id => $amount){
      $stmt[] = $this->pdo->query("INSERT INTO `order_item`(`order_id`, `item_id`, `amount`) VALUES ('$order_id', '$item_id', '$amount')");
    }
    return $stmt;
  }

}
