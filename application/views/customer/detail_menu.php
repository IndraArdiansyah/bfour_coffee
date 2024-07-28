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
            <!-- Dropdown - User Information -->

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
        <?php foreach ($menu as $menu) :
          ?>
        <div class="x_content">
          <div class="row">
            <div class="col-sm-3 col-md-3">
              <div class="thumbnail" style="height: auto; position: relative; left: 100%; width: 200%;">
              <br>
                <picture>
                <source srcset="" type="image/svg+xml">
                <img src="<?= base_url('assets/img/upload/') . $menu['image']; ?>" class="img-fluid img-thumbnail ms-8" alt="......." width="170">
              </picture>
                <div class="caption">
                  <h5 style="min-height:40px;" align="center"><?= $menu['nama_menu']; ?></h5>
                  <center>
                    <table class="table table-stripped">
                      <tr>
                        <th nowrap>Nama Menu </th>
                        <td nowrap>:&nbsp;&nbsp;<?= $menu['nama_menu']; ?></td>
                      </tr>
                      <tr>
                        <th nowrap>Price (Regular) </th>
                        <td nowrap>:&nbsp;&nbsp;<?= $menu['harga']; ?></td>
                      </tr>
                      <tr>
                        <th nowrap>Price (Large) </th>
                        <td nowrap>:&nbsp;&nbsp;<?= $menu['harga2']; ?></td>
                      </tr>
                    </table>
                  </center>
                  <p class="ms-5">
                    <a class="btn btn-outline-primary fas fw fa-shopping-cart" href="<?= base_url('user/keranjang?filter=') .$menu['id_menu']?>"> Checkout</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="btn btn-outline-secondary fas fw fa-reply" onclick="window.history.go(-1)"> Kembali</span>
                  </p>
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


