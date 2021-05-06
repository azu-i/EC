<?php
require_once (__DIR__ . '/../../template/header.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/order_history.css">
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
        <?php for ($i = 0; $i < count($AuthOrderData); $i++ ) {  ?>
            <td>
              <p class="products"><?= $AuthProductsData[$i]['name'] ?></p>
            </td>
            <td>
              <p><?= $AuthOrderData[$i]['amount'] . '個' ?></p>
            </td>
            <td>
              <p><?= $AuthProductsData[$i]['price'] * $AuthOrderData[$i]['amount'] . '円' ?></p>
            </td>
            <td>
              <p><?= $AuthOrderData[$i]['created_at'] ?></p>
            </td>
      </tr>
  <?php } ?>
   </table>
</body>

</html>