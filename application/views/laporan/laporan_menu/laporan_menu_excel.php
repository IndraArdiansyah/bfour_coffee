<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$title.xls\"");
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
      margin: 0;
      padding: 20px;
      color: #333;
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

    .contact-info {
      text-align: right;
    }

    .contact-info h4 {
      margin: 5px 0;
      font-size: 12pt;
      color: #555;
    }

    h2 {
      font-size: 18pt;
      color: #2E3A59;
      text-align: center;
      margin: 20px 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
      background-color: #FFFFFF;
    }

    table th,
    table td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
      font-size: 12pt;
    }

    table thead {
      background-color: #d0d0d0;
      font-weight: bold;
    }

    table tbody tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    table tbody tr:hover {
      background-color: #e0e0e0;
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
  </style>
</head>

<body>
  <div class="header">
    <h1>Bfour Coffee</h1>
    <div class="contact-info">
      <h4>021 2345 6789</h4>
      <h4><strong>Jl. Budhi No.49, Desa/Kelurahan Sukaraja, Kec. Cicendo, Kota Bandung</strong></h4>
    </div>
  </div>
  <br>

  <h2>Laporan Menu Bfour Coffee</h2>

  <table class="table-data">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Menu</th>
        <th>Nama Kategori</th>
        <th>Harga</th>
        <th>Harga UpSize</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($menu as $row) {
      ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $row['nama_menu']; ?></td>
          <td>
            <?php
            $nama_kategori = '';
            foreach ($kategori as $kat) {
              if ($kat['id'] == $row['id_kategori']) {
                $nama_kategori = $kat['kategori'];
                break;
              }
            }
            echo $nama_kategori;
            ?>
          </td>
          <td>Rp. <?= number_format($row['harga'], 0, ',', '.'); ?></td>
          <td>Rp. <?= number_format($row['harga2'], 0, ',', '.'); ?></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <div class="footer">
    <p>Demikian laporan ini dibuat dengan sebenar-benarnya, untuk diketahui dan digunakan dengan semestinya.</p>
    <p>Bandung, <?= date('d-m-Y'); ?></p>
  </div>

  <div class="signature">
    <p>Diketahui oleh<br><br><br><br><u>Muhammad Hifzan Izzatur Rahman</u><br>Manager Operasional</p>
  </div>

</body>

</html>