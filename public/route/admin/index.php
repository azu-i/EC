<?php
require_once (__DIR__ . '/../../../vendor/autoload.php');

use src\models\repository\ProductsRepository;
ini_set('display_errors', "On");

$productsRepository = new ProductsRepository();
$products = $productsRepository->findAll();

require_once (__DIR__ . '/../../admin/index.php');