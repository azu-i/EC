<?php

function connect()
{
  $dsn = "mysql:host=localhost;dbname=shop;charset=utf8";
  $user = "root";
  $pass = "root";

  return new PDO($dsn, $user, $pass);
}
?>