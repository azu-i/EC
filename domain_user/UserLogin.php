<?php
// require_once 'Emmai.php';
// require_once 'UserPassword.php';

ini_set('display_errors', "On");
// session_start();

class UserLogin
{
  private $email;
  private $password;

  public function __construct(string $email, string $password)
  {
      $this->email = $email;
      $this->password = $password;
    }

    public function countError(): array
    {
      $error_message = [];
       if(empty($this->password)){
         $error_message['password'] = 'パスワードを入力してください';
       }
       if(empty($this->email))
       {
        $error_message['email'] = 'メールアドレスを入力してください';
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