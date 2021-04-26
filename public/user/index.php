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
    <a href="/admin">管理画面へ</a>
    <a href="/route/cart_empty">カートを空にする</a>
    <a href="/route/cart">カートへ</a>
    <a href="/route/order_history">購入履歴へ</a>
    <a href="/login_function/registration">新規ユーザー登録</a>
    <p>ログインユーザー：<?= $loginUserName; ?></p>
    <form action="/login_function/login" method="POST"><input type="submit" name="logout" value="ログアウト"></form>
  </div>
  <table>
    <?php foreach ($products as $product) { ?>
      <tr>
        <td>
          <p class="products"><?= $product->name() ?></p>
        </td>
        <td width="80">
          <p><?= $product->getPriceWithUnit() ?></p>
          <form action="/route/product_detail" method="get">
            <input type="hidden" name="id" value="<?= $product->id()->value() ?>">
            <input type="submit" name="submit" value="詳細">
          </form>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>