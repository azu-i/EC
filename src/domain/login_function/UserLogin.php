<?php
namespace src\domain\login_function;
ini_set('display_errors', "On");

class UserLogin
{
  private $email;
  private $password;

  public function __construct(string $email, string $password)
  {
    $this->email = $email;
    $this->password = $password;
  }

  //ログイン時にメールアドレス、パスワード入力がされているか
  public function countError(): array
  {
    $error_message = [];
    if (empty($this->email)) {
      $error_message['email'] = 'メールアドレスを入力してください';
    }
    if (empty($this->password)) {
      $error_message['password'] = 'パスワードを入力してください';
    }
    return $error_message;
  }

  public function email(): string
  {
    return $this->email;
  }

  public function password(): string
  {
    return $this->password;
  }
  
  public function extractParamsForLogin()
  {
    $email = $this->email();
    $password = $this->password();
    return [$email, $password];
  }
}
