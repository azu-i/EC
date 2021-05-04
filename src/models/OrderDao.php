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

  public function orderInsert($user_id, $address, $tell, $payment): void
  {
    $table = self::TABLE_ORDER;
    $st = $this->pdo->prepare("INSERT INTO `$table`(`user_id`, `address`, `tell`, `payment`, `created_at`)  VALUES(:user_id, :address, :tell, :payment, CURRENT_TIMESTAMP)");
    $st->bindParam(':user_id', $user_id, \PDO::PARAM_INT);
    $st->bindParam(':address', $address, \PDO::PARAM_STR);
    $st->bindParam(':tell', $tell, \PDO::PARAM_STR);
    $st->bindParam(':payment', $payment, \PDO::PARAM_INT);
    $st->execute();
  }

  public function orderProductInsert($orderProducts, $orderId): void
  {
    $table = self::TABLE_ORDER＿PRODUCTS;
    foreach ($orderProducts as $productId => $amount) {
      $stmt[] = $this->pdo->query("INSERT INTO `$table`(`order_id`, `product_id`, `amount`) VALUES ('$orderId', '$productId', '$amount')");
    }
  }

  //orderテーブルとorder_productsテーブルを
  //オーダーのidによって結合する
  private function  orderDataJoin(): array
  {
    $tableOrder = self::TABLE_ORDER;
    $tableOrderProducts
      = self::TABLE_ORDER＿PRODUCTS;
    $st = $this->pdo->query("SELECT * FROM `$tableOrder` INNER JOIN `$tableOrderProducts` ON $tableOrder.id = $tableOrderProducts.order_id");
    $orderJoin = $st->fetchAll(\PDO::FETCH_ASSOC);
    return $orderJoin;
  }

  //購入履歴の配列にユーザー情報と商品情報を追加
  public function orderedDataWithUserAndProductData(): array
  {
    $orderJoin = $this->orderDataJoin();
    $tableUsers = self::TABLE_USERS;
    $tableProducts = self::TABLE_PRODUCTS;
    $orderData = [];
    foreach ($orderJoin as $orderProducts) {
      $productId  = $orderProducts['product_id'];
      $st = $this->pdo()->query("SELECT `name`, `price`, `comment` FROM `$tableProducts` WHERE id=$productId");
      $productData = $st->fetch();
      $userId = $orderProducts['user_id'];
      $user_st = $this->pdo()->query("SELECT `name`, `email` FROM `$tableUsers` WHERE id='$userId'");
      $userData = $user_st->fetch();
      $orderProduct = array_merge($orderProducts, $userData);
      $orderProduct = array_merge($orderProduct, array('user_name' => $userData['name']));
      $orderProduct = array_merge($orderProduct, $productData);
      $orderData[$orderProducts['order_id']][] = $orderProduct;
    }
    return $orderData;
  }
  
  //購入履歴の配列に商品情報を追加
  public function orderedDataWithProductData(): array
  {
    $orderJoin = $this->orderDataJoin();
    $table = self::TABLE_PRODUCTS;
    $orderData = [];
    foreach ($orderJoin as $orderProducts) {
      $productId  = $orderProducts['product_id'];
      $product_st = $this->pdo()->query("SELECT `name`, `price`, `comment` FROM `$table` WHERE id=$productId");
      $productData = $product_st->fetch();
      $orderData[$orderProducts['order_id']]['order_basedata'] = $orderProducts;
      $productData = array_merge($productData, array('amount' => $orderProducts['amount']));
      $productData = array_merge($productData, array('order_date' => $orderProducts['created_at']));
      $orderData[$orderProducts['order_id']][] =
      $productData;
    }
    return $orderData;
  }

 //ログインユーザーの注文履歴を配列に入れる
  private function orderedDataByAuth(int $authId): array
  {
    $orderData = $this->orderedDataWithProductData();
    $authOrder = [];
    foreach ($orderData as $orderInfo) {
      if ($orderInfo["order_basedata"]['user_id'] === $authId) {        
        $orderId = $orderInfo["order_basedata"]['order_id'];
        $authOrder[$orderId][] = $orderInfo;
      }
    }
    return $authOrder;
  }

  public function makeOrderedDataList(int $authId)
  {
    $authOrderProducts = $this->orderedDataByAuth($authId);
    $authOrderLists = [];
    foreach ($authOrderProducts as $authOrderProduct) {
      foreach ($authOrderProduct as $authOrders) {
        $orderTime[] = $authOrders["order_basedata"]["created_at"];
        unset($authOrders["order_basedata"]);
        $authOrderLists[] = $authOrders;
      }
    }
    return $authOrderLists;
  }
}
