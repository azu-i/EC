<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="shop.css">
  <title>カート｜Noodle Shop</title>
</head>

<body>
  <h1>カート</h1>
  <table>
    <tr>
      <th>商品名</th>
      <th>単価</th>
      <th>数量</th>
      <th>小計</th>
    </tr>
    <?php foreach ($cart->cart_items() as $cart_item) { ?>
      <tr>
        <td><?php echo $cart_item->name() ?></td>
        <td><?php echo $cart_item->price() ?></td>
        <td><?php echo $cart_item->quantity() ?></td>
        <td><?php echo $cart_item->sum_price() ?>円</td>
      </tr>
    <?php } ?>
    <tr>
      <td colspan="2"></td>
      <td><strong>合計</strong></td>
      <td><?php echo $cart->total_price() ?>円</td>
    </tr>
  </table>
  <div class="base">
    <a href="index.php">お買い物に戻る</a>
    <a href="cart_empty.php">カートを空にする</a>
    <a href="buy.php">購入する</a>
  </div>
</body>

</html>