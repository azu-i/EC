<?php
  require 'common.php';
  $pdo = connect();
  $st = $pdo->query("SELECT * FROM goods");
  $goods = $st->fetchall(PDO::FETCH_ASSOC);
  require 't_index.php';
?>