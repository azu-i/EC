<?php

class Quantity
{
  private $count;

  public function __construct(int $count)
  {
    if ($count < 0) {
      throw new Exception('個数は0以上で入力してください');
    }
    $this->count = $count;
  }

  public function count(): int
  {
    return $this->count;
  }
}
