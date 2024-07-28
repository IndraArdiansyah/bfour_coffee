<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f9fe;
    }

    .navbar-main {
      background-color: #ffffff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .navbar-toggler-icon span {
      background-color: #000;
      display: block;
      height: 3px;
      width: 25px;
      margin-bottom: 5px;
    }

    .navbar-toggler {
      border: none;
    }

    .dropdown-menu {
      margin-top: 0;
      border: none;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }

    .card-header {
      background-color: #6c757d;
      color: #fff;
    }

    .product-card {
      background-color: #fff;
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .product-card h5 {
      margin-bottom: 10px;
    }

    .product-image img {
      max-width: 100%;
      height: auto;
      border-radius: 8px;
    }

    .product-icons a {
      color: #000;
      margin-right: 10px;
    }

    .product-icons a:hover {
      color: #fbbc05;
    }

    @media (max-width: 992px) {
      .navbar-main {
        margin-left: 0 !important;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="nav navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <button class="navbar-toggler shadow-none ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="bg-gradient-dark shadow-soft border-radius-md" style="width: 1.25rem; height: 0.125rem;"></span>
          <span class="bg-gradient-dark shadow-soft border-radius-md mt-1" style="width: 1.25rem; height: 0.125rem;"></span>
          <span class="bg-gradient-dark shadow-soft border-radius-md mt-1" style="width: 1.25rem; height: 0.125rem;"></span>
        </span>
      </button>

      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Selamat datang
              <span class="d-none d-lg-inline text-black-600 font-weight-bolder"><?= $user; ?></span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="<?= base_url('member/profile'); ?>">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile Saya
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?= base_url('admin/logout'); ?>" data-dismiss="modal" data-target="#logoutModal">
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

  <!-- Main Content -->
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-3" style="background-color: #DCDCDC;">
      <div class="row mb-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0 bg-secondary">
              <div class="row">
                <div class="col-lg-4 col-4">
                  <h4 class="font-weight-bold ms-1"><i class="fa-solid fa-clipboard-list"></i>&nbsp;&nbsp;&nbsp;<?= $judul;?></h4>
                </div>
                <div class="col-lg-4 col-4">
                  <!-- Leave empty for spacing or other buttons -->
                </div>
                <div class="col-lg-4 col-4">
                  <form action="<?= base_url('member/cari')?>" class="d-flex">
                    <input type="text" class="form-control text-light font-weight-bold ps-4" placeholder="Search Keyword..." name="keyword" style="height: 40px; border: 2px solid white;" required>
                    <button class="btn btn-primary ms-2" type="submit">Search</button>
                  </form>
                  <a class="btn btn-warning ms-2" href="<?= base_url('booking'); ?>">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Checkout&nbsp;
                    <span class="badge bg-success"><b><?= $this->ModelBooking->getDataWhere('temp', ['nip' => $this->session->userdata('nip')])->num_rows(); ?></b></span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- Products -->
          <div class="products mt-4">
            <?php foreach ($menu as $menu) : ?>
              <div class="product-card">
                <div class="product-content">
                  <h5><?= $menu['nama_menu']; ?></h5>
                </div>
                <div class="product-image">
                  <img src="<?= base_url('assets/img/upload/') . $menu['image']; ?>" class="img-fluid img-thumbnail" alt="<?= $menu['nama_menu']; ?>" width="170">
                </div>
                <?php if ($menu['harga'] != 0) : ?>
                  <div class="product-price mt-3">
                    <h6>Regular : Rp. <?= number_format($menu['harga']); ?></h6>
                  </div>
                <?php endif; ?>
                <?php if ($menu['harga2'] != 0) : ?>
                  <div class="product-price">
                    <h6>Large : Rp. <?= number_format($menu['harga2']); ?></h6>
                  </div>
                <?php endif; ?>   
                <div class="product-icons mt-3">
                  <a href="<?= base_url('booking/keranjang?filter=') .$menu['id_menu']?>"><i data-feather="shopping-cart"></i></a>
                  <a href="<?= base_url('member/detailMenu?filter=') .$menu['id_menu']?>"><i data-feather="eye"></i></a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <!-- End Products -->
        </div>
      </div>
    </div>
    <!-- End Main Content -->
  </main>

  <!-- Bootstrap JS, Popper.js, and jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
