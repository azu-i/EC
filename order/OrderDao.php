<?php
ini_set('display_errors', "On");

class OrderDao
{
  const DSN = "mysql:host=localhost;dbname=shop;charset=utf8";
  const USER = "root";
  const PASS = "root";
  const TABLE_ORDER = "`order`";
  const TABLE_ORDER＿PRODUCTS = "`order_item`";
  const TABLE_PRODUCTS = "`goods`";
  const TABLE_USERS =
  "`user`"; 

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
    $table = self::TABLE_ORDER;
    $st = $this->pdo->prepare("INSERT INTO $table(`user_id`, `address`, `tell`, `payment`, `created_at`)  VALUES(:user_id, :address, :tell, :payment, CURRENT_TIMESTAMP)");
    $st->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $st->bindParam(':address', $address, PDO::PARAM_STR);
    $st->bindParam(':tell', $tell, PDO::PARAM_STR);
    $st->bindParam(':payment', $payment, PDO::PARAM_INT);
    $st->execute();
    return $st;
  }

  public function orderItemInsert($order_items, $order_id): array
  {
    $table = self::TABLE_ORDER＿PRODUCTS;
    $st = [];
    foreach ($order_items as $item_id => $amount) {
      $stmt[] = $this->pdo->query("INSERT INTO $table(`order_id`, `item_id`, `amount`) VALUES ('$order_id', '$item_id', '$amount')");
    }
    return $st;
  }

  //orderテーブルとorder_itemテーブルを
  //オーダーのidによって結合する
  private function  orderDataJoin()
  {
    $table_join = self::TABLE_ORDER;
    $table
    = self::TABLE_ORDER＿PRODUCTS;
    $st = $this->pdo->query("SELECT * FROM $table_join INNER JOIN $table ON order.id = order_item.order_id");
    $order_join = $st->fetchAll(PDO::FETCH_ASSOC);
    return $order_join;
  }

  public function orderedDataJoinWithItemDate()
  {
    $order_join = $this->orderDataJoin();
    $table_users =self::TABLE_USERS;
    $table = self::TABLE_PRODUCTS;
    $order_data = [];
    foreach ($order_join as $order_item) {
      $item_id  = $order_item['item_id'];
      $item_st = $this->pdo()->query("SELECT `name`, `price`, `comment` FROM $table WHERE id='$item_id'");
      $item_data = $item_st->fetchAll(PDO::FETCH_ASSOC);
      $user_id = $order_item['user_id'];
      $user_st = $this->pdo()->query("SELECT `name`, `email` FROM $table_users WHERE id='$user_id'");
      $user_data = $user_st->fetchAll(PDO::FETCH_ASSOC);
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
