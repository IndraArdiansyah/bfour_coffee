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
      width: 80px; /* Adjust size as needed */
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
          <td>:&nbsp;<?= $row[0]['tgl_booking']; ?></td>
        </tr>
        <tr>
          <td>NIP Member</td>
          <td>:&nbsp;<?= $row[0]['nip']; ?></td>
        </tr>
        <tr>
          <td>Nama Customer</td>
          <td>:&nbsp;<?= $row[0]['nama_cust']; ?></td>
        </tr>
        <tr>
          <td>Phone</td>
          <td>:&nbsp;<?= $row[0]['phone']; ?></td>
        </tr>
      </table>
      <hr>
    </div>
    <div class="receipt-details">
      <table>
        <?php foreach ($orders as $order) : ?>
          <tr>
            <td>Nama Menu</td>
            <td>: <?= $order['nama_menu']; ?></td>
          </tr>
          <tr>
            <td>Harga</td>
            <td>: Rp. <?=number_format( $order['harga']); ?></td>
          </tr>
          <tr>
            <td>Jumlah</td>
            <td>: Rp. <?=number_format( $order['jumlah']); ?></td>
          </tr>
         
        <?php endforeach; ?>
      </table>
      <hr>
      <table>
        <tr>
          <td>Total Harga</td>
          <td>: Rp. <?=number_format( $row[0]['grand_total']); ?></td>
        </tr>
        <tr>
          <td>Cash</td>
          <td>: Rp. <?=number_format( $cash); ?></td>
        </tr>
        <tr>
          <td>Change</td>
          <?php

          $charge = $cash -  $row[0]['grand_total'];


          ?>
          <td>: Rp. <?=number_format( $charge); ?></td>
        </tr>
       </table>
    </div>
    <div class="receipt-footer">
      <p>Terima kasih atas kunjungan anda.</p>
    </div>
  </div>
</body>
</html>
