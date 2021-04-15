<?php
class UserPassword
{
  private $user_password;

  public function __construct(string $user_password)
  {
    if(!preg_match("/\A[a-z\d]{8,100}+\z/i",$user_password)){
      throw new Exception('パスワードは英数字8文字以上、100文字以内にしてください。');
    }
    $this->user_password = $user_password;
  }
  
  public function user_password(): string
  {
    return $this->user_password;
  }
}
