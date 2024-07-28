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
  <style type="text/css">
    body {
      font-family: Arial, sans-serif;
      background-color: #F8F8F8;
      margin: 0;
      padding: 0;
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
      padding: 10px;
    }

    .header img {
      max-height: 50px;
      /* Membatasi tinggi gambar */
      max-width: 50%;
      /* Membatasi lebar gambar */
      height: auto;
      /* Menjaga proporsi gambar */
      margin: 0 auto;
    }

    .header h1 {
      font-size: 24pt;
      color: #333;
      margin: 0;
      padding: 0;
    }

    .header h4 {
      font-size: 12pt;
      color: #555;
    }

    .contact-info {
      text-align: right;
      margin-top: -80px;
      margin-right: 50px;
    }

    .title {
      text-align: center;
      margin: 20px 0;
      font-size: 18pt;
      color: #333;
    }

    .table-data {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    .table-data th,
    .table-data td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
    }

    .table-data th {
      background-color: #f4f4f4;
      font-weight: bold;
    }

    .table-data td {
      background-color: #ffffff;
    }

    .footer {
      margin-top: 40px;
    }

    .footer p {
      text-align: right;
      font-size: 12pt;
      color: #333;
    }

    .signature {
      text-align: center;
      margin-top: 40px;
    }
  </style>
</head>

<body>
  <div class="header">
    <h1><strong>Bfour</strong> Coffee</h1>
    <div class="contact-info">
      <h4>021 2345 6789</h4>
      <h4><strong>Jl. Budhi No.49, Desa/Kelurahan Sukaraja, Kec. Cicendo, Kota Bandung</strong></h4>
    </div>
  </div>

  <hr>

  <h2 class="title">Laporan Admin Bfour Coffee</h2>

  <hr>

  <table class="table-data">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Admin</th>
        <th>Username</th>
        <th>Hak Akses</th>
        <th>Alamat</th>
        <th>Tanggal Input</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($admin as $row) {
      ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $row['nama_admin'] ?></td>
          <td><?= $row['nip'] ?></td>
          <td>
            <?php
            switch ($row['is_active']) {
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
          <td><?= $row['alamat'] ?></td>
          <td><?= $row['tgl_input'] ?></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <div class="footer">
    <p>Demikian Laporan ini dibuat dengan sebenar-benarnya, untuk diketahui dan digunakan dengan semestinya.</p>
    <p>Bandung, <?= date('d-m-Y'); ?></p>
  </div>

  <div class="signature">
    <p>Diketahui oleh</p>
    <br><br><br><br>
    <u>Muhammad Hifzan Izzatur Rahman</u><br>Manager
  </div>

</body>

</html>