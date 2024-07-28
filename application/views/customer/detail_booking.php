    <!-- navabar -->
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg " style="margin-left: 270px;">
  <nav class="nav navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <div class="collapse navbar-collapse" id="navbar" style="margin-left: 47em;">
        <ul class="navbar-nav">
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
              ariahaspopup="true" aria-expanded="false">Selamat datang
              <span class=" d-none d-lg-inline text-black-600 font-weight-bolder"> <?= $user; ?>
              </span>
            </a>


              <a class="dropdown-item" href="<?= base_url('admin/logout'); ?>" data-dismiss="modal"
                datatarget="#logoutModal">
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
              <div class="col-lg-4 col-4">
                <h4 class="font-weight-bold ms-1"><i class="fa-solid fa-clipboard-list"></i>&nbsp;&nbsp;&nbsp;<?= $judul;?>
                </h4>
              </div>
              <div class="col-lg-4 col-4">
              </div>
            </div>
          </div>
        </div>
        <?php foreach ($menu as $menu) : ?>
        <div class="container-fluid py-4">
          <div class="row no-gutters">
            <div class="col-md-4">
              <div class="card_profile">
                <picture>
                  <source srcset="" type="image/svg+xml">
                  <img id="image" name="image" src="<?= base_url('assets/img/upload/') . $menu['image']; ?>" class="img-fluid img-thumbnail ms-5" alt="......." width="200">
                </picture>
              </div>
            </div>
            <div class="col-md-5">
              <div class="d-flex flex-column">
                <div class="p-3 bg-secondary text-center">
                  <h5><?= $menu['nama_menu']; ?></h5>
                </div>
                <div class="col-md-12">
                  <div class="card mb-3">
                    <div class="card-body">
                      <?= form_open_multipart('user/tambahBooking'); ?>
                      <div class="form-group row">
                        <label for="nama_menu" class="col-md-5 col-form-label">Nama menu :</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control bordered text-center" style=" background-color: #DFDFDF; "
                            id="nama_menu" name="nama_menu" value="<?= $menu['nama_menu']; ?>" readonly>
                        </div>
                      </div>
                      <br>
                      <div class="form-group row">
                        <label for="ukuran" class="col-md-5  col-form-label">Ukuran :</label>
                        <div class="col-md-6 ">
                          <select id="harga" name="harga" required="" style=" background-color: #DFDFDF; width: 9rem; height: 35px;">
                          <option value="<?= $menu['harga']; ?>">Regular</option>
                          <option value="<?= $menu['harga2']; ?>">large</option>
                        </select>
                        </div>
                      </div>
                      <br>
                      <div class="form-group row justify-content-end">
                        <div class="col-sm-12">
                          <button class="btn btn-danger" onclick="window.history.go(-1)"> Kembali</button>
                          <button type="submit" class="btn btn-success">Add to Cart</button>
                        </div>
                      </div>
                      </form>
                    </div>
                  </div>
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
</main>


