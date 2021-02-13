<?php
ini_set('display_errors', "On");

require '../domain/Price.php';
require '../domain/Goods.php';
require '../domain/Comment.php';
require '../domain/DAO.php';

$dao = new DAO();
$pdo = $dao->connect();
$st = $pdo->query("SELECT * FROM goods");
$goodsFromTable = $st->fetchAll(PDO::FETCH_ASSOC);

$goods = [];
try {
  foreach ($goodsFromTable as $goodFromTable) {
    $price = new Price($goodFromTable['price']);
    $comment = new Comment($goodFromTable['comment']);

    $goods[] = new Goods(
      $goodFromTable['id'],
      $goodFromTable['name'],
      $price,
      $comment
    );
  }
} catch (Exception $e) {
  echo $e->getMessage();
  die;
}
require 't_index.php';
?>