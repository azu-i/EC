<?php
class UserPassword
{
  private $user_password;

  public function __construct(string $user_password)
  {
    if(mb_strlen($user_password) > 20){
      throw new Exception('パスワードは20文字までで登録お願いします。');
    }
    $this->user_password = $user_password;
  }
  
  public function user_password(): string
  {
    return $this->user_password;
  }
}
