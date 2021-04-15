<?php
require_once (__DIR__ . '/../controllers/login_function/security.php');

session_start();

class Auth
{
  // private function loginUser()
  // {
  //   return $_SESSION['login_user'];
  // }
  public static function id()
  {
    return $_SESSION['login_user']['id'];
  }

  public static function name()
  {
    return escape($_SESSION['login_user']['name']);
  } 

}