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
    $st = [];
    foreach ($order_items as $item_id => $amount) {
      $stmt[] = $this->pdo->query("INSERT INTO `order_item`(`order_id`, `item_id`, `amount`) VALUES ('$order_id', '$item_id', '$amount')");
    }
    return $st;
  }

  //orderテーブルとorder_itemテーブルを
  //オーダーのidによって結合する
  private function  orderDataJoin()
  {
    $st = $this->pdo->query("SELECT * FROM `order` INNER JOIN `order_item` ON order.id = order_item.order_id");
    $order_join =
      $st->fetchAll(PDO::FETCH_ASSOC);
    return $order_join;
  }

  public function orderedDataJoinWithItemDate()
  {
    $order_join = $this->orderJoin();
    // var_dump($order_join);
    // die;
    $order_data = [];
    foreach ($order_join as $order_item) {
      $item_id  = $order_item['item_id'];
      $item_st = $this->pdo()->query("SELECT `name`, `price`, `comment` FROM `goods` WHERE id='$item_id'");
      $item_data =
        $item_st->fetchAll(PDO::FETCH_ASSOC);
      $user_id = $order_item['user_id'];
      $user_st = $this->pdo()->query("SELECT `name`, `email` FROM `user` WHERE id='$user_id'");
      $user_data =
        $user_st->fetchAll(PDO::FETCH_ASSOC);
      $order_data[$order_item['id']] = [$order_item, $item_data, $user_data];
    }
    return $order_data;
  }


  public function orderedDataByAuth($auth_id): array
  {
    $order_data = $this->orderDataJoin();
    $auth_order = [];
    foreach ($order_data as $order_items) {
      if ($order_items['user_id'] === $auth_id) {
        $auth_order[$order_items['id']][] = $order_items;
      }
    }
    return $auth_order;
  }
}
