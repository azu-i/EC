<?php
namespace src\domain\login_function;

// ini_set('display_errors', "On");
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