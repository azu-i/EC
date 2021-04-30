<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ユーザーログイン</title>
  <link rel="stylesheet" href="/css/user_registration.css">
</head>

<body>
  <div class="base">
    <form action='' method="post">
      <p>
        登録メールアドレス<br>
        <?php if (isset($error_message['email'])) :
        ?>
      <p><?= $error_message['email']; ?></p>
    <?php endif; ?>
    <input type="text" name="email"></input>
    </p>
    <p>
      パスワード<br>
      <?php if (isset($error_message['password'])) :
      ?>
    <p><?= $error_message['password']; ?></p>
  <?php endif; ?>
  <input type="text" name="password">
  </p>
  <p>
    <input type="submit" name="submit" value="ログイン">
  </p>
    </form>
    <a href="">新規登録はこちら</a>
  </div>
</body>

</html>