<?php
namespace src\controllers\login_function;

// session_start();
// require_once(__DIR__ . '/../../models/UserDao.php');
// require_once(__DIR__ . '/../../domain/login_function/UserLogin.php');
require_once (__DIR__ . '/../../../vendor/autoload.php');
use src\models\UserDao;
use src\domain\login_function\UserLogin;

class Login
{
  public function __construct(string $email, string $password)
  {
    $this->email = $email;
    $this->password = $password;
  }

  public function countError(): array
  {
    $userLogin = new UserLogin($this->email, $this->password);
    $userDao = new UserDao();
    $errorMessage = $userLogin->countError();
    $loginResult = $userDao->login($userLogin);
    if ($userDao->checkUserExistenceByEmail($this->email) == false) {
      $errorMessage['email'] = "入力したメールアドレスは登録されていません";
    }elseif($loginResult == false){
      $errorMessage['password'] = "パスワードが一致しません";
    }
    return $errorMessage;
  }

  public function userData()
  {
    $userDao = new UserDao();
    $loginUserData = $userDao->getUserDataByEmail($this->email);
    return $loginUserData;
  }
}
