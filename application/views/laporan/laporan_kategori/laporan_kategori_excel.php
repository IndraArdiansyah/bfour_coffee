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
      color: #333;
      background-color: #F8F8F8;
      margin: 0;
      padding: 20px;
    }

    h1,
    h2,
    h4 {
      margin: 0;
    }

    h1 {
      font-size: 24pt;
      color: #2E3A59;
      font-weight: bold;
      text-align: center;
    }

    h2 {
      font-size: 20pt;
      color: #2E3A59;
      text-align: center;
      margin: 20px 0;
    }

    h4 {
      font-size: 12pt;
      color: #555;
      font-weight: normal;
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 40px;
    }

    table th,
    table td {
      border: 1px solid #333;
      padding: 10px;
      font-size: 12pt;
      text-align: center;
    }

    table thead {
      background-color: #d0d0d0;
      font-weight: bold;
    }

    table tbody tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    table tbody tr:hover {
      background-color: #e0e0ff;
    }

    .header-table,
    .signature-table {
      width: 100%;
      margin-bottom: 20px;
    }

    .header-table td,
    .signature-table td {
      padding: 5px;
      text-align: center;
    }

    .footer {
      margin-top: 40px;
      text-align: center;
    }
  </style>
</head>

<body>
  <table class="header-table">
    <tr>
      <td colspan="3">
        <h1>Bfour Coffee</h1>
      </td>
    </tr>
    <tr>
      <td colspan="3">
        <h4>021 2345 6789</h4>
        <h4><strong>Jl. Budhi No.49, Desa/Kelurahan Sukaraja, Kec. Cicendo, Kota Bandung</strong></h4>
      </td>
    </tr>
  </table>

  <hr>

  <h2>Laporan Admin Bfour Coffee</h2>

  <hr>

  <table class="table-data">
    <thead>
      <tr>
        <th>No</th>
        <th>ID Kategori</th>
        <th>Nama Kategori</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($kategori as $row) {
      ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $row['id'] ?></td>
          <td><?= $row['kategori'] ?></td>
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

  <table class="signature-table">
    <tr>
      <td colspan="3">
        <p>Diketahui oleh</p>
        <br><br><br><br>
        <u>Muhammad Hifzan Izzatur Rahman</u><br>Manager Operasional
      </td>
    </tr>
  </table>

</body>

</html>