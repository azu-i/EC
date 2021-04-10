<?php
class Order
{
  private $user_id;
  private $address;
  private $tell;
  private $payment;

  public function __construct(int $user_id, string $address, string $tell, string $payment)
  {
    try{
      if (empty($user_id)) {
        throw new Exception('ログインしてください。');
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
    } catch (Exception $e) {
      echo $e->getMessage();
      die;
    }
    $this->user_id = $user_id;
    $this->address = $address;
    $this->tell = $tell;
    $this->payment = $payment;
  }

  public function user_id(): int
  {
    return $this->user_id;
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

  public function extractParamsForRegister(): array
  {
    $user_id = $this->user_id;
    $address = $this->address;
    $tell = $this->tell;
    $payment = $this->payment;
    return [$user_id, $address, $tell, $payment];
  }
}
