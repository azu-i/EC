<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order History</title>
</head>

<body>
  <table>
    <?php foreach ($auth_order_items as $auth_order_item) { ?>
      <tr>
        <td>
          <?php foreach ($auth_order_item as $auth_order_item) { ?>
            <p class="goods"><?php echo $auth_order_item ?></p>
            <p><?php echo nl2br($good->comment()) ?></p>
        </td>
        <td width="80">
          <p><?php echo $good->getPriceWithUnit() ?></p>
        <?php } ?>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>