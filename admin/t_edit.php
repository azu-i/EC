<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>商品修正</title>
  <link rel="stylesheet" href="admin.css">
</head>

<body>
  <div class="base">
    <!-- <?php if ($error) echo "<span class=\"error\">$error</span>" ?> -->
    <form action="edit_uplode.php" method="post">
      <p>
        商品名<br>
        <input type="text" name="name" value="<?php echo $goods->name() ?>">
      </p>
      <p>
        商品説明<br>
        <textarea name="comment" rows="10" cols="60"><?php echo $goods->comment() ?></textarea>
      </p>
      <p>
        価格<br>
        <input type="text" name="price" value="<?php echo $goods->price() ?>">
      </p>
      <p>
        <input type="hidden" name="id" value="<?php echo $goods->id() ?>">
        <input type="submit" name="submit" value="更新">
      </p>
    </form>
  </div>
  <div class="base">
    <a href="index.php">一覧に戻る</a>
  </div>
</body>

</html>