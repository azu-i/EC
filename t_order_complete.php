
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="shop.css">
  <title>購入完了 | Noodle Shop</title>
</head>

<body>
  <div class="base">
    購入完了しました。<br>
  </div>
  <div class="base">
    購入時情報<br><br>
    <?php echo $address; ?> <br>
    <?php echo $tell; ?> <br>
    <?php echo $payment; ?>
  </div>
  <div class="base">
    <a href="index.php">お買い物に戻る</a>
  </div>
</body>

</html>