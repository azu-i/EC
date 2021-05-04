<?php
namespace src\domain\order;
class Order
{
  private $userId;
  private $address;
  private $tell;
  private $payment;

  public function __construct(int $userId, string $address, string $tell, string $payment)
  {
    try{
      if (empty($userId)) {
        throw new \Exception('ログインしてください。');
      }
      if (empty($address)) {
        throw new \Exception('住所が未入力です。');
      }
      if (empty($tell)) {
        throw new \Exception('電話番号が未入力です。');
      }
      if (empty($payment)) {
        throw new \Exception('支払い方法が未入力です。');
      }
    } catch (\Exception $e) {
      echo $e->getMessage();
      die;
    }
    $this->userId = $userId;
    $this->address = $address;
    $this->tell = $tell;
    $this->payment = $payment;
  }

  public function userId(): int
  {
    return $this->userId;
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
    $userId = $this->userId;
    $address = $this->address;
    $tell = $this->tell;
    $payment = $this->payment;
    return [$userId, $address, $tell, $payment];
  }
}
