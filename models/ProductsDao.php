<?php
require_once 'domain//ProductsFactory.php';
require_once 'domain/CartProductFactory.php';
require_once 'domain/QuantityFactory.php';
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

  public function pdo()
  {
    return $this->pdo;
  }

  //登録している商品の削除
  public function delete(int $id)
  {
    // TODO: bindParamとかで書き直す SQLインジェクション対策
    $table = self::TABLE_PRODUCTS;
    $st = $this->pdo->prepare("DELETE FROM $table WHERE id = :id");
    $st->bindParam(':id', $id, PDO::PARAM_INT);
    $st->execute();
    return $st;
  }

  //商品情報編集
  public function editUplode(int $id, string $name, int $price, string $comment)
  {
    $products = ProductsFactory::create($id, $name, $price, $comment);
    $id = $products->id();
    $name = $products->name();
    $price = $products->price();
    $comment = $products->comment();
    $table = self::TABLE_PRODUCTS;
    $st = $this->pdo->query("UPDATE $table SET name='$name', comment='$comment', price=$price WHERE id= $id");

    return $st;
  }

  //商品追加
  public function productInsert($name, $comment, $price)
  {
    $table = self::TABLE_PRODUCTS;
    $st = $this->pdo->prepare("INSERT INTO $table(name,comment,price) VALUES(:name, :comment, :price)");
    $st->bindParam(':name', $name, PDO::PARAM_STR);
    $st->bindParam(':comment', $comment, PDO::PARAM_STR);
    $st->bindParam(':price', $price, PDO::PARAM_INT);
    $st->execute();
    return $st;
  }

  //登録されている商品を全てデータベースから取ってくる
  public function findAll(): array
  {
    $table = self::TABLE_PRODUCTS;
    $st = $this->pdo()->query("SELECT * FROM $table");
    $productsFromTable = $st->fetchAll(PDO::FETCH_ASSOC);
    $products = $this->convertToProductsEntities($productsFromTable);
    return $products;
  }
  

  public function selectProduct(int $id): Products
  {
    $table = self::TABLE_PRODUCTS;
    $st = $this->pdo->query("SELECT * FROM $table WHERE id = $id");
    $row = $st->fetch();

    $products = ProductsFactory::create(
      $id,
      $row['name'],
      $row['price'],
      $row['comment'],
    );
    return $products;
  }

  private function convertToProductsEntities(array $productsFromTable): array
  {
    $products = [];
    foreach ($productsFromTable as $productFromTable) {

      $products[] = ProductsFactory::create(
        $productFromTable['id'],
        $productFromTable['name'],
        $productFromTable['price'],
        $productFromTable['comment']
      );
    }
    return $products;
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

  public function browdingHistoriesInsert($product_id)
  {
    $table = self::TABLE_BROWING_HITORIES;
    $st = $this->pdo->query("INSERT INTO (`product_id`) VALUES ($product_id)");
    return $st;
  }
}
