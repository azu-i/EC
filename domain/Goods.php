<?php

class Goods
{
  private $id;
  private $name;
  private $price;
  private $comment;

  public function __construct(int $id, string $name, Price $price, Comment $comment)
  {
    if (empty($id)) {
      throw new Exception('IDが不適切です。');
    }
    if (empty($name)) {
      throw new Exception('商品名が空です。');
      
    }
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
    $this->comment = $comment;
  }

  public function id(): int
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