<?php
ini_set('display_errors', "On");

class OrderHistoryDao
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

  public function orderedDataByUser($auth_id): array
  {
    $st = $this->pdo->query("SELECT * FROM order WHERE user_id = $auth_id");
    $ordered_data = $st->fetchAll(PDO::FETCH_ASSOC);
    return $ordered_data;
  }

  public function  orderedItemsByAuth($auth_id)
  {
    $join_orderd_items = $this->pdo->query("SELECT * FROM order INNER JOIN order_item ON id = order_id");
    $ordered_data = $this->orderedDataByUser($auth_id);
    
  }


}
