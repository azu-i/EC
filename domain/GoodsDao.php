<?php
require_once 'Price.php';
require_once 'Goods.php';
require_once 'Comment.php';

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

  public function delete(int $id)
  {
    // TODO: bindParamとかで書き直す SQLインジェクション対策
    $st = $this->pdo->prepare("DELETE FROM goods WHERE id = :id");
    $st->bindParam(':id', $id, PDO::PARAM_INT);
    $st->execute();
    return $st;
  }

  public function editUplode(int $id, string $name, int $price, string $comment)
  {
    $goods = $this->newGoods($id, $name, $price, $comment);
    
    $st = $this->pdo->prepare("UPDATE goods SET name='$name', comment='$comment', price=$price WHERE id=$id"); 

  }

  public function findAll(): array
  {
    $st = $this->pdo->query("SELECT * FROM goods");
    $goodsFromTable = $st->fetchAll(PDO::FETCH_ASSOC);
    $goods = $this->convertToGoodsEntities($goodsFromTable);
    return $goods;
  }

  public function selectItem(int $id): Goods
  {
    $st = $this->pdo->query("SELECT * FROM goods WHERE id = $id");
    $row = $st->fetch();

    $goods = $this->newGoods(
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

      $goods[] = $this->newGoods(
        $goodFromTable['id'],
        $goodFromTable['name'],
        $goodFromTable['price'],
        $goodFromTable['comment']
      );
    }
    return $goods;
  }

  private function newGoods(int $id, string $name, int $price, string $comment): Goods
  {
    $price = new Price($price);
    $comment = new Comment($comment);
    $goods = new Goods($id, $name, $price, $comment);
    return $goods;
  }
}
