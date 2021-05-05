<?php
require_once (__DIR__ . '/../../../vendor/autoload.php');

use src\controllers\user\ProductDetail;
use src\domain\products\ProductId;

$productId = new ProductId($_GET["id"]);
$productDetail = new ProductDetail($productId);
$productInfo = $productDetail->productInfo();
$browdingHistoriesInsert = $productDetail->browdingHistoriesInsert();
//注文できる商品の最大値
$maxOrderNumber = 9;
require_once(__DIR__ . '/../../user/product_detail/index.php');
?>