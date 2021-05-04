<?php
namespace src\controllers\user;

require_once (__DIR__ . '/../../../vendor/autoload.php');

use src\auth\Auth;
use src\models\repository\ProductsRepository;
use src\domain\products\ProductId;
use src\models\browdingHistoriesDao;

class ProductDetail
{
  public function __construct(ProductId $productId)
  {
    $this->productId = $productId; 
  }

  public function productInfo()
  {
    $productsRepository = new ProductsRepository();
    $productDetail = $productsRepository->findById($this->productId); 
    return $productDetail;
  }

  public function browdingHistoriesInsert(): void
  {
    session_start();
    $auth = new Auth();
    $authId = $auth->id();
    $browdingHistoriesDao = new BrowdingHistoriesDao();
    $browdingHistoriesDao->browdingHistoriesInsert($this->productId->value(), $authId);
  }  
}