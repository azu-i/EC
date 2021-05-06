<?php
namespace src\models;
require_once (__DIR__ . '/../../vendor/autoload.php');

use src\domain\login_function\User;

ini_set('display_errors', "On");

class UserDao
{
  const DSN = "mysql:host=localhost;dbname=shop;charset=utf8";
  const USER = "root";
  const PASS = "root";
  const TABLE_USERS = "users";
 
  private $pdo;

  public function __construct()
  {
    $this->pdo = new \PDO(self::DSN, self::USER, self::PASS);
  }

  public function pdo()
  {
    return $this->pdo;
  }

  public function insert(User $user)
  {
    $table = self::TABLE_USERS;
    [$name, $email, $password] = $user->extractParamsForRegister();
    $st = $this->pdo->prepare("INSERT INTO $table VALUES(NULL, :name, :email, :password, CURRENT_TIMESTAMP)");
    $st->bindParam(':name', $name, \PDO::PARAM_STR);
    $st->bindParam(':email', $email, \PDO::PARAM_STR);
    $st->bindParam(':password', password_hash($password, PASSWORD_DEFAULT), \PDO::PARAM_STR);
    $st->execute();
  }

  public function getUserDataByEmail($email)
  {
    $table = self::TABLE_USERS;
    $sql =  "SELECT * FROM $table WHERE email = :email";
    $st = $this->pdo->prepare($sql);
    $st->bindParam(':email', $email, \PDO::PARAM_STR);
    $st->execute();
    $userData = $st->fetch();
    return $userData;
  }
}
