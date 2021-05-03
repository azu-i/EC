<?php
namespace src\domain\login_function;
// require_once (__DIR__ . '/UserName.php');
// require_once (__DIR__ . '/Email.php');

ini_set('display_errors', "On");
class User
{
  private $name;
  private $email;
  private $password;

  public function __construct(UserName $name, Email $email, UserPassword $password)
  {
   
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
  }
 
  public function name(): UserName
  {
    return $this->name;
  }

  public function email(): Email
  {
    return $this->email;
  }

  public function password(): UserPassword
  {
    return $this->password;
  }

  public function extractParamsForRegister(): array
  {
    $name = $this->name->userName();
    $email = $this->email->mail();
    $password = $this->password->userPassword();
    return [$name, $email, $password];
  }
}