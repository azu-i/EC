<?php
require_once (__DIR__ . '/../template/adminHeader.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/admin.css">
  <title>管理画面</title>
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
          <p><a href="/route/productEdit/?id=<?= $product->id()->value() ?>">修正</a></p>
          <p><a href="/route/product_delete/?id=<?= $product->id()->value() ?>" onclick="return confirm('削除してよろしいですか？')">削除</a></p>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>