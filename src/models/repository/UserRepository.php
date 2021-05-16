<?php
namespace src\models\repository;

require_once (__DIR__ . '/../../../vendor/autoload.php');
use src\models\UserDao;
use src\domain\login_function\UserLogin;

// ini_set('display_errors', "On");

class UserRepository implements UserRepositoryInterface
{
  private UserDao $UserDao;
 
  public function __construct()
  {
    $this->UserDao = new UserDao();
  }

  public function checkUserExistenceByEmail(string $email): bool
  {
    $userData = $this->UserDao->getUserDataByEmail($email);
    if (!empty($userData)) {
      return true;
    }
    return false;
  }
  public function checkPassword(string $password, string $typedPassword): bool
  {
    if (password_verify($password, $typedPassword)) {
      //セッションハイジャック対策
      session_regenerate_id(true);
      return true;
    } else {
      return false;
    }
  }

  public function login(UserLogin $userLogin): bool
  {
    [$email, $password] = $userLogin->extractParamsForLogin();
    $userData = $this->UserDao->getUserDataByEmail($email);
    if($this->checkUserExistenceByEmail($email) && $this->checkPassword($password, $userData['password'])){
      return true;
    }else{
      return false;
    }
  }

  public function checkLogin(): bool
  {
    if (isset($_SESSION['loginUser']) && $_SESSION['loginUser']['id'] > 0) {
      return true;
    }
    return false;
  }
}
