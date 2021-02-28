<?php

class User
{
  private $name;
  private $email;
  private $password;

  public function __construct(string $name, string $email,string $password)
  {
    if (empty($name)) {
      throw new Exception('ユーザー名が未入力です。');
    }
    if (empty($email)) {
      throw new Exception('メールアドレスが未入力です。');
    }
    if (empty($password)) {
      throw new Exception('パスワードが未入力です。');
    }
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
  }
 
  public function name()
  {
    return $this->name;
  }

  public function email()
  {
    return $this->email;
  }

  public function password()
  {
    return $this->password;
  }
}