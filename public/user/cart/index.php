<?php
require_once (__DIR__ . '/../../template/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/shop.css">
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
    <?php foreach ($cartProducts->cartProducts() as $cartProduct) { ?>
      <tr>
        <td><?= $cartProduct->name() ?></td>
        <td><?= $cartProduct->price() ?>円</td>
        <td><?= $cartProduct->quantity() ?></td>
        <td><?= $cartProduct->sumPrice() ?>円</td>
        <td>
          <form action="/route/cart_delete" method="get">
            <input type="hidden" name="id" value="<?= $cartProduct->id()->value() ?>">
            <input type="submit" name="submit" value="カートから削除">
          </form>
        </td>
      </tr>
    <?php } ?>
    <tr>
      <td colspan="2"></td>
      <td><strong>合計</strong></td>
      <td><?= $cart->totalPrice() ?>円</td>
      <td></td>
    </tr>
  </table>
  <div class="base">
    <a href="/">お買い物に戻る</a><br>
    <a href="/route/cart_empty">カートを空にする</a><br>
    <a href="/route/order">購入する</a>
  </div>
</body>

</html>