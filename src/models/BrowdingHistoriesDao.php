<?php
namespace src\models;
class browdingHistoriesDao
{
  const DSN = "mysql:host=localhost;dbname=shop;charset=utf8";
  const USER = "root";
  const PASS = "root";
  const TABLE_PRODUCTS = "products";
  const TABLE_BROWING_HISTORIES = "browing_histories";

  private $pdo;

  public function __construct()
  {
    $this->pdo = new \PDO(self::DSN, self::USER, self::PASS);
  }

  public function pdo()
  {
    return $this->pdo;
  }

  public function browdingHistoriesInsert(int $product_id, int $auth_id)
  {
    $table = self::TABLE_BROWING_HISTORIES;
    $st = $this->pdo->query("INSERT INTO `$table`(`product_id`, `user_id`) VALUES ($product_id, $auth_id)");
    return $st;
  }

  public function tableJoin(): array
  {
    $table_browding_histories = self::TABLE_BROWING_HISTORIES;
    $table_products = self::TABLE_PRODUCTS;
    $st = $this->pdo->query("SELECT * FROM `$table_browding_histories` INNER JOIN `$table_products` ON browing_histories.product_id = products.id");
    $browding_histories = $st->fetchAll(\PDO::FETCH_ASSOC);
    return $browding_histories;
  }

  public function searchbrowdingHistoriesByAuth(int $auth_id): array
  {
    $auth_id = 
    $browding_histories = $this->tableJoin();
    $auth_browding_histories = [];
    foreach($browding_histories as $browding_history){
      if($browding_history['user_id'] == $auth_id) $auth_browding_histories[$browding_history['product_id']] = $browding_history;
    }
    if(count($auth_browding_histories) > 5){
      $reverse_browding_histories = array_reverse($auth_browding_histories);
      $auth_browding_histories = array_slice($reverse_browding_histories, 0, 5);
      return $auth_browding_histories;
    }
    return array_reverse($auth_browding_histories);
  }
}