<?php
ini_set('display_errors', "On");
class UserName
{
  private $userName;

  public function __construct(string $userName)
  {
    if (mb_strlen($userName) > 20) {
      throw new Exception('ユーザー名は20文字までで登録お願いします。');
    }
    $this->userName = $userName;
  }

  public function userName(): string
  {
    return $this->userName;
  }
}