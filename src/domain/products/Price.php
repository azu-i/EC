<?php

namespace src\domain\products;

class Price
{
  private $value;

  public function __construct($value)
  {
    try {
      if ($value < 0 || empty($value)) {
        throw new \Exception('金額は0円以上で入力してください');
      }
    } catch (\Exception $e) {
      echo $e->getMessage();
      die;
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
