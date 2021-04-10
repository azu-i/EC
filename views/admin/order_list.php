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
        <?php foreach ($order_lists as $order_list) {  ?>
          <?php foreach ($order_list as $order_info)  ?>
          <td>
            <p class="products"><?= $order_info['user_name'] ?></p>
            <p class="products"><?= $order_info['email'] ?></p>
          </td>
          <td>
            <p>商品名 ：<?= $order_info['name'] ?></p>
            <p>個数   ：<?= $order_info['amount'] . '個' ?></p>
            <p>金額   ：<?= $order_info['price'] * $order_info['amount'] . '円' ?></p>
            <p>注文日時:<?= $order_info['created_at'] ?></p>
          </td>
          <td>
            <p>住所：<?= $order_info['address'] ?></p>
            <p>電話：<?= $order_info['tell'] ?></p>
          </td>
      </tr>
    <?php } ?>
    <?php  ?>
    </table>
</body>

</html>