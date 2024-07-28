<!-- sidebar -->

<body class="g-sidenav-show  bg-gray-200">
  <aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-1 fixed-start ms-2 bg-gradient-dark"
    id="sidenav-main" style="height: 55%;">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#">
        <img src="<?php echo base_url('assets/img/upload/outlet.PNG'); ?>"
          style=" height: 50px; width: 70px; ">
        <span class="font-weight-bold text-white" style="font-size: 20px;">&nbsp;&nbsp;Bfour Coffee</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="<?= base_url('home');?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Beranda</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">--  Master Pages  --</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="<?= base_url('home/daftar_admin');?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-user-tie"></i>
            </div>
            <span class="nav-link-text ms-1">Data Anggota</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="<?= base_url('home/daftar_kategori');?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-bars"></i>
            </div>
            <span class="nav-link-text ms-1">Daftar Kategori</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="<?= base_url('home/daftar_menu');?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-list"></i>
            </div>
            <span class="nav-link-text ms-1">Daftar Menu</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="<?= base_url('home/pengunjung');?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-person"></i>
            </div>
            <span class="nav-link-text ms-1">Pengunjung</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>