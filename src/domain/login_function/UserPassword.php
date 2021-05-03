<?php
namespace src\domain\login_function;

class UserPassword
{
  private $userPassword;

  public function __construct(string $userPassword)
  {
    if(!preg_match("/\A[a-z\d]{8,100}+\z/i",$userPassword)){
      throw new \Exception('パスワードは英数字8文字以上、100文字以内にしてください。');
    }
    $this->userPassword = $userPassword;
  }
  
  public function userPassword(): string
  {
    return $this->userPassword;
  }
}
