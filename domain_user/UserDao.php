<?php
require_once './User.php';

ini_set('display_errors', "On");

class UserDao
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

  public function insert(User $user)
  {
    [$name, $email, $password] = $user->extractParamsForRegister();
    $sql = "INSERT INTO user VALUES(NULL, '$name', '$email', '$password', CURRENT_TIMESTAMP)";
    var_dump($sql);
    $this->pdo->query($sql);
  }

  
}
