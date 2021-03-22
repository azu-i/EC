<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="shop.css">
  <title>購入 | Noodle Shop</title>
</head>

<body>
  <h1>購入</h1>
    <table>
      <tr>
        <th>商品</th>
        <th>単価</th>
        <th>数量</th>
        <th>小計</th>
        <th></th>
      </tr>
      <?php foreach ($cart_items->cart_items() as $cart_item) { ?>
        <tr>
          <td><?php echo $cart_item->name() ?></td>
          <td><?php echo $cart_item->price() ?>円</td>
          <td><?php echo $cart_item->quantity() ?></td>
          <td><?php echo $cart_item->sum_price() ?>円</td>
          <td>
            <form action="cart_item_delete.php" method="POST">
              <input type="hidden" name="id" value="<?php echo $cart_item->id() ?>">
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
    <form action="order_insert.php" method="post">
      <p>
        お名前<br>
        <input type="text" name="name">
      </p>
      <p>
        ご住所<br>
        <input type="text" name="address" size="60">
      </p>
      <p>
        電話番号<br>
        <input type="text" name="tell">
      </p>
      <p>
        支払い方法<br>
        <input type="radio" name="payment" value=1>コンビニ支払い
        <input type="radio" name="payment" value=2>代金引換
      </p>
      <p>
        <input type="submit" name="submit" value="購入">
      </p>
    </form>
  </div>
  <div class="base">
    <a href="index.php">お買い物に戻る</a>
    <a href="cart_index.php">カートに戻る</a>
  </div>
</body>

</html>