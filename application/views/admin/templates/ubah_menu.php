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
              <span class=" d-none d-lg-inline text-black-600 font-weight-bolder"><?= $user['nama_admin']; ?>
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

  <!-- Content -->
  <div class="container-fluid py-4">
    <div class="row mb-4">
      <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
        <div class="card shadow-lg">
          <div class="card-header pb-0 bg-gradient-warning text-white">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h3 class="font-weight-bold">Menu</h3>
                <h4 class="font-weight-bold ms-1"><i class="fa-solid fa-utensils"></i>&nbsp;&nbsp;&nbsp;<?= $judul; ?></h4>
              </div>
            </div>
          </div>
          <div class="card-body px-4 pb-2">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-6">
                  <?php foreach ($menu as $b) { ?>
                    <form action="<?= base_url('home/ubahMenu'); ?>" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <input type="hidden" name="id_menu" id="id_menu" value="<?= $b['id_menu']; ?>">
                        <input type="text" class="form-control form-control-user" id="nama_menu" name="nama_menu" placeholder="Masukkan Nama Menu" value="<?= $b['nama_menu']; ?>" style="margin-bottom: 15px;">
                      </div>
                      <div class="form-group">
                        <select name="id_kategori" class="form-control form-control-user" style="margin-bottom: 15px;">
                          <option value="0" selected="selected">- Pilih kategori -</option>
                          <?php foreach ($kategori as $k) { ?>
                            <option value="<?= $k['id']; ?>" <?= $b['id_kategori'] == $k['id'] ? 'selected' : ''; ?>><?= htmlspecialchars($k['kategori']); ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="harga" name="harga" placeholder="Masukkan Harga Produk" value="<?= $b['harga']; ?>" style="margin-bottom: 15px;">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="harga2" name="harga2" placeholder="Masukkan Harga Upsize Produk" value="<?= $b['harga2']; ?>" style="margin-bottom: 15px;">
                      </div>
                      <div class="form-group">
                        <?php if (isset($b['image'])) { ?>
                          <input type="hidden" name="old_pict" id="old_pict" value="<?= $b['image']; ?>">
                          <picture>
                            <source srcset="" type="image/svg+xml">
                            <img src="<?= base_url('assets/img/upload/') . $b['image']; ?>" class="rounded mx-auto mb-3 d-block" alt="Menu Image" style="max-width: 150px;">
                          </picture>
                        <?php } ?>
                        <input type="file" class="form-control form-control-user" id="image" name="image" style="margin-bottom: 15px;">
                      </div>
                      <div class="form-group d-flex justify-content-between">
                        <input type="button" class="btn btn-secondary col-md-3" value="Kembali" onclick="window.history.go(-1)">
                        <input type="submit" class="btn btn-success col-md-3" value="Update">
                      </div>
                    </form>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Content -->
</main>

<!-- CSS -->
<style>
  .card {
    border-radius: 20px;
  }

  .card-header {
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
  }

  .form-control-user {
    font-size: 16px;
    transition: border-color 0.3s;
    padding-left: 10px;
    border-radius: 10px;
    border: 2px solid grey;
    height: 40px;
  }

  .form-control-user:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
  }

  .btn {
    font-size: 16px;
    padding: 10px;
    transition: background-color 0.3s, transform 0.3s;
  }

  .btn:hover {
    transform: translateY(-2px);
  }

  .btn-secondary {
    background-color: #6c757d;
    border: none;
  }

  .btn-success {
    background-color: #28a745;
    border: none;
  }

  .dropdown-menu-right {
    left: auto;
    right: 0;
  }
</style>