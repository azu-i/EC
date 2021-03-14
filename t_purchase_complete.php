<?php
require_once 'user/security.php';
require_once 'domain_user/UserDao.php';
$userDao = new UserDao();
$check_login = $userDao->checkLogin();
if ($check_login) {
  $login_user = $_SESSION['login_user'];
} else {
  header('Location: t_user_login.php');
}
?>
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
    <?php echo $purchase_data->name(); ?> <br>
    <?php echo $purchase_data->address(); ?> <br>
    <?php echo $purchase_data->tell(); ?> <br>
    <?php echo $purchase_data->payment(); ?>
  </div>
  <div class="base">
    <a href="index.php">お買い物に戻る</a>
  </div>
</body>

</html>