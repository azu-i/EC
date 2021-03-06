<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>ユーザーログイン</title>
  <link rel="stylesheet" href="user.css">
</head>

<body>
  <div class="base">
    <form action="user_login.php" method="post">
      <p>
        登録メールアドレス<br>
        <input type="text" name="email"></input>
      </p>
      <p>
        パスワード<br>
        <input type="text" name="password">
      </p>
      <p>
        <input type="submit" name="submit" value="ログイン">
      </p>
    </form>
    <a href="t_user_registration.php">新規登録はこちら</a>
  </div>
</body>

</html>