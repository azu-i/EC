<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/order_history.css">
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
        <?php foreach ($auth_order_lists as $auth_order_list) {  ?>
          <?php foreach ($auth_order_list as $auth_order) {  ?>
            <td>
              <p class="products"><?php echo $auth_order['name'] ?></p>
            </td>
            <td>
              <p><?php echo $auth_order['amount'] . '個' ?></p>
            </td>
            <td>
              <p><?php echo $auth_order['price'] * $auth_order['amount'] . '円' ?></p>
            </td>
            <td>
              <p><?php echo $auth_order['order_date'] ?></p>
            </td>
      </tr>
    <?php } ?>
  <?php } ?>
   </table>
</body>

</html>