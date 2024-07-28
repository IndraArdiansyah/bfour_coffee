<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>bfour Coffee | <?= $judul; ?> </title>
  <style type="text/css">
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      color: #333;
    }

    .container {
      width: 100%;
      max-width: 1200px;
      margin: auto;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 0;
    }

    .header img {
      height: 80px;
    }

    .header .contact-info {
      text-align: right;
    }

    .header .contact-info h4 {
      margin: 0;
      font-size: 14px;
    }

    .header .contact-info p {
      margin: 5px 0;
      font-size: 12px;
    }

    .title {
      text-align: center;
      margin: 20px 0;
    }

    .table-data {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 30px;
    }

    .table-data thead {
      background-color: #d0d0FF;
    }

    .table-data th,
    .table-data td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    .table-data th {
      background-color: #b0b0ff;
      color: #fff;
    }

    .table-data td {
      background-color: #f9f9f9;
    }

    .table-summary {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    .table-summary thead {
      background-color: #c0c0ff;
    }

    .table-summary th,
    .table-summary td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }

    .table-summary th {
      background-color: #a0a0ff;
      color: #fff;
    }

    .table-summary td {
      background-color: #f2f2f2;
    }

    .footer {
      margin-top: 30px;
      text-align: right;
      font-size: 12px;
    }

    .signature {
      margin-top: 50px;
      text-align: center;
      font-size: 14px;
    }
  </style>
</head>

<body>
  <script type="text/javascript">
    window.print();
  </script>

  <div class="container">
    <!-- Header Section -->
    <div class="header">
      <img src="<?php echo base_url('assets/img/upload/outlet.png'); ?>" alt="Bfour Coffee">
      <div class="contact-info">
        <h4>021 2345 6789</h4>
        <p><strong>Jl.Budhi No.49, Desa/Kelurahan Sukaraja, Kec. Cicendo, Kota Bandung</strong></p>
      </div>
    </div>

    <!-- Title Section -->
    <div class="title">
      <h2>Laporan Pengunjung Bfour Coffee</h2>
    </div>

    <!-- Data Table -->
    <table class="table-data">
      <thead>
        <tr>
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
        <?php if (isset($row) && !empty($row)) : ?>
          <?php
          $no = 1;
          $totalPesanan = 0;
          $totalPemasukan = 0;
          $detailPembayaran = ['Qris' => 0, 'cash' => 0];

          foreach ($row as $data) {
            $totalPesanan++;
            $totalPemasukan += $data['total'];
            if ($data['metode_pembayaran'] == 'Qris') {
              $detailPembayaran['Qris'] += $data['total'];
            } elseif ($data['metode_pembayaran'] == 'cash') {
              $detailPembayaran['cash'] += $data['total'];
            }
          ?>
            <tr>
              <td scope="row"><?= $no++; ?></td>
              <td><?= $data['id_booking'] ?></td>
              <td><?= $data['nama_menu'] ?></td>
              <td><?= number_format($data['total'], 2) ?></td>
              <td><?= $data['tgl_booking'] ?></td>
              <td><?= $data['metode_pembayaran'] ?></td>
              <td><?= $data['status'] ?></td>
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

    <!-- Summary Table -->
    <table class="table-summary">
      <thead>
        <tr>
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

    <!-- Footer Section -->
    <div class="footer">
      <p>Demikian Laporan ini dibuat dengan sebenar-benarnya, untuk diketahui dan digunakan dengan semestinya.</p>
      <p>Bandung, <?= date('d-m-Y'); ?></p>
    </div>

    <!-- Signature Section -->
    <div class="signature">
      <p>Diketahui oleh</p>
      <br><br><br><br><br>
      <p><u>Muhammad Hifzan Izzatur Rahman</u><br>Manager Operasional</p>
    </div>
  </div>
</body>

</html>