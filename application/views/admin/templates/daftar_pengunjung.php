<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="#">Halaman</a></li>
        </ol>
        <h6 class="font-weight-bolder" style="width: 140px;"><?= $judul; ?></h6>
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
  <div class="container-fluid py-4">
    <div class="row mb-4">
      <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
        <div class="card">
          <div class="card-header pb-0 bg-secondary">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h3>Admin</h3>
                <p class="text-sm mb-0">
                <h4 class="font-weight-bold ms-1"><i class="fa-solid fa-users"></i>
                  &nbsp;&nbsp;&nbsp;<?= $judul; ?>
                </h4>
                </p>
              </div>
              <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <a href="<?= base_url('laporan/pengunjung_print'); ?>" class="btn btn-light mb-2 me-2" data-toggle="modal" data-target="#printModal">
                  <i class="fas fa-print text-primary"></i> Print
                </a>
                <a href="<?= base_url('laporan/pengunjung_pdf'); ?>" class="btn btn-light mb-2 me-2" data-toggle="modal" data-target="#pdfModal">
                  <i class="far fa-file-pdf text-danger"></i> PDF
                </a>
                <a href="<?= base_url('laporan/pengunjung_excel'); ?>" class="btn btn-light mb-2" data-toggle="modal" data-target="#excelModal">
                  <i class="far fa-file-excel text-success"></i> Export
                </a>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive">
              <table class="table align-items-center text-centar mb-0">
                <thead class="table-header" style="background-color: #d0d0d0;">
                  <tr>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">No</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">ID Booking</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Nama Menu</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Total</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Tgl. Pemesanan</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">m. Pembayaran</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Status</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php foreach ($daftar_pengunjung as $pengunjung) :
                    ?>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= ++$start; ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $pengunjung['id_booking']; ?></h6>
                          </div>
                        </div>
                      </td>
                      <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $pengunjung['nama_menu']; ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Rp.<?= number_format($pengunjung['total']); ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $pengunjung['tgl_booking']; ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $pengunjung['metode_pembayaran']; ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $pengunjung['status']; ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <a href="<?= base_url('home/hapusPengunjung/') . $pengunjung['id_booking']; ?>" onclick="return confirm('kamu yakin akan menghapus <?= $judul . ' ' . $pengunjung['id_booking']; ?> ?');" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i> Hapus</a>
                      </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
              <?= $this->pagination->create_links(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>