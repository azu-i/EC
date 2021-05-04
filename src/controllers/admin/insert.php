<?php
namespace src\controllers\admin;

require_once (__DIR__ . '/../../../vendor/autoload.php');
use src\models\ProductsDao;
use src\domain\products\CommentFactory;
;
use src\domain\products\PriceFactory;

ini_set('display_errors', "On");

class Insert
{
  public function __construct(string $name, string $comment, int $price)
  { 
    $this->name = $name;
    $this->comment = $comment;
    $this->price = $price;
  }

  public function insert(): void
  {
    $productsDao = new ProductsDao();
    $comment = CommentFactory::create($this->comment);
    $price = PriceFactory::create($this->price);
    $st = $productsDao->productInsert($this->name, $comment->detail(), $price->value());
  }



}