<?php 

class DAO
{
  function connect()
  {
    session_start(); 
    $dsn = "mysql:host=localhost;dbname=shop;charset=utf8";
    $user = "root";
    $pass = "root";
    
    return new PDO($dsn, $user, $pass);
  }

  function delete($id)
  {
    $pdo = $this->connect();
    $st = $pdo->query("DELETE FROM goods WHERE id={$id}");
    return $st;
  }
}


?>