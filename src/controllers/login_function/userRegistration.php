<?php
namespace src\controllers\login_function;

require_once (__DIR__ . '/../../../vendor/autoload.php');

use src\models\UserDao;
use src\domain\login_function\UserFactory;

// ini_set('display_errors', "On");

class UserRegistration
{
  private $name;
  private $email;
  private $password;
  private $passwordConfirmation;
  
  public function __construct(string $name, string $email, string $password, string $passwordConfirmation)
  {
    try {
      if ($password !== $passwordConfirmation) {
        throw new \Exception('確認用パスワードと異なっています。');
      }
    } catch (\Exception $e) {
      echo $e->getMessage();
      die;
    }
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
    $this->passwordConfirmation = $passwordConfirmation;
  }
  public function userInsert()
  {
    $token = filter_input(INPUT_POST, 'csrf_token');
    unset($_SESSION['csrf_token']);
    $user = UserFactory::create($this->name, $this->email, $this->password);
    $userDao = new UserDao();
    $userDao->insert($user);
  }
}
