<?php

class Price
{
  private $value;

  public function __construct(int $value)
  {
    if ($value < 0) {
      throw new Exception('金額は0円以上で入力してください');
    }
    $this->value = $value;
  }

  public function value(): int
  {
    return $this->value;
  }

  public function getPriceWithUnit(): string
  {
    return number_format($this->price) . '円';
  }
}