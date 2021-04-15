<?php
require_once (__DIR__ . '/User.php');
require_once (__DIR__ . '/Email.php');
require_once (__DIR__ . '/UserName.php');
require_once (__DIR__ . '/UserPassword.php');

ini_set('display_errors', "On");
class UserFactory
{
  public static function create(string $name, string $email, string $password)
  {
    return new User(
      new UserName($name),
      new Email($email),
      new UserPassword($password)
    );
  }
}