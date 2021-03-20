
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>ユーザー登録</title>
  <link rel="stylesheet" href="user.css">
</head>

<body>
  <div class="base">
    <?php if ($error) echo "<span class=\"error\">$error</span>" ?>
    <form action="user_registration.php" method="post">
      <p>
        ユーザー名 ※20文字まで<br>
        <input type="text" name="name">
      </p>
      <p>
        メールアドレス<br>
        <input type="text" name="email"></input>
      </p>
      <p>
        パスワード ※英数字8文字以上、100文字以内<br>
        <input type="text" name="password">
      </p>
      <p>
      <p>
        パスワード確認<br>
        <input type="text" name="password_confirmation">
      </p>
      <p>
        <input type="hidden" name="csrf_token" value="<?php echo $setToken; ?>">
      </p>
      <p>
        <input type="hidden" name="id">
        <input type="submit" name="submit" value="登録">
      </p>
    </form>
  </div>
</body>

</html>