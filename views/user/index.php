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
    <a href="/controllers/admin/index.php">管理画面へ</a>
    <a href="/controllers/user/cart_empty.php">カートを空にする</a>
    <a href="/controllers/user/cart_index.php">カートへ</a>
    <a href="/controllers/user/order_history.php">購入履歴へ</a>
    <a href="/views/login_function/user_registration.php">新規ユーザー登録</a>
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
          <form action="/controllers/user/product_detail.php" method="post">

            <input type="hidden" name="id" value="<?= $product->id() ?>">
            <input type="submit" name="submit" value="詳細">
          </form>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>