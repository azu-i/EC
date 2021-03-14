<?php
class Purchase
{
  private $name;
  private $address;
  private $tell;
  private $payment;

  public function __construct(string $name, string $address, string $tell, string $payment)
  {
    if (empty($name)) {
      throw new Exception('名前が未入力です。');
    }
    if (empty($address)) {
      throw new Exception('住所が未入力です。');
    }
    if (empty($tell)) {
      throw new Exception('電話番号が未入力です。');
    }
    if (empty($payment)) {
      throw new Exception('支払い方法が未入力です。');
    }
    $this->name = $name;
    $this->address = $address;
    $this->tell = $tell;
    $this->payment = $payment; 
  }

  public function name(): string
  {
    return $this->name;
  }

  public function address(): string
  {
    return $this->address;
  }

  public function tell(): string
  {
    return $this->tell;
  }

  public function payment(): string
  {
    return $this->payment;
  }

}
?>