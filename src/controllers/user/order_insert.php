<?php
namespace src\controllers\user;
ini_set('display_errors', "On");
require_once(__DIR__ . '/../../domain/order/Order.php');
require_once(__DIR__ . '/../../models/OrderDao.php');
require_once(__DIR__ . '/../../models/UserDao.php');

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

  public function orderInsert(): void
  {
    [$authId, $address, $tell, $payment] = $this->Params();
    $orderDao = new OrderDao();
    $st = $orderDao->orderInsert($authId, $address, $tell, $payment);
  }

  public function orderProductInsert(): void
  {
    $orderDao = new OrderDao();
    $orderId = $orderDao->pdo()->lastInsertId();
    $st = $orderDao->orderProductInsert($_SESSION['cart'], $orderId);
  }

  public function paymentDispray()
  {
    if($this->payment == 1) return "コンビニ支払い";
    if ($this->payment == 2) return "現金引き換え";
  }
}
