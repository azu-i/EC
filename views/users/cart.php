<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/shop.css">
  <title>カート｜Vegetable Shop</title>
</head>

<body>
  <h1>カート</h1>
  <table>
    <tr>
      <th>商品名</th>
      <th>単価</th>
      <th>数量</th>
      <th>小計</th>
      <th></th>
    </tr>
    <?php foreach ($cart_products->cart_products() as $cart_product) { ?>
      <tr>
        <td><?php echo $cart_product->name() ?></td>
        <td><?php echo $cart_product->price() ?>円</td>
        <td><?php echo $cart_product->quantity() ?></td>
        <td><?php echo $cart_product->sum_price() ?>円</td>
        <td>
          <form action="cart_product_delete.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $cart_product->id() ?>">
            <input type="submit" name="submit" value="カートから削除">
          </form>
        </td>
      </tr>
    <?php } ?>

    <tr>
      <td colspan="2"></td>
      <td><strong>合計</strong></td>
      <td><?php echo $cart->total_price() ?>円</td>
      <td></td>
    </tr>
  </table>
  <div class="base">
    <a href="index.php">お買い物に戻る</a><br>
    <a href="cart_empty.php">カートを空にする</a><br>
    <a href="order.php">購入する</a>
  </div>
</body>

</html>