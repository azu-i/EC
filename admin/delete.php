<?php
  require 'common.php';
  $pdo = connect();
  $st = $pdo->query("DELETE FROM goods WHERE id={$_GET['id']}");
  header('Location: index.php');
