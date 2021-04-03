<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Noodle Shop</title>
  <link rel="stylesheet" href="css/shop.css">
</head>

<body>
  <h1 class="text-3xl font-semibold">Noodle Shop</h1>
  <div class="container-link">
    <a href="admin/index.php">管理画面へ</a>
    <a href="cart_empty.php">カートを空にする</a>
    <a href="cart_index.php">カートへ</a>
    <a href="order_history.php">購入履歴へ</a>
    <a href="user/t_user_registration.php">新規ユーザー登録</a>
    <p>ログインユーザー：<?php echo $login_user_name; ?></p>
    <form action="user/user_logout.php" method="POST"><input type="submit" name="logout" value="ログアウト"></form>
  </div>
  <table>
    <?php foreach ($products as $product) { ?>
      <tr>
        <td>
          <p class="products"><?php echo $product->name() ?></p>
          <p><?php echo nl2br($product->comment()) ?></p>
        </td>
        <td width="80">
          <p><?php echo $product->getPriceWithUnit() ?></p>
          <form action="cart_stock.php" method="post">
            <select name="num">
              <?php
              for ($i = 0; $i <= 9; $i++) {
                echo "<option>$i</option>";
              }
              ?>
            </select>
            <input type="hidden" name="id" value="<?php echo $product->id() ?>">
            <input type="submit" name="submit" value="カートへ">
          </form>
        </td>
      </tr>
    <?php } ?>


  </table>
</body>

</html>