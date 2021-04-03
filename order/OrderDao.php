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

  public function orderedDataJoinWithProducDate(): array
  {
    $order_join = $this->orderDataJoin();
    $table_users =self::TABLE_USERS;
    $table = self::TABLE_PRODUCTS;
    $order_data = [];
    foreach ($order_join as $order_products) {
      $product_id  = $order_products['product_id'];
      $product_st = $this->pdo()->query("SELECT `name`, `price`, `comment` FROM $table WHERE id='$product_id'");
      $product_data = $product_st->fetchAll(PDO::FETCH_ASSOC);
      $user_id = $order_products['user_id'];
      $user_st = $this->pdo()->query("SELECT `name`, `email` FROM $table_users WHERE id='$user_id'");
      $user_data = $user_st->fetchAll(PDO::FETCH_ASSOC);
      $order_data[$order_products['id']] = [$order_products, $product_data, $user_data];
    }
    return $order_data;
  }


  public function orderedDataByAuth($auth_id): array
  {
    $order_data = $this->orderDataJoin();
    $auth_order = [];
    foreach ($order_data as $order_products) {
      if ($order_products['user_id'] === $auth_id) {
        $auth_order[$order_products['id']][] = $order_products;
      }
    }
    return $auth_order;
  }
}
