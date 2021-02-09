<?php
class AdminGoods
{
  private $name;
  private $comment;
  private $price;

  public function __construct(string $name, Comment $comment, Price $price)
  {
    if (empty($name)) {
      throw new Exception('足りていないパラメーターがあります');
    }
    $this->name = $name;
    $this->comment = $comment;
    $this->price = $price;
  }

  public function name(): string
  {
    return $this->name;
  }
  public function comment(): string
  {
    return $this->comment->detail();
  }
  public function price(): int
  {
    return $this->price->value();
  }
}
