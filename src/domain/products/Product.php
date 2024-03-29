<?php

namespace src\domain\products;

class Product
{
  private $id;
  private $name;
  private $price;
  private $comment;

  public function __construct(ProductId $id, string $name, Price $price, Comment $comment)
  {
    // try {
    //   if (empty($name)) {
    //     throw new \Exception('商品名が空です。');
    //   }
    // } catch (\Exception $e) {
    //   echo $e->getMessage();
    //   die;
    // }
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
    $this->comment = $comment;
  }

  public function id(): ProductId
  {
    return $this->id;
  }

  public function name(): string
  {
    return $this->name;
  }

  public function price(): int
  {
    return $this->price->value();
  }

  public function getPriceWithUnit(): string
  {
    return number_format($this->price->value()) . '円';
  }

  public function comment(): string
  {
    return $this->comment->detail();
  }
}
