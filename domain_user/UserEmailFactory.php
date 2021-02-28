<?php
require_once 'UserEmail.php';

class UserEmailFactory
{
  public static function create(string $mail): UserEmail
  {
    return new UserEmail($mail);
  }
}
?>