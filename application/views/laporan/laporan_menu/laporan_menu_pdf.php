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
      padding: 20px;
      color: #333;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 2px solid #2E3A59;
    }

    .header img {
      height: 100px;
      width: 200px;
      object-fit: contain;
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
      font-size: 24pt;
      color: #2E3A59;
      text-align: center;
      margin: 20px 0;
      font-weight: bold;
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
      padding: 12px;
      text-align: center;
      font-size: 12pt;
    }

    table thead {
      background-color: #d0d0FF;
      font-weight: bold;
    }

    table tbody tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    table tbody tr:hover {
      background-color: #e0e0ff;
    }

    table img {
      height: 60px;
      width: 60px;
      object-fit: cover;
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

    .signature-table td {
      padding: 20px;
      vertical-align: top;
    }
  </style>
</head>

<body>
  <div class="header">
    <img src="<?php echo base_url('assets/img/upload/outlet.png'); ?>" alt="Bfour Coffee">
    <div class="contact-info">
      <h4>021 2345 6789</h4>
      <h4><strong>Jl. Budhi No.49, Desa/Kelurahan Sukaraja, Kec. Cicendo, Kota Bandung</strong></h4>
    </div>
  </div>

  <hr>

  <h2>Laporan Menu Bfour Coffee</h2>

  <hr>

  <table class="table-data">
    <thead>
      <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Nama Menu</th>
        <th>Nama Kategori</th>
        <th>Harga Regular</th>
        <th>Harga Large</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($row as $item) {
      ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><img src="<?= base_url('assets/img/upload/') . $item['image']; ?>" alt="Menu Image"></td>
          <td><?= $item['nama_menu']; ?></td>
          <td>
            <?php
            $nama_kategori = '';
            foreach ($kategori as $kat) {
              if ($kat['id'] == $item['id_kategori']) {
                $nama_kategori = $kat['kategori'];
                break;
              }
            }
            echo $nama_kategori;
            ?>
          </td>
          <td>Rp.<?= number_format($item['harga'], 0, ',', '.'); ?></td>
          <td>Rp.<?= number_format($item['harga2'], 0, ',', '.'); ?></td>
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
    <table class="signature-table" width="100%">
      <tr>
        <td align="center">Diketahui oleh<br><br><br><br><br><u>Muhammad Hifzan Izzatur Rahman</u><br>Manager</td>
      </tr>
    </table>
  </div>

</body>

</html>