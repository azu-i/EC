<?php
require_once 'User.php';

class UserFactory
{
  public static function create(string $name, string $email, string $password)
  {
    return new User($name, $email, $password);
  }
}

?>