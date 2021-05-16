<?php
namespace src\controllers\user;
require_once(__DIR__ . '/../../../vendor/autoload.php');

use src\auth\Auth;
use src\models\OrderDao;

// ini_set('display_errors', "On");

class OrderHistory
{

  public function orderList()
  {
    $orderDao = new OrderDao();
    $orderData = $orderDao->orderDataJoin();
    $productsData = $orderDao->ProductDataByProductId();
    return [$orderData, $productsData];
  }

  public function AuthOrderList()
  {
    $auth = new Auth();
    $authId = $auth->id();
    [$orderData, $productsData] = $this->orderList();
    $AuthOrderData = [];
    $AuthProductsData = [];
    for($i = 0; $i < count($orderData); $i++){
      if($orderData[$i]['user_id'] == $authId){
        $AuthOrderData[] = $orderData[$i];
        $AuthProductsData[] = $productsData[$i];
      }
    }
    return [$AuthOrderData, $AuthProductsData];
  }
}
