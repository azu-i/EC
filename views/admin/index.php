<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/admin.css">
  <title>商品一覧</title>
</head>

<body>
  <table>
    <?php foreach ($products as $product) { ?>
      <tr>
        <td>
          <p class="products"><?= $product->name() ?></p>
          <p><?= nl2br($product->comment()) ?></p>
        </td>
        <td width="80">
          <p><?= $product->getPriceWithUnit() ?></p>
          <p><a href="/controllers/admin/edit.php?id=<?= $product->id() ?>">修正</a></p>
          <p><a href="/controllers/admin/delete.php?id=<?= $product->id() ?>" onclick="return confirm('削除してよろしいですか？')">削除</a></p>
        </td>
      </tr>
    <?php } ?>
  </table>
  <div class="base">
    <a href="/views/admin/insert.php">新規追加</a>
    <a href="/index.php">サイト確認</a>
    <a href="/views/login_function/user_registration.php">ユーザー登録</a>
    <a href="/views/login_function/user_login.php">ユーザーlogin</a>
    <a href="/controllers/admin/order_list.php">購入された商品</a>
  </div>
</body>

</html>