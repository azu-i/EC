<?php
ini_set('display_errors', "On");

class OrderDao
{
  const DSN = "mysql:host=localhost;dbname=shop;charset=utf8";
  const USER = "root";
  const PASS = "root";
  const TABLE_ORDER = "`order`";
  const TABLE_ORDER＿PRODUCTS = "`order_products`";
  const TABLE_PRODUCTS = "`products`";
  const TABLE_USERS =
  "`users`";

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

  public function orderProductInsert($order_products, $order_id): array
  {
    $table = self::TABLE_ORDER＿PRODUCTS;
    $st = [];
    foreach ($order_products as $product_id => $amount) {
      $stmt[] = $this->pdo->query("INSERT INTO $table(`order_id`, `product_id`, `amount`) VALUES ('$order_id', '$product_id', '$amount')");
    }
    return $st;
  }

  //orderテーブルとorder_productsテーブルを
  //オーダーのidによって結合する
  private function  orderDataJoin(): array
  {
    $table_join = self::TABLE_ORDER;
    $table
      = self::TABLE_ORDER＿PRODUCTS;
    $st = $this->pdo->query("SELECT * FROM $table_join INNER JOIN $table ON order.id = order_products.order_id");
    $order_join = $st->fetchAll(PDO::FETCH_ASSOC);
    return $order_join;
  }

  public function orderedDataWithUserAndProductData(): array
  {
    $order_join = $this->orderDataJoin();
    $table_users = self::TABLE_USERS;
    $table = self::TABLE_PRODUCTS;
    $order_data = [];
    foreach ($order_join as $order_products) {
      $product_id  = $order_products['product_id'];
      $product_st = $this->pdo()->query("SELECT `name`, `price`, `comment` FROM $table WHERE id=$product_id");
      $product_data = $product_st->fetch();
      $user_id = $order_products['user_id'];
      $user_st = $this->pdo()->query("SELECT `name`, `email` FROM $table_users WHERE id='$user_id'");
      $user_data = $user_st->fetch();
      $order_data[$order_products['order_id']][] = [$order_products, $user_data, $product_data];
    }
    return $order_data;
  }

  public function orderedDataWithProductData(): array
  {
    $order_join = $this->orderDataJoin();
    $table = self::TABLE_PRODUCTS;
    $order_data = [];
    foreach ($order_join as $order_products) {
      $product_id  = $order_products['product_id'];
      $product_st = $this->pdo()->query("SELECT `name`, `price`, `comment` FROM $table WHERE id=$product_id");
      $product_data = $product_st->fetch();
      $order_data[$order_products['order_id']]['order_basedata'] = $order_products;
      $product_data = array_merge($product_data, array('amount' => $order_products['amount']));
      $product_data = array_merge($product_data, array('order_date' => $order_products['created_at']));
      $order_data[$order_products['order_id']][] =
      $product_data;
    }
    return $order_data;
  }

 //ログインユーザーの注文履歴を配列に入れる
  private function orderedDataByAuth($auth_id): array
  {
    $order_data = $this->orderedDataWithProductData();
    $auth_order = [];
    foreach ($order_data as $order_info) {
      if ($order_info["order_basedata"]['user_id'] === $auth_id) {        
        $order_id = $order_info["order_basedata"]['order_id'];
        $auth_order[$order_id][] = $order_info;
      }
    }
    return $auth_order;
  }

  public function makeOrderedDataList($auth_id)
  {
    $auth_order_products = $this->orderedDataByAuth($auth_id);
    $auth_order_lists = [];
    foreach ($auth_order_products as $auth_order_product) {
      foreach ($auth_order_product as $auth_orders) {
        $order_time[] = $auth_orders["order_basedata"]["created_at"];
        unset($auth_orders["order_basedata"]);
        $auth_order_lists[] = $auth_orders;
      }
    }
    return $auth_order_lists;
  }
}
