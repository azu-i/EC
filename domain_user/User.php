<?php
require_once './UserName.php';
require_once './Email.php';

class User
{
  private $name;
  private $email;
  private $password;

  public function __construct(UserName $name, Email $email, string $password)
  {
    if (empty($password)) {
      throw new Exception('パスワードが未入力です。');
    }
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

  public function password(): string
  {
    return $this->password;
  }

  public function extractParamsForRegister(): array
  {
    $name = $this->name->user_name();
    $email = $this->email->mail();
    return [$name, $email, $this->password];
  }
}