<?php
require_once(__DIR__ . '/../../domain/products/ProductsFactory.php');
require_once(__DIR__ . '/../../domain/cart/CartProductFactory.php');
require_once(__DIR__ . '/../../domain/products/QuantityFactory.php');
require_once(__DIR__ . '/ProductsRepositoryInterface.php');
require_once(__DIR__ . '/../ProductsDao.php');

ini_set('display_errors', "On");

class ProductsRepository implements ProductsRepositoryInterface
{
  private ProductsDao $productsDao;
  //TODO: DIの形にする
  public function __construct()
  {
    $this->productsDao = new ProductsDao();
  }

  public function findAll(): array
  {
    $productsFromTable = $this->productsDao->findAll();
    $products = $this->convertToProductsEntities($productsFromTable);
    return $products;
  }

  private function convertToProductsEntities(array $productsFromTable): array
  {
    $products = [];
    foreach ($productsFromTable as $productFromTable) {

      $products[] = ProductsFactory::create(
        $productFromTable['id'],
        $productFromTable['name'],
        $productFromTable['price'],
        $productFromTable['comment']
      );
    }
    return $products;
  }

  public function findById(ProductId $id): Product
  {
    $productFromTable = $this->productsDao->selectProduct($id);
    $product = ProductsFactory::create(
      $productFromTable['id'],
      $productFromTable['name'],
      $productFromTable['price'],
      $productFromTable['comment'],
    );
    return $product;
  }

  public function delete(ProductId $id): void
  {
  }

  public function edit(Product $product): void
  {
  }

  public function insert(Product $product): void
  {
  }
}
