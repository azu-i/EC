<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/shop.css">
</head>

<title>商品詳細</title>
</head>

<body>
  <table>
  <tr>
    <td>
      <p class="products"><?php echo $product_details->name() ?></p>
      <p><?php echo nl2br($product_details->comment()) ?></p>
    </td>
    <td width="80">
      <p><?php echo $product_details->price() ?></p>
      <form action="cart_stock.php" method="post">
        <form action="product_detail.php" method="post">
          <select name="num">
            <?php
            for ($i = 0; $i <= 9; $i++) {
              echo "<option>$i</option>";
            }
            ?>
          </select>
          <input type="hidden" name="id" value="<?php echo $product_details->id() ?>">
          <input type="submit" name="submit" value="カートへ">
        </form>
    </td>
  </tr>
  </table>
</body>

</html>