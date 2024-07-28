<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
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
  <div class="container-fluid py-4">
    <div class="row mb-4">
      <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
        <div class="card">
          <div class="card-header pb-0 bg-secondary">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h3>Admin</h3>
                <p class="text-sm mb-0">
                <h4 class="font-weight-bold ms-1"><i class="fa-solid fa-bars"></i>
                  &nbsp;&nbsp;&nbsp;<?= $judul; ?>
                </h4>
                </p>
              </div>
              <div class="col-lg-6" style="text-align:right">
                <div class=" row">
                  <div class="col-lg-12">
                    <a href="<?= base_url('laporan/print_menu'); ?>" class="btn btn-light mb-2 me-2">
                      <i class="fas fa-print text-primary"></i> Print
                    </a>
                    <a href="<?= base_url('laporan/menu_pdf'); ?>" class="btn btn-light mb-2 me-2">
                      <i class="far fa-file-pdf text-danger"></i> PDF
                    </a>
                    <a href="<?= base_url('laporan/menu_excel'); ?>" class="btn btn-light mb-2">
                      <i class="far fa-file-excel text-success"></i> Export
                    </a>
                  </div>
                  <a class="menu" data-toggle="modal" data-target="#TambahMenu"><i class="fa-solid fa-circle-plus"></i><strong>
                      &nbsp;Tambah Menu</strong></a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead class="table-light">
                  <tr>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">No</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Nama Menu</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Gambar</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Kategori</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Harga</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Harga upsize</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-10">Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php foreach ($daftar_menu as $menu) :
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
                            <h6 class="mb-0 text-sm"><?= $menu['nama_menu']; ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <picture>
                            <source srcset="" type="image/svg+xml">
                            <img src="<?= base_url('assets/img/upload/') . $menu['image']; ?>" class="img-fluid img-thumbnail" alt="......." width="70">
                          </picture>
                        </div>
                      </td>
                      <td class=" justify-content-center">
                        <h6>
                          <?php
                          $nama_kategori = '';
                          foreach ($kategori as $kat) {
                            if ($kat['id'] == $menu['id_kategori']) {
                              $nama_kategori = $kat['kategori'];
                              break;
                            }
                          }
                          echo $nama_kategori;
                          ?>
                        </h6>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Rp.<?= number_format($menu['harga']); ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Rp.<?= number_format($menu['harga2']); ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <a href="<?= base_url('home/ubahMenu/') . $menu['id_menu']; ?>" class="btn btn-info btn-sm text-white"><i class="fas fa-edit"></i>
                          Ubah</a>
                        <a href="<?= base_url('home/hapusMenu/') . $menu['id_menu']; ?>" onclick="return confirm('kamu yakin akan menghapus <?= $judul . ' ' . $menu['nama_menu']; ?> ?');" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i> Hapus</a>
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