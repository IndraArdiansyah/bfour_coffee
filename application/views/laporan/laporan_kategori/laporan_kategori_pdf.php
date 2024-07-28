<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bfour Coffee | <?= $judul; ?> </title>
  <style type="text/css">
    body {
      font-family: Arial, sans-serif;
      color: #333;
      background-color: #F0F0FF;
      margin: 0;
      padding: 20px;
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

    .header .contact-info {
      text-align: right;
    }

    .header .contact-info h4 {
      margin: 0;
      font-size: 14pt;
    }

    .header .contact-info p {
      margin: 0;
      font-size: 12pt;
      font-weight: bold;
    }

    .title {
      text-align: center;
      margin: 20px 0;
      font-size: 20pt;
      color: #2E3A59;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 40px;
    }

    table th,
    table td {
      border: 1px solid #333;
      padding: 12px;
      text-align: left;
    }

    table thead {
      background-color: #d0d0FF;
    }

    table tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    table tbody tr:hover {
      background-color: #e0e0ff;
    }

    .footer {
      text-align: right;
      margin-top: 40px;
    }

    .signature {
      text-align: center;
      margin-top: 60px;
    }

    .signature table {
      margin: 0 auto;
      border-collapse: collapse;
      width: 100%;
    }

    .signature td {
      text-align: center;
      vertical-align: top;
    }

    .signature u {
      text-decoration: underline;
    }

    .signature img {
      height: 100px;
      width: auto;
      display: block;
      margin: 20px auto;
    }
  </style>
</head>

<body>
  <script type="text/javascript">
    window.print();
  </script>

  <div class="header">
    <img src="<?php echo base_url('assets/img/upload/outlet.png'); ?>" alt="Logo">
    <div class="contact-info">
      <h4>021 2345 6789</h4>
      <p>Jl. Budhi No.49, Desa/Kelurahan Sukaraja, Kec. Cicendo, Kota Bandung</p>
    </div>
  </div>

  <hr>

  <div class="title">
    <h2>Laporan Kategori Bfour Coffee</h2>
  </div>

  <table class="table-data">
    <thead>
      <tr>
        <th>No</th>
        <th>ID Kategori</th>
        <th>Nama Kategori</th>
        <th>Gambar Kategori</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($row as $kt) {
      ?>
        <tr>
          <td scope="row"><?= $no++; ?></td>
          <td><?= $kt['id']; ?></td>
          <td><?= $kt['kategori']; ?></td>
          <td>
            <img src="<?= base_url('assets/img/upload/' . $kt['image']); ?>" alt="<?= $kt['kategori']; ?>" style="width: 100px; height: auto;">
          </td>
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
    <table>
      <tr>
        <td>Diketahui Oleh
          <br><br><br><br>
          <u>Muhammad Hifzan Izzatur Rahman</u><br>Manager Operasional
        </td>
      </tr>
    </table>
  </div>

</body>

</html>