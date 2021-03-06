<?php
require_once 'User.php';

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
    $sql = "INSERT INTO user VALUES(NULL, :name, :email, :password, CURRENT_TIMESTAMP)";
    $st = $this->pdo->prepare($sql);
    $st->bindParam(':name', $name, PDO::PARAM_STR);
    $st->bindParam(':email', $email, PDO::PARAM_STR);
    $st->bindParam(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
    $st->execute();
    return $st;
  }

  public function login(string $email, string $password)
  {
    $select = "SELECT * FROM members WHERE mail = '$email' AND pass = '$password'";
    $search_account = $this->pdo->query($select);
    $search_account->execute();
    
  }

  
}
