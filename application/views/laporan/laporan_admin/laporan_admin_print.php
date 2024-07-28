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
      margin: 5px 0;
      font-size: 14pt;
    }

    .title {
      text-align: center;
      margin: 20px 0;
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
      text-align: left;
    }

    .table-data thead {
      background-color: #d0d0FF;
    }

    .table-data tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .table-data img {
      height: 50px;
      width: auto;
      border-radius: 5px;
    }

    .footer {
      margin-top: 40px;
      text-align: center;
    }

    .footer p {
      margin: 10px 0;
    }

    .signatures {
      margin-top: 40px;
      text-align: center;
      width: 100%;
    }

    .signatures div {
      display: inline-block;
      width: 45%;
      vertical-align: top;
    }

    .signatures div:first-child {
      margin-right: 10%;
    }
  </style>
</head>

<body>
  <script type="text/javascript">
    window.print();
  </script>

  <div class="header">
    <img src="<?= base_url('assets/img/upload/outlet.png'); ?>" alt="Logo">
    <div class="contact-info">
      <h4>021 2345 6789</h4>
      <h4><strong>Jl. Budhi No.49, Desa/Kelurahan Sukaraja, Kec. Cicendo, Kota Bandung</strong></h4>
    </div>
  </div>

  <hr>

  <div class="title">
    <h2>Laporan Admin Bfour COFFEE</h2>
  </div>

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
      foreach ($row as $admin) {
      ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $admin['nama_admin']; ?></td>
          <td><?= $admin['nip']; ?></td>
          <td><?= $admin['is_active']; ?></td>
          <td><?= $admin['alamat']; ?></td>
          <td><?= $admin['tgl_input']; ?></td>
          <td><img src="<?= base_url('assets/img/profile/') . $admin['image']; ?>" alt="Profile Image"></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <div class="footer">
    <p>Demikian laporan ini dibuat dengan sebenar-benarnya, untuk diketahui dan digunakan dengan semestinya.</p>
    <p style="text-align: right;">Bandung, <?= date('d-m-Y'); ?></p>
  </div>

  <div class="signatures">
    <div>
      <p>Diketahui oleh<br><br><br><br><u>Muhammad Hifzan Izzatur Rahman</u><br>Manager Operasional</p>
    </div>
  </div>
</body>

</html>