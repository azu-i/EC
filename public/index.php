<?php

require_once (__DIR__ . '/../src/controllers/user/index.php');


// require_once (__DIR__ . '/../vendor/altorouter/altorouter/AltoRouter.php');

// ini_set('display_errors', "On");

// $router = new AltoRouter();

// $router->map('GET|POST', '/login_function/login', function () {
//   require (__DIR__ . '/../src/controllers/login_function/user_login.php');
// }, 'login');

// $router->map('GET', '/', function () {
//   require_once (__DIR__ . '/../src/controllers/user/index.php');
// }, 'home');

// $router->map('GET', '/login_function/login_top', function () {
//   require_once (__DIR__ . '/login_function/login/index.php');
// }, 'login_top');

// $router->map('GET|POST', '/admin', function () {
//   require __DIR__ . '/../src/controllers/admin/index.php';
// }, 'admin_home');

// $router->map('GET', '/admin/order_list', function () {
//   require __DIR__ . '/../src/controllers/admin/order_list.php';
// }, 'order_list');

// $router->map('GET|POST', '/product_detail/[i:id] ', function ($id) {
//   require __DIR__ .
//   '/../src/controllers/user/product_detail.php';
// }, 'product_detail');

// $match = $router->match();


// if (is_array($match) && is_callable($match['target'])) {
//   call_user_func_array($match['target'], $match['params']);
// } else {
//   // no route was matched
//   header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
// }
