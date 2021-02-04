<?php
  require 'domain/Price.php';
  require 'domain/Goods.php';
  require 'common.php';

  $pdo = connect();
  $st = $pdo->query("SELECT * FROM goods");
  $goodsFromTable = $st->fetchAll(PDO::FETCH_ASSOC);

  $goods = [];
  try {
    foreach ($goodsFromTable as $goodFromTable) {
      $price = new Price($goodFromTable['price']);

      $goods[] = new Goods(
        $goodFromTable['id'], 
        $goodFromTable['name'], 
        $price,
        $goodFromTable['comment']
      );
    }
  } catch (Exception $e) {
    echo $e->getMessage();
    die;
  }


  require 't_index.php';
?>