<?php
// require (__DIR__ . '/../../index.php');
session_start();

session_destroy();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>ユーザーログイン</title>
  <link rel="stylesheet" href="/css/user_registration.css">
</head>

<body>
  <div class="base">
    <form action="http://l-ec.com/route/login" method="get">
      <p>
        登録メールアドレス<br>
        <?php if (isset($_SESSION['email'])): 
        ?>
      <p><?= $_SESSION['email']; ?></p>
    <?php endif ?>
    <input type="text" name="email"></input>
    </p>
    <p>
      パスワード<br>
      <?php if (isset($_SESSION['password'])) :
      ?>
    <p><?= $_SESSION['password']; ?></p>
  <?php endif; ?>
  <input type="text" name="password">
  </p>
  <p>
    <input type="submit" name="submit" value="ログイン">
  </p>
    </form>
    <a href="/login_function/registration">新規登録はこちら</a>
  </div>
</body>

</html>