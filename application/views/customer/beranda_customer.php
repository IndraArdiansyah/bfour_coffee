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
    <div class="container-fluid py-3" style="background-color: #DCDCDC;">
      <div class="row mb-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0" style="background-color: rgb(47, 79, 79);">
              <div class="row">
                <div class="col-lg-4 col-4">
                  <h4 class="font-weight-bold ms-1 text-light"><?= $judul; ?>
                  </h4>
                </div>
                <div class="col-lg-4 col-4">
                </div>
                <div class="col-lg-4 col-4">
                  <form action="<?= base_url('customer/cari') ?>">
                    <div class="input-group mb-3" style="height: 50%;">
                      <input type="text" class="form-control text-light font-weight-bold ps-4" placeholder="    Search Keyword..." name="keyword" style="height: 40px; border:2px solid white" required>
                      <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                  </form>
                  <a class="btn btn-warning ms-7" href="<?= base_url('user'); ?>">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Checkout&nbsp;
                    <span class="badge bg-success"><b><?= $this->ModelBooking->getDataWhere('temp', ['nip' => $this->session->userdata('nip')])->num_rows(); ?> </b></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="products">
            <?php foreach ($menu as $menu) :
            ?>
              <div class="product-card">
                <div class="product-image">
                  <picture>
                    <source srcset="" type="image/svg+xml">
                    <img src="<?= base_url('assets/img/upload/') . $menu['image']; ?>" class="img-fluid img-thumbnail" alt="......." width="170">
                  </picture>
                </div>
                <div class="product-content">
                  <h4><?= $menu['nama_menu']; ?></h4>
                </div>
                <!-- <hr> -->
                <?php if ($menu['harga'] != 0) : ?>
                  <div class="product-price mt-3">
                    <h6>Regular : &nbsp;Rp. <?= number_format($menu['harga']); ?></h6>
                  </div>
                <?php endif; ?>

                <?php if ($menu['harga2'] != 0) : ?>
                  <div class="product-price">
                    <h6>Large : &nbsp;Rp. <?= number_format($menu['harga2']); ?></h6>
                  </div>
                <?php endif; ?>

                <div class="product">
                  <a href="<?= base_url('user/keranjang?filter=') . $menu['id_menu'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-shopping-cart me-1"></i> Keranjang</a>
                  <a href="<?= base_url('customer/detailMenu?filter=') . $menu['id_menu'] ?>" class="btn btn-sm btn-outline-secondary"><i class="fa fa-eye me-1"></i> Detail</a>

                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </main>