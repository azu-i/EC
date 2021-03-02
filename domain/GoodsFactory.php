<?php
require_once 'PriceFactory.php';
require_once 'Goods.php';
require_once 'CommentFactory.php';
ini_set('display_errors', "On");

class GoodsFactory
{
  public static function create(int $id, string $name, int $price, string $comment): Goods
  {
    return new Goods(
      $id,
      $name,
      new Price($price),
      CommentFactory::create($comment)
    );
  }
}
