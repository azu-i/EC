<?php
require_once (__DIR__ . '/../models/ProductsDao.php');


function delete($id)
{
  $productsDao = new ProductsDao();
  session_start();
  $id = $_GET['id'];
  $productsDao->delete($id);
  return header('Location: http://l-ec.com/admin');
}

function edit_uplode(int $id, string $name, string $comment, int $price)
{
  $productsDao = new ProductsDao();
  $productsDao->editUplode($id, $name, $price, $comment);
  return header('Location: /controllers/admin/index.php');
}

