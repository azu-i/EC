<?php
require_once 'User.php';
require_once 'UserLogin.php';

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

  private function getUserDataByEmail(string $email): array
  {
    $sql =  "SELECT * FROM user WHERE email = :email";
    $st = $this->pdo->prepare($sql);
    $st->bindParam(':email', $email, PDO::PARAM_STR);
    $st->execute();
    $user_data = $st->fetch();
    return $user_data;
  }

  private function checkUserExistenceByEmail(string $email): bool
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
    // var_dump($user_data);
    // die;
    if($this->checkUserExistenceByEmail($email) && $this->checkPassword($password, $user_data['password'])){
      return true;
    }else{
      return false;
    }

  }

  
}
