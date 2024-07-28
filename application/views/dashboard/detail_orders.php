<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg " style="margin-left: 270px;">
  <!-- Navbar -->
  <nav class="nav navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <div class="collapse navbar-collapse" id="navbar" style="margin-left: 47em;">
        <ul class="navbar-nav">
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Selamat datang
              <span class="d-none d-lg-inline text-black-600 font-weight-bolder"> <?= $user; ?>
              </span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="<?= base_url('member/profile'); ?>">
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
                <p class="text-sm mb-0">
                <h4 class="font-weight-bold ms-1"><i class="fa-solid fa-users"></i>
                  &nbsp;&nbsp;&nbsp;<?= $judul; ?>
                </h4>
                </p>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive">
              <table class="table align-items-center text-center mb-0">
                <thead class="table-header" style="background-color: #d0d0d0;">
                  <tr>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">No</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Nama User</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">ID Booking</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Nama Menu</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Total</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Tgl Pemesanan</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">M. Pembayaran</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Status</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($daftar_pengunjung as $pengunjung) : ?>
                    <tr>
                      <td style="background-color: #d0d0d0;">
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= ++$start; ?></h6>
                          </div>
                        </div>
                      </td>
                      <td style="max-width: 90px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $pengunjung['nama_admin']; ?></h6>
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
                      <td style="max-width: 130px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
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
                        <?php if ($pengunjung['status'] == 'unpaid') : ?>
                          <a href="<?= base_url('booking/Qris/') . $pengunjung['id_booking']; ?>" target="_blank" name="filter" class="badge badge-warning text-primary">Cetak&nbsp;<i class="fas fa-print text-danger"></i></a>
                        <?php else : ?>
                          <a href="<?= base_url('booking/struk/') . $pengunjung['id_booking']; ?>" target="_blank" name="filter" class="badge badge-info text-primary">Cetak&nbsp;<i class="fas fa-print text-danger"></i></a>
                        <?php endif; ?>
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