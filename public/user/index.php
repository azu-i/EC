<?php
require_once (__DIR__ . '/../template/header.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Vegetable Shop</title>
  <link rel="stylesheet" href="/css/shop.css">
</head>
<body>
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