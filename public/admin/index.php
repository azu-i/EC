<!DOCTYPE html>
<html lang="ja">
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
          <p><a href="/admin/edit/?id=<?= $product->id()->value() ?>">修正</a></p>
          <p><a href="/route/product_delete/?id=<?= $product->id()->value() ?>" onclick="return confirm('削除してよろしいですか？')">削除</a></p>
        </td>
      </tr>
    <?php } ?>
  </table>
  <div class="base">
    <a href="/admin/insert">新規追加</a>
    <a href="/">サイト確認</a>
    <a href="/login_function/registration">ユーザー登録</a>
    <a href="/login_function/login">ユーザーlogin</a>
    <a href="/admin/order_list">購入された商品</a>
  </div>
</body>
</html>