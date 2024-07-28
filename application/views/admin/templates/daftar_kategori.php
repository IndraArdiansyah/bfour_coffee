<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg " style="margin-left: 270px;">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="#">Halaman</a></li>
        </ol>
        <h6 class="font-weight-bolder mb-0"><?= $judul; ?></h6>
      </nav>
      <div class="collapse navbar-collapse" id="navbar" style="margin-left: 35rem;">
        <ul class="navbar-nav">
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" ariahaspopup="true" aria-expanded="false">Selamat Datang,
              <span class=" d-none d-lg-inline text-black-600 font-weight-bolder"><?= $user; ?>
              </span>
            </a>
            <!-- Dropdown - User Information -->

            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="<?= base_url('admin/profile'); ?>">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile Saya
              </a>

              <div class="dropdown-divider"></div>

              <a class="dropdown-item" href="<?= base_url('admin/logout'); ?>" data-dismiss="modal" datatarget="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="container-fluid py-3" style="background-color: #DCDCDC;">
    <div class="row mb-4">
      <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
        <div class="card">
          <div class="card-header pb-0 bg-secondary">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h4>Admin</h4>
                <p class="text-sm mb-0">
                <h5 class="font-weight-bold ms-1"><i class="material-icons opacity-10">dns</i>&nbsp;&nbsp;&nbsp;Daftar
                  Kategori
                </h5>
                </p>
              </div>
              <div class="col-lg-6" style="text-align:right">
                <div class=" row">
                  <div class="col-lg-12">
                    <a href="<?= base_url('laporan/print_kategori'); ?>" class="btn btn-light text-primary mb-3"><i class="fas fa-print"></i>&nbsp;&nbsp;Print</a>
                    <a href="<?= base_url('laporan/kategori_pdf'); ?>" class="btn btn-light text-warning mb-3"><i class="far fa-file-pdf"></i>&nbsp;&nbsp;PDF</a>
                    <a href="<?= base_url('laporan/kategori_excel'); ?>" class="btn btn-light text-success mb-3"><i class="far fa-file-excel"></i>&nbsp;&nbsp;Export</a>
                  </div>
                  <a href="<?= base_url('home/edit_kategori'); ?>"><i class="fa-solid fa-pen-to-square"></i><strong>
                      &nbsp;Edit Kategori</strong></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <?php foreach ($KT as $kt) : ?>
              <div class="col-md-4 col-sm-6 mb-4">
                <div class="card bg-gradient-success text-white border-radius-lg">
                  <div class="row g-0 align-items-center">
                    <div class="col-md-4 text-center">
                      <img src="<?= base_url() . '/assets/img/upload/' . $kt['image']; ?>" class="img-fluid rounded-circle" style="width: 80px; height: 80px; border: 2px solid #fff;">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title"><strong><?= $kt['kategori']; ?></strong></h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>