<?php
// require_once (__DIR__ . '/../routes.php');
// var_dump($router);
require_once (__DIR__ . '/../../vendor/altorouter/altorouter/AltoRouter.php');
$router = new AltoRouter();

$router->map('GET', '/admin', function () {
  require(__DIR__ . '/../../src/controllers/admin/index.php');
}, 'admin');
$match = $router->match();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Vegetable Shop</title>
  <link rel="stylesheet" href="/css/shop.css">
</head>

<body>
  <h1 class="text-3xl font-semibold">Vegetable Shop</h1>
  <div class="container-link">
    <a href="<?= $router->generate('admin'); ?>">管理画面へ</a>
    <a href="/user/cart_empty.php">カートを空にする</a>
    <a href="/user/cart_index.php">カートへ</a>
    <a href="/user/order_history.php">購入履歴へ</a>
    <a href="/login_function/user_registration.php">新規ユーザー登録</a>
    <p>ログインユーザー：<?= $login_user_name; ?></p>
    <form action="/controllers/login_function/user_logout.php" method="POST"><input type="submit" name="logout" value="ログアウト"></form>
  </div>
  <table>
    <?php foreach ($products as $product) { ?>
      <tr>
        <td>
          <p class="products"><?= $product->name() ?></p>
        </td>
        <td width="80">
          <p><?= $product->getPriceWithUnit() ?></p>
          <form action="" method="post">

            <input type="hidden" name="id" value="<?= $product->id()->value() ?>">
            <input type="submit" name="submit" value="詳細">
          </form>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>