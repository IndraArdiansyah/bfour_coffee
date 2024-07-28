<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Struk POS</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      background-color: #ffffff;
      padding: 20px;
    }

    .receipt {
      width: 300px;
      margin: 0 auto;
      border: 1px solid #ccc;
      padding: 10px;
      background-color: #f9f9f9;
    }

    .receipt-header {
      text-align: center;
      margin-bottom: 10px;
    }

    .receipt-logo {
      width: 80px;
      /* Adjust size as needed */
      margin-bottom: 10px;
    }

    .receipt-address {
      font-size: 12px;
      margin-bottom: 10px;
    }

    .receipt-details {
      margin-bottom: 10px;
    }

    .receipt-details table {
      width: 100%;
    }

    .receipt-details table td {
      padding: 5px;
    }

    .receipt-details table td:first-child {
      font-weight: bold;
      text-align: left;
    }

    .receipt-footer {
      margin-top: 10px;
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="receipt">
    <div class="receipt-header">
      <img src="<?php echo base_url('assets/img/upload/outlet.PNG'); ?>" alt="Outlet Logo" class="receipt-logo" style="width: 10rem;">
      <h4>Jl. Budhi No.4, Sukaraja, Cicendo, Bandung</h4>
    </div>
    <hr>
    <div class="receipt-details">
      <table>
        <tr>
          <td>Tgl Pemesanan</td>
          <td>:&nbsp;<?= isset($row[0]['tgl_booking']) ? $row[0]['tgl_booking'] : 'N/A'; ?></td>
        </tr>
        <tr>
          <td>Nama Member</td>
          <td>:&nbsp;<?= isset($user) ? $user : 'N/A'; ?></td>
        </tr>
        <tr>
          <td>Nama Customer</td>
          <td>:&nbsp;<?= isset($row[0]['nama_cust']) ? $row[0]['nama_cust'] : 'N/A'; ?></td>
        </tr>
      </table>
      <hr>
    </div>
    <div class="receipt-details">
      <table>
        <?php if (!empty($order_items)) : ?>
          <?php foreach ($order_items as $order) : ?>
            <tr>
              <td>Nama Menu</td>
              <td>: <?= isset($order['name']) ? $order['name'] : 'N/A'; ?></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td>: Rp. <?= isset($order['price']) ? number_format($order['price']) : '0'; ?></td>
            </tr>
            <tr>
              <td>Jumlah</td>
              <td>: <?= isset($order['quantity']) ? $order['quantity'] : '0'; ?></td>
            </tr>
            <tr>
              <td>Subtotal</td>
              <td>: Rp. <?= isset($order['subtotal']) ? number_format($order['subtotal']) : '0'; ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr>
            <td colspan="2">No order items found</td>
          </tr>
        <?php endif; ?>
      </table>
      <hr>
      <table>
        <tr>
          <td>Total Harga</td>
          <td>: Rp. <?= isset($total_amount) ? number_format($total_amount) : '0'; ?></td>
        </tr>
        <tr>
          <td>Cash</td>
          <td>: Rp. <?= isset($cash) ? number_format($cash) : '0'; ?></td>
        </tr>
        <tr>
          <td>Change</td>
          <td>: Rp. <?= isset($cash) && isset($total_amount) ? number_format($cash - $total_amount) : '0'; ?></td>
        </tr>
      </table>
    </div>
    <div class="receipt-footer">
      <p>Terima kasih atas kunjungan anda.</p>
    </div>
  </div>
</body>

</html>