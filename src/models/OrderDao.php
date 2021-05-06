<?php
namespace src\models;
ini_set('display_errors', "On");

class OrderDao
{
  const DSN = "mysql:host=localhost;dbname=shop;charset=utf8";
  const USER = "root";
  const PASS = "root";
  const TABLE_ORDER = "order";
  const TABLE_ORDER＿PRODUCTS = "order_products";
  const TABLE_PRODUCTS = "products";
  const TABLE_USERS = "users";

  private $pdo;

  public function __construct()
  {
    $this->pdo = new \PDO(self::DSN, self::USER, self::PASS);
  }

  public function pdo()
  {
    return $this->pdo;
  }

  public function orderInsert(int $userId, string $address, string $tell, int $payment): void
  {
    $table = self::TABLE_ORDER;
    $st = $this->pdo->prepare("INSERT INTO `$table`(`user_id`, `address`, `tell`, `payment`, `created_at`)  VALUES(:user_id, :address, :tell, :payment, CURRENT_TIMESTAMP)");
    $st->bindParam(':user_id', $userId, \PDO::PARAM_INT);
    $st->bindParam(':address', $address, \PDO::PARAM_STR);
    $st->bindParam(':tell', $tell, \PDO::PARAM_STR);
    $st->bindParam(':payment', $payment, \PDO::PARAM_INT);
    $st->execute();
  }

  public function orderProductInsert($orderProducts, $orderId): void
  {
    $table = self::TABLE_ORDER＿PRODUCTS;
    foreach ($orderProducts as $productId => $amount) {
      $st = $this->pdo->query("INSERT INTO `$table`(`order_id`, `product_id`, `amount`) VALUES ('$orderId', '$productId', '$amount')");
    }
  }

  //orderテーブルとorder_productsテーブルを
  //オーダーのidによって結合する
  public function  orderDataJoin(): array
  {
    $tableOrder = self::TABLE_ORDER;
    $tableOrderProducts
      = self::TABLE_ORDER＿PRODUCTS;
    $tableUser = self::TABLE_USERS;
    $st = $this->pdo->query("SELECT * FROM `$tableOrder` INNER JOIN `$tableOrderProducts` ON $tableOrder.id = $tableOrderProducts.order_id INNER JOIN `$tableUser` ON $tableOrder.user_id = $tableUser.id");
    $orderJoin = $st->fetchAll(\PDO::FETCH_ASSOC);
    return $orderJoin;
  }
  
  //購入履歴の配列に商品情報を追加
  public function ProductDataByProductId(): array
  {
    $orderJoin = $this->orderDataJoin();
    $productsData = [];
    $table = self::TABLE_PRODUCTS;
    foreach ($orderJoin as $orderProducts) {
      $productId  = $orderProducts['product_id'];
      $product_st = $this->pdo()->query("SELECT `name`, `price` FROM `$table` WHERE id=$productId");
      $productsData[] = $product_st->fetch();
    }
    return $productsData;
  }
}
