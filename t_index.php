<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Noodle Shop</title>
  <link rel="stylesheet" href="shop.css">
</head>

<body>
  <h1>Noodle Shop</h1>
  <table>
    <?php foreach ($goods as $good) { ?>
      <tr>
        <td>
          <?php echo img_tag($good->id()) ?>
        </td>
        <td>
          <p class="goods"><?php echo $good->name() ?></p>
          <p><?php echo nl2br($good->comment()) ?></p>
        </td>
        <td width="80">
          <p><?php echo $good->getPriceWithUnit() ?></p>
          <form action="cart.php" method="post">
            <select name="num">
              <?php
              for ($i = 0; $i <= 9; $i++) {
                echo "<option>$i</option>";
              }
              ?>
            </select>
            <input type="hidden" name="id" value="<?php echo $good->id() ?>">
            <input type="submit" name="submit" value="カートへ">
          </form>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>