<?php
  require '../domain/DAO.php';
  $dao = new DAO();
  $id = $_GET['id'];
  $delete = $dao->delete($id);
  header('Location: index.php');
