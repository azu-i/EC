<?php
ini_set('display_errors', "On");

class OrderDao
{
  const DSN = "mysql:host=localhost;dbname=shop;charset=utf8";
  const USER = "root";
  const PASS = "root";
 
  private $pdo;

  public function __construct()
  {
    $this->pdo = new PDO(self::DSN, self::USER, self::PASS);
  }

  public function pdo()
  {
    return $this->pdo;
  }
  
  public function order($user_id, $address, $tell,$payment, $item_id, $amount, $status)
  {
    $st = $this->pdo->prepare("INSERT INTO order_history(user_id,address,tell,payment,item_id,amount,status) VALUES(:user_id, :address, :tell, :payment,:item_id, :amount, :status)");

    $st->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $st->bindParam(':address', $address, PDO::PARAM_STR);
    $st->bindParam(':tell', $tell, PDO::PARAM_STR);
    $st->bindParam(':payment', $payment, PDO::PARAM_STR);
    $st->bindParam(':item_id', $item_id, PDO::PARAM_INT);
    $st->bindParam(':amount', $amount, PDO::PARAM_INT);
    $st->bindParam(':status', $status, PDO::PARAM_STR);

    $st->execute();
   
    return $st;
  }
}