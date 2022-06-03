<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Puskesmas | <?= $judul; ?> </title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/nucleo-icons.css');?>" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/nucleo-svg.css');?>" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/material-dashboard.css?v=3.0.2');?>" type="text/css">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-icon.png');?>" type="text/css">
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.png');?>">

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <!-- my CSS -->
  <!-- <link rel="stylesheet" href="assets/css/style.css" /> -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>" type="text/css">


  <!-- font awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome-free-6.1.1-web/css/all.min.css')?>"
    type="text/css">
  <!-- <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet"> -->

  <title>Dashboard Puskesmas</title>
</head>

<style>
.nama h2 {
  font-size: 35px;
}

img {
  opacity: 0.5;
}

.navnav {
  background-color: #e3f2fd;
}
</style>

<body>
  <!-- header -->
  <header style="background-color: #F0FFFF;">
    <div class="container">
      <div class="row">
        <div class="logo col-md-1 pt-2">
          <img src="<?php echo base_url('assets/img/upload/logo2.png'); ?>"
            style="max-width: 100%; max-height: 100%; height: 90px; width: 220px">
        </div>
        <div class="nama col-md-6 pt-2">
          <ul>
            <h3>Puskesmas</h3>
            <h1><strong>CIPINANG</strong></h1>
          </ul>
        </div>
        <div class="sosmed col-md-5">
          <ul>
            <a class="nav-link text-primary" href="#">
              <h5><i class="fa-brands fa-whatsapp-square text-success"></i>&nbsp; 021 2345 6789</h5>
            </a>

            <a class="nav-link text-primary" href="#">
              <h5><i class="fa-solid fa-location-dot text-success"></i>&nbsp;&nbsp; jl. cipinang muara No.49, Jakarta
                Timur
              </h5>
            </a>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <!-- akhir header -->