<?php
require_once ( __DIR__ . '/../domain/products/ProductsFactory.php');
require_once (__DIR__ . '/../domain/cart/CartProductFactory.php');
require_once (__DIR__ . '/../domain/products/QuantityFactory.php');

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
    $this->pdo = new PDO(self::DSN, self::USER, self::PASS);
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
    $products = ProductsFactory::create($id, $name, $price, $comment);
    $id = $products->id();
    $name = $products->name();
    $price = $products->price();
    $comment = $products->comment();
    $table = self::TABLE_PRODUCTS;
    $st = $this->pdo->query("UPDATE $table SET name='$name', comment='$comment', price=$price WHERE id= $id");
    // return $st;
  }

  //商品追加
  public function productInsert($name, $comment, $price): void
  {
    $table = self::TABLE_PRODUCTS;
    $st = $this->pdo->prepare("INSERT INTO $table(name,comment,price) VALUES(:name, :comment, :price)");
    $st->bindParam(':name', $name, PDO::PARAM_STR);
    $st->bindParam(':comment', $comment, PDO::PARAM_STR);
    $st->bindParam(':price', $price, PDO::PARAM_INT);
    $st->execute();
  }

  //登録されている商品を全てデータベースから取ってくる
  public function findAll(): array
  {
    $table = self::TABLE_PRODUCTS;
    $st = $this->pdo()->query("SELECT * FROM $table");
    $productsFromTable = $st->fetchAll(PDO::FETCH_ASSOC);
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


  public function searchCartProducts(array $cart_content, Cart $cart)
  {
    $table = self::TABLE_PRODUCTS; 
    foreach ($cart_content as $id => $num) {
      $st = $this->pdo->prepare("SELECT * FROM $table WHERE id = ?");
      $st->execute(array($id));
      $row = $st->fetch();
      $st->closeCursor();
      $products = ProductsFactory::create($row['id'], $row['name'], $row['price'], $row['comment']);
      $num = QuantityFactory::create(strip_tags($num))->count();
      $cart_products = CartProductFactory::create($products, $num);
      $cart->append_cart_product($cart_products);
    }
    return $cart;
  }

}
