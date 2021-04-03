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
    <?php foreach ($auth_order_products as $auth_order_product) { ?>
      <tr>
        <td>
          <?php foreach ($auth_order_product as $auth_order_product) { ?>
            <p class="products"><?php echo $auth_order_product ?></p>
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