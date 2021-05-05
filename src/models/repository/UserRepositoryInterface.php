<?php
namespace src\models\repository;

require_once (__DIR__ . '/../../../vendor/autoload.php');
use src\domain\login_function\Email;
use src\domain\login_function\UserLogin;
use src\domain\login_function\User;

ini_set('display_errors', "On");

//UserRepositoryであることの条件
interface UserRepositoryInterface
{
  public function checkUserExistenceByEmail(string $email): bool;
  public function checkPassword(string $password, string $typedPassword): bool;
  public function login(UserLogin $userLogin): bool;
  public function checkLogin(): bool;
}
