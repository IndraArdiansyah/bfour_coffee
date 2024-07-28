<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Struk POS</title>
  <style>
    body {
      font-family: 'Helvetica Neue', Arial, sans-serif;
      line-height: 1.6;
      background-color: #f4f4f4;
      padding: 20px;
    }

    .receipt {
      width: 320px;
      margin: 0 auto;
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 20px;
      background-color: #ffffff;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .receipt-header {
      text-align: center;
      margin-bottom: 20px;
      border-bottom: 2px solid #ddd;
      padding-bottom: 10px;
    }

    .receipt-logo {
      width: 120px;
      margin-bottom: 10px;
    }

    .receipt-address {
      font-size: 16px;
      margin-bottom: 10px;
    }

    .receipt-details {
      margin-bottom: 20px;
    }

    .receipt-details table {
      width: 100%;
      border-collapse: collapse;
    }

    .receipt-details table td {
      padding: 8px;
      border-bottom: 1px solid #eee;
    }

    .receipt-details table tr td:first-child {
      font-weight: bold;
      text-align: left;
    }

    .receipt-details table td:not(:first-child) {
      text-align: right;
    }

    .receipt-footer {
      text-align: center;
      padding-top: 10px;
      border-top: 2px solid #ddd;
    }
  </style>
</head>

<body>
  <div class="receipt">
    <div class="receipt-header">
      <img src="<?php echo base_url('assets/img/upload/outlet.PNG'); ?>" alt="Outlet Logo" class="receipt-logo">
      <div class="receipt-address">
        <h4>Jl. Budhi No.4, Sukaraja, Cicendo, Bandung</h4>
      </div>
      <h4>0<?= substr($id_booking, -3); ?></h4>
    </div>
    <div class="receipt-details">
      <table>
        <tr>
          <td>Tgl Pemesanan</td>
          <td>: <?= $tgl_booking; ?></td>
        </tr>
        <tr>
          <td>Nama Customer</td>
          <td>: <?= $nama_cust; ?></td>
        </tr>
      </table>
    </div>
    <hr>
    <div class="receipt-details">
      <table>
        <?php foreach ($orders as $order) : ?>
          <tr>
            <td>Nama Menu</td>
            <td>: <?= $order['nama_menu']; ?></td>
          </tr>
          <tr>
            <td>Jumlah Pesanan</td>
            <td>: <?= $order['jumlah']; ?> Item</td>
          </tr>
          <tr>
            <td>Harga</td>
            <td>: Rp. <?= number_format($order['harga']); ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
    <hr>
    <div class="receipt-details">
      <table>
        <tr>
          <td>Total Harga</td>
          <td>: Rp. <?= number_format($grand_total); ?></td>
        </tr>
      </table>
    </div>
    <div class="receipt-footer">
      <p>Terima kasih atas kunjungan anda.</p>
    </div>
  </div>
</body>

</html>