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
    <?php foreach ($goods as $good) { ?>
      <tr>
        <td>
          <p class="goods"><?php echo $good->name() ?></p>
          <p><?php echo nl2br($good->comment()) ?></p>
        </td>
        <td width="80">
          <p><?php echo $good->getPriceWithUnit() ?></p>
          <p><a href="edit.php?id=<?php echo $good->id() ?>">修正</a></p>
          <p><a href="delete.php?id=<?php echo $good->id() ?>" onclick="return confirm('削除してよろしいですか？')">削除</a></p>
        </td>
      </tr>
    <?php } ?>
  </table>
  <div class="base">
    <a href="t_insert.php">新規追加</a>
    <a href="../index.php">サイト確認</a>
  </div>
</body>

</html>