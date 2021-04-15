<?php

require_once (__DIR__ . '/../domain/login_function/User.php');
require_once (__DIR__ . '/../domain/login_function/UserLogin.php');

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
    $this->pdo = new PDO(self::DSN, self::USER, self::PASS);
  }

  public function pdo()
  {
    return $this->pdo;
  }

  public function insert(User $user)
  {
    $table = self::TABLE_USERS;
    [$name, $email, $password] = $user->extractParamsForRegister();
    $sql = "INSERT INTO $table VALUES(NULL, :name, :email, :password, CURRENT_TIMESTAMP)";
    $st = $this->pdo->prepare($sql);
    $st->bindParam(':name', $name, PDO::PARAM_STR);
    $st->bindParam(':email', $email, PDO::PARAM_STR);
    $st->bindParam(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
    $st->execute();
    return $st;
  }

  public function getUserDataByEmail(string $email)
  {
    $table = self::TABLE_USERS;
    $sql =  "SELECT * FROM $table WHERE email = :email";
    $st = $this->pdo->prepare($sql);
    $st->bindParam(':email', $email, PDO::PARAM_STR);
    $st->execute();
    $user_data = $st->fetch();
    return $user_data;
  }

  public function checkUserExistenceByEmail(string $email): bool
  {
    $user_data = $this->getUserDataByEmail($email); 
    if(!empty($user_data)){
      return true;
    }
    return false;
  }

  private function checkPassword($password, $typed_password)
  {
    if (password_verify($password, $typed_password)) {
      //セッションハイジャック対策
      session_regenerate_id(true);
      return true;
    } else{
      return false;
    }
  }

  public function login(UserLogin $user_login): bool
  {
    [$email, $password] = $user_login->extractParamsForLogin();
    $user_data = $this->getUserDataByEmail($email);
    
    if($this->checkUserExistenceByEmail($email) && $this->checkPassword($password, $user_data['password'])){
      return true;
    }else{
      return false;
    }
  }

  public function checkLogin(): bool
  {
    if(isset($_SESSION['login_user']) && $_SESSION['login_user']['id'] > 0){
      return true;
    }
    return false;
  }  

}
