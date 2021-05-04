<?php
namespace src\auth;

class Auth
{
  public function id()
  {
    return $_SESSION['loginUser']['id'];
  }

  public function name()
  {
    return htmlspecialchars($_SESSION['loginUser']['name']);
  } 

}