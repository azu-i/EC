<?php
require_once 'UserName.php';

class UserNameFactory
{
  public static function create(string $user_name): UserName
  {
    return new UserName($user_name);
  }
}
?>