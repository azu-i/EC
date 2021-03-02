<?php
require_once 'User.php';
require_once 'Email.php';
require_once 'UserName.php';

class UserFactory
{
  public static function create(string $name, string $email, string $password)
  {
    return new User(
      new UserName($name),
      new Email($email),
      $password
    );
  }
}