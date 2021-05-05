<?php
namespace src\controllers\login_function;
;
require_once (__DIR__ . '/../../../vendor/autoload.php');

use src\models\UserDao;
use src\domain\login_function\UserLogin;
use src\models\repository\UserRepository;

ini_set('display_errors', "On");
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
    $userRepository = new UserRepository();
    $errorMessage = $userLogin->countError();
    $loginResult =
    $userRepository->login($userLogin);
    if
    ($userRepository->checkUserExistenceByEmail($this->email) == false) {
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
