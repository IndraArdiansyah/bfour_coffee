    <!-- navabar -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg " style="margin-left: 270px;">
      <nav class="nav navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
          <div class="collapse navbar-collapse" id="navbar" style="margin-left: 40rem;">
            <ul class="navbar-nav">
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" ariahaspopup="true" aria-expanded="false">Selamat datang
                  <span class=" d-none d-lg-inline text-black-600 font-weight-bolder"> <?= $user; ?>
                  </span>
                </a>
                <!-- Dropdown - User Information -->

                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
      <!-- content -->
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
              <div class="card-header bg-secondary py-3">
                <h4 class="card-title mb-0"><i class="fa-solid fa-plus me-2"></i><?= $judul; ?></h4>
              </div>
              <div class="card-body">
                <?php foreach ($menu as $menu) : ?>
                  <form action="<?= base_url('user/add'); ?>" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <div class="col-md-5">
                        <?php if (isset($menu['image'])) : ?>
                          <input type="hidden" name="image" id="image" value="<?= $menu['image']; ?>">
                          <img src="<?= base_url('assets/img/upload/') . $menu['image']; ?>" class="img-fluid rounded mx-auto mb-3 d-block" alt="<?= $menu['nama_menu']; ?>" style="width: 100%;">
                        <?php endif; ?>
                      </div>
                      <div class="col-md-7">
                        <input type="hidden" name="id_menu" id="id_menu" value="<?= $menu['id_menu']; ?>">
                        <div class="mb-3">
                          <input type="text" readonly class="form-control form-control-user" id="nama_menu" name="nama_menu" placeholder="Masukkan Nama Menu" value="<?= $menu['nama_menu']; ?>" style="width: 100%; height: 40px; border-radius: 10px; border: 2px solid grey; padding-left: 10px;">
                        </div>
                        <div class="mb-3">
                          <select name="harga" id="harga" onchange="total()" class="form-control form-control-user" style="width: 100%; height: 40px; border-radius: 10px; border: 2px solid grey; padding-left: 10px;" required>
                            <option value="" disabled selected>- Pilih Ukuran -</option>
                            <option value="<?= $menu['harga']; ?>">Regular</option>
                            <?php if ($menu['harga2'] != 0) : ?>
                              <option value="<?= $menu['harga2']; ?>">Large</option>
                            <?php endif; ?>
                          </select>
                          <div class="invalid-feedback">
                            Silakan pilih ukuran.
                          </div>
                        </div>
                        <div class="mb-3">
                          <input type="number" onchange="total()" class="form-control form-control-user" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah Produk" min="1" value="1" style="width: 100%; height: 40px; border-radius: 10px; border: 2px solid grey; padding-left: 10px;">
                        </div>
                        <div class="mb-3">
                          <input type="text" readonly class="form-control form-control-user" id="Total" name="Total" placeholder="Harga Total Produk" style="width: 100%; height: 40px; border-radius: 10px; border: 2px solid grey; padding-left: 10px;">
                        </div>
                        <br>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                          <button type="button" class="btn btn-secondary " onclick="window.history.go(-1)">Kembali</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </div>
                  </form>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end content -->
    </main>