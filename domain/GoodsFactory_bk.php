<?php
class GoodsFactory_bk
{
  public static function create()
  {
    return new Cart();
  }

  public static function cartItem(Goods $goods, Quantity $quantity)
  {
    return new CartItem($goods, $quantity);
  }

  public static function comment(string $detail)
  {
    return new Comment($detail);
  }

  public static function deletion($id, $pdo)
  {
    return new Deletion($id, $pdo);
  }

  public static function goods(int $id, string $name, Price $price, Comment $comment)
  {
    return new Goods($id, $name, $price, $comment);
  }
  public static function goodsDao()
  {
    return new GoodsDao();
  }

  public static function price(int $value)
  {
    return new Price($value);
  }

  public static function purchase(string $name, string $address, int $tell, string $payment)
  {
    return new Purchase($name, $address, $tell, $payment);
  }

  public static function quantity(int $count)
  {
    return new Quantity($count);
  }
}
