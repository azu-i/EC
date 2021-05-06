<?php
require_once (__DIR__ . '/../../template/adminHeader.php');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/order_list.css">
  <title>購入された商品</title>
</head>

<body>
  <table>
    <h1>購入履歴</h1>
    <table>
      <tr>
        <th>注文ユーザー情報</th>
        <th>注文商品情報</th>
        <th>郵送先情報</th>

      </tr>
      <tr>
        <?php for($i = 0; $i < count($orderData); $i++) {  ?>
          <td>
            <p class="products"><?= $orderData[$i]['name'] ?></p>
            <p class="products"><?= $orderData[$i]['email'] ?></p>
          </td>
          <td>
            <p>商品名 ：<?= $productsData[$i]['name'] ?></p>
            <p>個数   ：<?= $orderData[$i]['amount'] . '個' ?></p>
            <p>金額   ：<?= $productsData[$i]['price'] * $orderData[$i]['amount'] . '円' ?></p>
            <p>注文日時:<?= $orderData[$i]['created_at'] ?></p>
          </td>
          <td>
            <p>住所：<?= $orderData[$i]['address'] ?></p>
            <p>電話：<?= $orderData[$i]['tell'] ?></p>
          </td>
      </tr>
    <?php } ?>
    </table>
</body>

</html>