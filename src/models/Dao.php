<?php
namespace src\models;
class Dao
{
  const DSN = "mysql:host=us-cdbr-east-03.cleardb.com;dbname=heroku_f478407332e820c;charset=utf8";
  const USER = "b4d023571f190b";
  const PASS = "b2bbc28a";
  const OPTION = array(
                        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                        \PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
                      );

  private $pdo;

  public function __construct()
  {
    $this->pdo = new \PDO(self::DSN, self::USER, self::PASS, self::OPTION);
  }
}


?>