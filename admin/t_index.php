<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="admin.css">
  <title>商品一覧</title>
</head>

<body>
  <table>
    <?php foreach ($products as $product) { ?>
      <tr>
        <td>
          <p class="products"><?php echo $product->name() ?></p>
          <p><?php echo nl2br($product->comment()) ?></p>
        </td>
        <td width="80">
          <p><?php echo $product->getPriceWithUnit() ?></p>
          <p><a href="edit.php?id=<?php echo $product->id() ?>">修正</a></p>
          <p><a href="delete.php?id=<?php echo $product->id() ?>" onclick="return confirm('削除してよろしいですか？')">削除</a></p>
        </td>
      </tr>
    <?php } ?>
  </table>
  <div class="base">
    <a href="t_insert.php">新規追加</a>
    <a href="../index.php">サイト確認</a>
    <a href="../user/t_user_registration.php">ユーザー登録</a>
    <a href="../user/t_user_login.php">ユーザーlogin</a>
  </div>
</body>

</html>