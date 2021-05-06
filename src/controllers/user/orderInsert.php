<?php
namespace src\controllers\user;

require_once (__DIR__ . '/../../../vendor/autoload.php');

use src\domain\order\Order;
use src\models\OrderDao;

ini_set('display_errors', "On");
class OrderInsert
{

  public function __construct(int $authId, string $address, string $tell, int $payment)
  {
    $this->authId = $authId;
    $this->address = $address;
    $this->tell = $tell;
    $this->payment = $payment;
  }

  public function Params(): array
  {
    $order = new Order(
      $this->authId,
      $this->address,
      $this->tell,
      $this->payment
    );
    [$authId, $address, $tell, $payment] = $order->extractParamsForRegister();
    return [$authId, $address, $tell, $payment];
  }

  public function orderInsert(): int
  {
    [$authId, $address, $tell, $payment] = $this->Params();
    $orderDao = new OrderDao();
    $orderDao->orderInsert($authId, $address, $tell, $payment);
    $orderId = $orderDao->pdo()->lastInsertId();
    return $orderId;
  }

  public function orderProductInsert($orderId): void
  {
    $orderDao = new OrderDao();
    $st = $orderDao->orderProductInsert($_SESSION['cart'], $orderId);
  }

  public function paymentDispray()
  {
    if($this->payment == 1) return "コンビニ支払い";
    if ($this->payment == 2) return "現金引き換え";
  }
}
