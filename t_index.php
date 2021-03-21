<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Noodle Shop</title>
  <link rel="stylesheet" href="shop.css">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
  <h1 class="text-3xl font-semibold">Noodle Shop</h1>
  <table>
    <?php foreach ($goods as $good) { ?>
      <tr>
        <td>
          <p class="goods"><?php echo $good->name() ?></p>
          <p><?php echo nl2br($good->comment()) ?></p>
        </td>
        <td width="80">
          <p><?php echo $good->getPriceWithUnit() ?></p>
          <form action="cart_stock.php" method="post">
            <select name="num">
              <?php
              for ($i = 0; $i <= 9; $i++) {
                echo "<option>$i</option>";
              }
              ?>
            </select>
            <input type="hidden" name="id" value="<?php echo $good->id() ?>">
            <input type="submit" name="submit" value="カートへ">
          </form>
        </td>
      </tr>
    <?php } ?>
    <a href="admin/index.php">管理画面</a>
    <br>
    <a href="cart_empty.php">カートを空にする</a>
    <br>
    <a href="cart_index.php">カートへ</a>
    <br>
    <a href="user/t_user_registration.php">新規ユーザー登録</a>
    <br>
    <form action="user/user_logout.php" method="POST"><input type="submit" name="logout" value="ログアウト"></form>
    <br>
    <p>ログインユーザー：<?php echo $login_user_name; ?></p>
   

  </table>
</body>

</html>