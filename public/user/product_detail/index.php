<?php
require_once (__DIR__ . '/../../template/header.php');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/shop.css">
</head>

<title>商品詳細</title>
</head>

<body>
  <table>
    <tr>
      <td>
        <p class="products"><?= $productInfo->name() ?></p>
        <p><?= nl2br($productInfo->comment()) ?></p>
      </td>
      <td>
        <p><?= $productInfo->getPriceWithUnit() ?></p>
        <form action="/route/cart_stock" method="get">
            <select name="num">
              <?php
              for ($i = 0; $i <= $maxOrderNumber; $i++) {
                echo "<option>$i</option>";
              }
              ?>
            </select>
            <input type="hidden" name="id" value="<?= $productInfo->id()->value() ?>">
            <input type="submit" name="submit" value="カートへ">
          </form>
      </td>
    </tr>
  </table>
</body>

</html>