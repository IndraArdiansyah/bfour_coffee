<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bfour Coffee | <?= $judul; ?></title>
  <style>
    body {
      font-family: Arial, sans-serif;
      color: #333;
      background-color: #f8f9fc;
      margin: 20px;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .header img {
      height: 100px;
      width: auto;
    }

    .header-info {
      text-align: right;
    }

    .header-info h4 {
      margin: 0;
      font-size: 14pt;
    }

    .header-info p {
      margin: 0;
      font-size: 12pt;
    }

    .title {
      text-align: center;
      font-size: 18pt;
      margin-bottom: 20px;
    }

    .table-container {
      width: 100%;
      overflow-x: auto;
    }

    .table-data {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    .table-data th,
    .table-data td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }

    .table-data thead {
      background-color: #e9ecef;
    }

    .table-data tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .table-data img {
      width: 70px;
      height: auto;
      border-radius: 5px;
    }

    .footer {
      margin-top: 40px;
      text-align: center;
      font-size: 12pt;
    }

    .signature {
      margin-top: 40px;
      text-align: center;
      font-size: 12pt;
    }

    .signature u {
      border-bottom: 1px solid #000;
    }
  </style>
</head>

<body>
  <div class="header">
    <img src="<?php echo base_url('assets/img/upload/outlet.png'); ?>" alt="Logo">
    <div class="header-info">
      <h4>021 2345 6789</h4>
      <p><strong>Jl. Budhi No.49, Desa/Kelurahan Sukaraja, Kec. Cicendo, Kota Bandung</strong></p>
    </div>
  </div>

  <h2 class="title">Laporan Admin Bfour Coffee</h2>

  <div class="table-container">
    <table class="table-data">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Admin</th>
          <th>Username</th>
          <th>Hak Akses</th>
          <th>Alamat</th>
          <th>Tanggal Input</th>
          <th>Profile</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($row as $data) {
        ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nama_admin']; ?></td>
            <td><?= $data['nip']; ?></td>
            <td>
              <?php
              switch ($data['is_active']) {
                case 1:
                  echo 'Admin';
                  break;
                case 0:
                  echo 'Kasir';
                  break;
                case 2:
                  echo 'Pelanggan';
                  break;
                default:
                  echo 'Unknown';
                  break;
              }
              ?>
            </td>
            <td><?= $data['alamat']; ?></td>
            <td><?= $data['tgl_input']; ?></td>
            <td><img src="<?= base_url('assets/img/profile/') . $data['image']; ?>" alt="Profile Picture"></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <p>Demikian Laporan ini dibuat dengan sebenar-benarnya, untuk diketahui dan digunakan dengan semestinya.</p>

  <p style="text-align: right;">
    Bandung, <?= date('d-m-Y'); ?>
  </p>

  <div class="signature">
    <p>Diketahui oleh</p>
    <br><br><br><br>
    <u>Muhammad Hifzan Izzatur Rahman</u>
    <br>Manager
  </div>
</body>

</html>