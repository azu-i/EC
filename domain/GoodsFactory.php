<?php
require_once 'domain/PriceFactory.php';
require_once 'domain/Goods.php';
require_once 'domain/CommentFactory.php';
ini_set('display_errors', "On");

class GoodsFactory
{
  public static function create(int $id, string $name, int $price, string $comment): Goods
  {
    return new Goods(
      $id,
      $name,
      PriceFactory::create($price),
      CommentFactory::create($comment)
    );
  }
}
