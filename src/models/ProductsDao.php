<?php
namespace src\models;

require_once (__DIR__ . '/../../vendor/autoload.php');

use src\domain\products\ProductId;

ini_set('display_errors', "On");

class ProductsDao
{
  const DSN = "mysql:host=localhost;dbname=shop;charset=utf8";
  const USER = "root";
  const PASS = "root";
  const TABLE_PRODUCTS = "products";
  const TABLE_BROWING_HITORIES = "`browing_histories`";

  private $pdo;

  public function __construct()
  {
    $this->pdo = new \PDO(self::DSN, self::USER, self::PASS);
  }

  // pdoのgetter
  public function pdo()
  {
    return $this->pdo;
  }
 
  //登録している商品の削除
  public function delete()
  {
    $table = self::TABLE_PRODUCTS;
    $st = $this->pdo->prepare("DELETE FROM $table WHERE id = :id");
    return $st;
  }

  //商品情報編集
  public function editUplode(int $id, string $name, int $price, string $comment): void
  {
    $table = self::TABLE_PRODUCTS;
    $st = $this->pdo->query("UPDATE $table SET name='$name', comment='$comment', price=$price WHERE id= $id");
  }

  //商品追加
  public function productInsert($name, $comment, $price)
  {
    $table = self::TABLE_PRODUCTS;
    $st = $this->pdo->prepare("INSERT INTO $table(name,comment,price) VALUES(:name, :comment, :price)");
    $st->bindParam(':name', $name, \PDO::PARAM_STR);
    $st->bindParam(':comment', $comment, \PDO::PARAM_STR);
    $st->bindParam(':price', $price, \PDO::PARAM_INT);
    $st->execute();
  }

  //登録されている商品を全てデータベースから取ってくる
  public function findAll(): array
  {
    $table = self::TABLE_PRODUCTS;
    $st = $this->pdo()->query("SELECT * FROM $table");
    $productsFromTable = $st->fetchAll(\PDO::FETCH_ASSOC);
    return $productsFromTable;
  }
  
 
  public function selectProduct(ProductId $productId): array
  {
    $table = self::TABLE_PRODUCTS;
    $id = $productId->value();
    $st = $this->pdo->query("SELECT * FROM $table WHERE id = $id");
    $product = $st->fetch();
    return $product;
  }


  public function searchCartProducts(array $cartContent)
  {
    $table = self::TABLE_PRODUCTS; 
    $productsData = [];
    $num = [];
    foreach ($cartContent as $id => $cartNum) {
      $st = $this->pdo->prepare("SELECT * FROM $table WHERE id = ?");
      $st->execute(array($id));
      $product = $st->fetch();
      $st->closeCursor();
      $productsData[] = $product;
      $num[] = $cartNum;
    }
    return [$productsData, $num];
  }

}
