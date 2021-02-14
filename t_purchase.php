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
  <div class="base">
    <form action="purchase.php" method="post">
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
        <input type="text" name="tel" >
      </p>
      <p>
        支払い方法<br>
        <input type="radio" name="payment" value="コンビニ支払い">コンビニ支払い
        <input type="radio" name="payment" value="代金引換">代金引換
      </p>
      <p>
        <input type="submit" name="submit" value="購入">
      </p>
    </form>
  </div>
  <div class="base">
    <a href="index.php">お買い物に戻る</a>
    <a href="cart.php">カートに戻る</a>
  </div>
</body>

</html>