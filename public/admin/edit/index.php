<?php
require_once(__DIR__ . '/../../../src/controllers/admin/edit.php');
require_once(__DIR__ . '/../../routes.php');


$router->map('GET|POST', '/admin/edit_uplode', function () {
  require_once (__DIR__ . '/../../../src/controllers/admin/edit_uplode.php');
}, 'uplode');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>商品修正</title>
  <link rel="stylesheet" href="/css/admin.css">
</head>

<body>
  <div class="base">
    <form action="<?= $router->generate('uplode')?>" method="post">
      <p>
        商品名<br>
        <input type="text" name="name" value="<?= $products->name() ?>">
      </p>
      <p>
        商品説明<br>
        <textarea name="comment" rows="10" cols="60"><?= $products->comment() ?></textarea>
      </p>
      <p>
        価格<br>
        <input type="text" name="price" value="<?= $products->price() ?>">
      </p>
      <p>
        <input type="hidden" name="id" value="<?= $products->id()->value() ?>">
        <input type="submit" name="submit" value="更新">
      </p>
    </form>
  </div>
  <div class="base">
    <a href="/admin">一覧に戻る</a>
  </div>
</body>

</html>