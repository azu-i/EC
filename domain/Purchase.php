<?php
class Purchase
{
  private $name;
  private $address;
  private $tel;
  private $payment;

  public function __construct(string $name, string $address, int $tel, string $payment)
  {
    if (empty($name)) {
      throw new Exception('名前が未入力です。');
    }
    if (empty($address)) {
      throw new Exception('住所が未入力です。');
    }
    if (empty($tel)) {
      throw new Exception('電話番号が未入力です。');
    }
    if (empty($payment)) {
      throw new Exception('支払い方法が未入力です。');
    }
    $this->name = $name;
    $this->address = $address;
    $this->tel = $tel;
    $this->payment = $payment; 
  }

  public function name()
  {
    return $this->name;
  }

  public function address()
  {
    return $this->address;
  }

  public function tel()
  {
    return $this->tel;
  }

  public function payment()
  {
    return $this->payment;
  }

}
?>