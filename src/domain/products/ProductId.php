<?php

class ProductId
{
  private $value;

  public function __construct(int $value)
  {
    if ($value < 0) {
      throw new Exception('IDは0以上で入力してください');
    }
    $this->value = $value;
  }

  public function value(): int
  {
    return $this->value;
  }
}
