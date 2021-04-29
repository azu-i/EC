<?php
require_once (__DIR__ . '/../controllers/login_function/security.php');

// session_start();

class Auth
{
  public static function id()
  {
    return $_SESSION['loginUser']['id'];
  }

  public static function name()
  {
    return escape($_SESSION['loginUser']['name']);
  } 

}