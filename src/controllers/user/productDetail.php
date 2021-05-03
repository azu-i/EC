<?php
namespace src\controllers\user;

require_once (__DIR__ . '/../../auth/Auth.php');
require_once (__DIR__ . '/../../models/repository/ProductsRepository.php');
require_once (__DIR__ . '/../../models/BrowdingHistoriesDao.php');

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
    $authId = Auth::id();
    $browdingHistoriesDao = new BrowdingHistoriesDao();
    $browdingHistoriesDao->browdingHistoriesInsert($this->productId->value(), $authId);
  }  
}