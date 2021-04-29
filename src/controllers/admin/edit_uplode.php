<?php
require_once(__DIR__ . '/../../models/ProductsDao.php');

ini_set('display_errors', "On");

class Edit
{
  public function __construct(int $id, string $name, string $comment, int $price)
  {
    $this->id = $id;
    $this->name = $name;
    $this->comment = $comment;
    $this->price = $price;
  }

  public function edit(): void
  {
    $productsDao = new ProductsDao();
    $productsDao->editUplode($this->id, $this->name, $this->price, $this->comment);
  }
}
