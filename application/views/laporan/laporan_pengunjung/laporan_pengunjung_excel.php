<?php
header("content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bfour Coffee | <?= $judul; ?> </title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .header-table {
      width: 100%;
      margin-bottom: 20px;
    }

    .header-table h1,
    .header-table h4 {
      margin: 0;
    }

    .header-table .left {
      text-align: left;
    }

    .header-table .right {
      text-align: right;
    }

    .header-table hr {
      border: 0;
      border-top: 1px solid #000;
      margin: 10px 0;
    }

    .table-data,
    .table-summary {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    .table-data th,
    .table-data td,
    .table-summary th,
    .table-summary td {
      border: 1px solid #000;
      padding: 8px;
      text-align: center;
    }

    .table-data thead {
      background-color: #4CAF50;
      color: white;
    }

    .table-data tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .table-summary thead {
      background-color: #f0f0f0;
    }

    .footer {
      width: 100%;
      text-align: right;
      margin-top: 20px;
    }

    .footer td {
      padding-top: 20px;
    }

    .sign {
      margin-top: 50px;
      text-align: right;
    }
  </style>
</head>

<body>
  <table class="header-table">
    <tr>
      <td class="left" colspan="2">
        <h1 style="color: #8B0000;"><strong>Bfour</strong> Coffee</h1>
      </td>
      <td></td>
      <td></td>
      <td style="text-align: right; color: #8B0000;" colspan="3">
        <h4>021 2345 6789</h4>
        <h4><strong>Jl. Budhi No.49, Desa/Kelurahan Sukaraja, Kec. Cicendo, Kota Bandung</strong></h4>
      </td>
    </tr>

  </table>
  <hr>
  <h2 style="text-align: center; color: #B22222;">Laporan Pengunjung Bfour Coffee</h2>
  <hr>

  <table class="table-data">
    <thead>
      <tr style="color: #B22222;">
        <th>No</th>
        <th>ID Booking</th>
        <th>Nama Menu</th>
        <th>Total</th>
        <th>Tanggal Pemesanan</th>
        <th>Metode Pembayaran</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php if (isset($pengunjung) && !empty($pengunjung)) : ?>
        <?php
        $no = 1;
        $totalPesanan = 0;
        $totalPemasukan = 0;
        $detailPembayaran = ['Qris' => 0, 'cash' => 0];

        foreach ($pengunjung as $row) {
          $totalPesanan++;
          $totalPemasukan += $row['total'];
          if ($row['metode_pembayaran'] == 'Qris') {
            $detailPembayaran['Qris'] += $row['total'];
          } elseif ($row['metode_pembayaran'] == 'cash') {
            $detailPembayaran['cash'] += $row['total'];
          }
        ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['id_booking'] ?></td>
            <td><?= $row['nama_menu'] ?></td>
            <td><?= $row['total'] ?></td>
            <td><?= $row['tgl_booking'] ?></td>
            <td><?= $row['metode_pembayaran'] ?></td>
            <td><?= $row['status'] ?></td>
          </tr>
        <?php
        }
        ?>
      <?php else : ?>
        <tr>
          <td colspan="7">Tidak ada data ditemukan.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
  <br>
  <!-- Summary Table -->
  <table class="table-summary">
    <thead>
      <tr style="color: #B22222;">
        <th>Total Pesanan</th>
        <th>QRIS</th>
        <th>Cash</th>
        <th>Total Pemasukan</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($totalPesanan) && empty($detailPembayaran['Qris']) && empty($detailPembayaran['cash']) && empty($totalPemasukan)) : ?>
        <tr>
          <td colspan="7">Tidak ada data ditemukan.</td>
        </tr>
      <?php else : ?>
        <tr>
          <td><?= $totalPesanan ?></td>
          <td>Rp. <?= number_format($detailPembayaran['Qris']) ?></td>
          <td>Rp. <?= number_format($detailPembayaran['cash']) ?></td>
          <td>Rp. <?= number_format($totalPemasukan) ?></td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

  <p>Demikian laporan ini dibuat dengan sebenar-benarnya, untuk diketahui dan digunakan dengan semestinya.</p>
  <div class="footer">
    <p>Bandung, <?= date('d-m-Y'); ?></p>
  </div>
  <div class="sign" style="text-align: center;">
    <p>Diketahui oleh<br><br><br><br><u>Muhammad Hifzan Izzatur Rahman</u><br>Manager</p>
  </div>
</body>

</html>