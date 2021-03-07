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

  private function getUserByEmail(string $email)
  {
    $sql =  "SELECT * FROM user WHERE email = ?";
    $array_email = [];
    $array_email[] = $email;
    $result = 'false';
   
    try{
      $st = $this->pdo->prepare($sql);
      $st->execute($array_email);
      $user_data = $st->fetch();
      return $user_data;
    }catch(\Exception $e){
      return $result;
    }
  }

  public function login(UserLogin $user_login)
  {
    [$email, $password] = $user_login->extractParamsForLogin();
    $user_data = $this->getUserByEmail($email);

    $result = false;
    if(password_verify($password, $user_data['password'])){
      //セッションハイジャック対策
      session_regenerate_id(true);
      $_SESSION['login_user'] = $user_data;
      $result = true;
      return $result;
    }
  }

  
}
