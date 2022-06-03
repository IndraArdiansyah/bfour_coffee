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
  <!-- navabar -->
  <!-- navabar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light position-relative">
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link ">
            <span class="mr-2 d-none d-lg-inline text-dark font-weight-bolder">Beranda</span>
          </a>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
            ariahaspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray font-weight-bolder">Tentang</span>
          </a>
          <!-- Dropdown - User Information -->

          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?= base_url('#'); ?>">
              <i class="fa-solid fa-circle-info"></i>&nbsp;&nbsp;
              Bantuan
            </a>

            <div class="dropdown-divider"></div>

            <a class="dropdown-item" href="<?= base_url('#'); ?>" data-dismiss="modal" datatarget="#logoutModal">
              <i class="fas fa-user fa-sm fa-fw"></i>&nbsp;&nbsp;
              Profile
            </a>
          </div>
        </li>
      </ul>
    </div>
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
        ariahaspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 font-weight-bolder"><?= $user; ?> </span>
      </a>
      <!-- Dropdown - User Information -->

      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="<?= base_url('user'); ?>">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Profile Saya
        </a>

        <div class="dropdown-divider"></div>

        <a class="dropdown-item" href="<?= base_url('autentifikasi/logout'); ?>" data-dismiss="modal"
          datatarget="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>
      </div>
    </li>
    <span class="navbar-text text-dark font-weight-bolder">
      Selamat Datang <strong><?= $user; ?></strong>
    </span>
  </nav>


  <!-- akhir navbar -->

  <!-- selection menu -->
  <div class="carousel">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/img/upload/doctor2.jpg'); ?>"
        style="max-width: 100%; max-height: 100%; height: 500px; width: 1440px">
      <!-- <img src="<?php echo base_url('assets/img/upload/gency.jpeg'); ?>"
        style="max-width: 100%; max-height: 100%; height: 400px; width: 670px"> -->
    </div>
  </div>

  <!-- akhir selection menu -->

  <!-- form pilih poli -->

  <form class="user" method="post" action="<?= base_url('autentifikasi/antrian'); ?>"
    style="margin-top: 130px; margin-left: 350px; width:50%;">
    <select class="form-select position-relative" aria-label="Default select example" name="poli" id="poli"
      style="border: 3px solid #000; border-radius: 20px; text-align: center; font-size: 15px; font-weight: bold">
      <option> --- PILIH POLI --- </option>
      <option value="1" style=" font-weight: bold">PLUM ( Poli Umum )</option>
      <option value="2" style=" font-weight: bold">PLGG ( Poli Gigi )</option>
      <option value="3" style=" font-weight: bold">PLAN ( Poli Anak )</option>
      <option value="4" style=" font-weight: bold">PKIA ( Poli Kesehtan Ibu dan Anak )</option>
    </select>
    <br>
    <!-- <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="box">
          <div class="loket">
            Nomer Antrian Anda
          </div>
          <div class="agenda">
            <h1 id="nomer"><?php echo $antrian->row('no_antrian'); 
					if($antrian->row('no_antrian') < 1){
						$antri=0;
					}
					else{
						$antri=$antrian->row('no_antrian');
					}
					?>
            </h1>
            <center>
              <a href="<?php echo site_url('welcome/tambah_antrian/'.$antri); ?>" class="btn btn-primary"><i
                  class="glyphicon glyphicon-save"></i> &nbsp;Dapatkan Nomer Antrian</a>
            </center>
            <br>
          </div>
        </div>
      </div>
    </div> -->


  </form>



  <!-- akhir form pilih poli -->
  <!-- aktivitas -->
  <section id="aktivitas">
    <div class="aktivitas">
      <div class="row">
        <div class="col text-dark">
          <p style="text-align: center;font-size: 40px; position: relative; font-family: monospace; margin-top: 50px;">
            Helping <strong>You</strong>, Live Your <strong>Life</strong>
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- akhir aktivitas -->