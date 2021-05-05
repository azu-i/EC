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
  <title>購入履歴</title>
</head>

<body>
  <table>
    <h1>購入履歴</h1>
    <table>
      <tr>
        <th>商品名</th>
        <th>注文個数</th>
        <th>金額</th>
        <th>注文日時</th>
      </tr>
      <tr>
        <?php foreach ($authOrderLists as $authOrderList) {  ?>
          <?php foreach ($authOrderList as $authOrder) {  ?>
            <td>
              <p class="products"><?= $authOrder['name'] ?></p>
            </td>
            <td>
              <p><?= $authOrder['amount'] . '個' ?></p>
            </td>
            <td>
              <p><?= $authOrder['price'] * $authOrder['amount'] . '円' ?></p>
            </td>
            <td>
              <p><?= $authOrder['order_date'] ?></p>
            </td>
      </tr>
    <?php } ?>
  <?php } ?>
   </table>
</body>

</html>