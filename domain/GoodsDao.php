<?php
require_once 'GoodsFactory.php';
require_once 'CartItemFactory.php';
require_once 'QuantityFactory.php';
ini_set('display_errors', "On");

class GoodsDao
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

  //登録している商品の削除
  public function delete(int $id)
  {
    // TODO: bindParamとかで書き直す SQLインジェクション対策
    $st = $this->pdo->prepare("DELETE FROM goods WHERE id = :id");
    $st->bindParam(':id', $id, PDO::PARAM_INT);
    $st->execute();
    return $st;
  }

  //商品情報編集
  public function editUplode(int $id, string $name, int $price, string $comment)
  {
    $goods = GoodsFactory::create($id, $name, $price, $comment);
    $id = $goods->id();
    $name = $goods->name();
    $price = $goods->price();
    $comment = $goods->comment();
    $st = $this->pdo->query("UPDATE goods SET name='$name', comment='$comment', price=$price WHERE id= $id");

    return $st;
  }

  //商品追加
  public function goodInsert($name, $comment, $price)
  {
    $st = $this->pdo->prepare("INSERT INTO goods(name,comment,price) VALUES(:name, :comment, :price)");
    $st->bindParam(':name', $name, PDO::PARAM_STR);
    $st->bindParam(':comment', $comment, PDO::PARAM_STR);
    $st->bindParam(':price', $price, PDO::PARAM_INT);

    $st->execute();
    return $st;
  }

  //登録されている商品を全てデータベースから取ってくる
  public function findAll(): array
  {
    $st = $this->pdo()->query("SELECT * FROM goods");
    $goodsFromTable = $st->fetchAll(PDO::FETCH_ASSOC);
    $goods = $this->convertToGoodsEntities($goodsFromTable);
    return $goods;
  }
  

  public function selectItem(int $id): Goods
  {
    $st = $this->pdo->query("SELECT * FROM goods WHERE id = $id");
    $row = $st->fetch();

    $goods = GoodsFactory::create(
      $id,
      $row['name'],
      $row['price'],
      $row['comment'],
    );
    return $goods;
  }

  private function convertToGoodsEntities(array $goodsFromTable): array
  {
    $goods = [];
    foreach ($goodsFromTable as $goodFromTable) {

      $goods[] = GoodsFactory::create(
        $goodFromTable['id'],
        $goodFromTable['name'],
        $goodFromTable['price'],
        $goodFromTable['comment']
      );
    }
    return $goods;
  }

  public function searchCartItems(array $cart_content, Cart $cart)
  {

    foreach ($cart_content as $id => $num) {
      $st = $this->pdo->prepare("SELECT * FROM goods WHERE id = ?");
      $st->execute(array($id));
      $row = $st->fetch();
      $st->closeCursor();
      $goods = GoodsFactory::create($row['id'], $row['name'], $row['price'], $row['comment']);
      $num = QuantityFactory::create( strip_tags($num))->count();
      $cart_item = CartItemFactory::create($goods, $num);

      $cart->append_cart_item($cart_item);
      return $cart;
    }
  }
}
