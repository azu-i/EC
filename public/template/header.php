<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/template.css">
</head>

<body>
  <header>
    <h1 class="headline">
      <a href="/">Vegetable Shop</a>
    </h1>
    <nav class="nav-list">
      <ul>
        <li class="nav-list-item"><a href="/">Top</a></li>
        <li class="nav-list-item"><a href="/route/cart_empty">カートを空にする</a></li>
        <li class="nav-list-item"><a href="/route/cart">カートへ</a></li>
        <li class="nav-list-item"><a href="/route/order_history">注文履歴</a></li>
        <p class="nav-list-item">ログインユーザー：<?= $_SESSION['loginUser']['name']; ?></p>
        <form class="nav-list-item" action="/login_function/login" method="POST"><input type="submit" name="logout" value="ログアウト"></form>
    </nav>
  </header>
</body>

</html>