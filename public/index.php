<?php
require_once(__DIR__ . '/../vendor/altorouter/altorouter/AltoRouter.php');

ini_set('display_errors', "On");

$router = new AltoRouter();

$router->map('GET', '/admin', function () {
  require __DIR__ . '/../src/controllers/admin/index.php';
}, 'admin_home');

$router->map('GET', '/', function () {
  require __DIR__ . '/../src/controllers/user/index.php';
}, 'home');

$router->map('GET|POST', '/login_function/login/', function () {
  require(__DIR__ . '/../src/controllers/login_function/user_login.php');
}, 'login');


$router->map('GET', '/admin/order_list', function () {
  require __DIR__ . '/../src/controllers/admin/order_list.php';
}, 'order_list');

$router->map('GET|POST', '/product_detail/[i:id] ', function ($id) {
  require __DIR__ .
    '/../src/controllers/user/product_detail.php';
}, 'product-detail');

$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
  call_user_func_array($match['target'], $match['params']);
} else {
  // no route was matched
  header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}




