<?php
ini_set('display_errors', "On");
class UserName
{
  private $user_name;

  public function __construct(string $user_name)
  {
    if (mb_strlen($user_name) > 20) {
      throw new Exception('ユーザー名は20文字までで登録お願いします。');
    }
    $this->user_name = $user_name;
  }

  public function user_name(): string
  {
    return $this->user_name;
  }
}