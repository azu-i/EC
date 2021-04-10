<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/css/admin.css">
  <title>商品追加</title>
</head>

<body>
  <div class="base">
    <?php if ($error) echo "<span class=\"error\">$error</span>" ?>
    <form action="/controllers/admin/insert.php" method="post">
      <p>
        商品名<br>
        <input type="text" name="name" value="<?= $name ?>">
      </p>
      <p>
        商品説明<br>
        <textarea name="comment" rows="10" cols="60"><?= $comment ?></textarea>
      </p>
      <p>
        価格<br>
        <input type="text" name="price" value="<?= $price ?>">
      </p>
      <p>
        <input type="submit" name="submit" value="追加">
      </p>
    </form>
  </div>
  <div class="base">
    <a href="/controllers/admin/index.php">一覧に戻る</a>
  </div>
</body>

</html>