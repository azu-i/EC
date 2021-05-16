<?php
namespace src\models\repository;

require_once (__DIR__ . '/../../../vendor/autoload.php');
use src\models\ProductsDao;
use src\domain\products\ProductsFactory;
use src\domain\products\ProductId;
use src\domain\products\Product;
use src\domain\cart\Cart;
use src\domain\cart\CartProductFactory;
use src\domain\products\QuantityFactory;

// ini_set('display_errors', "On");

class ProductsRepository implements ProductsRepositoryInterface
{
  private ProductsDao $productsDao;
 
  public function __construct()
  {
    $this->productsDao = new ProductsDao();
  }

  // 商品Entitiyの全取得
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
    $st = $this->productsDao->delete();
    $productId = $id->value();
    $st->bindParam(':id', $productId, \PDO::PARAM_INT);
    $st->execute();
  }

  public function edit(int $id, string $name, int $price, string $comment): void
  {
    $products = ProductsFactory::create($id, $name, $price, $comment);
    $id = $products->id()->value();
    $name = $products->name();
    $price = $products->price();
    $comment = $products->comment();
    $this->productsDao->editUplode($id,$name, $price, $comment);
  }

  public function cartProducts(array $cartContent, Cart $cart)
  {
    [$productsData, $num] = $this->productsDao->searchCartProducts($cartContent);
    for($i = 0; $i < count($productsData); $i++)
    {
      $products = ProductsFactory::create($productsData[$i]['id'], $productsData[$i]['name'], $productsData[$i]['price'], $productsData[$i]['comment']);
      $num[$i] = QuantityFactory::create(strip_tags($num[$i]))->count();
      $cartProducts = CartProductFactory::create($products, $num[$i]);
      $cart->appendCartProduct($cartProducts);
    }
    return $cart;
  }
}
