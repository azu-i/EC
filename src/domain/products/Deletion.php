<?php
namespace src\domain\products; 
class Deletion
{
  private $id;
  private $pdo;

  const TABLE_PRODUCTS = "products";

  public function __construct($id, $pdo)
  {
    $this->id = $id;
    $this->pdo = $pdo;
  }

  public function delete()
  {
    $table = self::TABLE_PRODUCTS;
    $st = $this->pdo->query("DELETE FROM $table WHERE id={$this->id}");
    return $st;
  }
}
