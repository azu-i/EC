<?php

session_start();

function connect()
{
  $dsn = "mysql:host=localhost;dbname=shop;charset=utf8";
  $user = "root";
  $pass = "root";

  return new PDO($dsn, $user, $pass);
}

function img_tag($code)
{
  if (file_exists("images/$code.jpg")) $name = $code;
  else $name = 'noimage';
  return '<img src="images/' . $name . '.jpg" alt="">';
}

?>