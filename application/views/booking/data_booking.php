<!-- navabar -->
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg" style="margin-left: 270px;">
  <nav class="nav navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <div class="collapse navbar-collapse" id="navbar" style="margin-left: 47em;">
        <ul class="navbar-nav">
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" ariahaspopup="true" aria-expanded="false">Selamat datang
              <span class="d-none d-lg-inline text-black-600 font-weight-bolder"> <?= $user; ?></span>
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
              <div class="col-lg-4 col-4">
                <h4 class="font-weight-bold ms-1"><i class="fa-solid fa-clipboard-list"></i>&nbsp;&nbsp;&nbsp;<?= $judul; ?></h4>
              </div>
              <div class="col-lg-4 col-4"></div>
            </div>
          </div>
        </div>
        <center>
          <table class="col-lg-12">
            <div class="table-responsive product_data full-width">
              <table class="table table-bordered table-striped tabel-hover align-middle text-center" id="table-datatable">
                <tr>
                  <th>No.</th>
                  <th>Image</th>
                  <th>Nama Menu</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Total</th>
                  <th>Pilihan</th>
                </tr>
                <?php
                $no = 1;
                foreach ($temp as $t) { ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td>
                      <img id="image" name="image" src="<?= base_url('assets/img/upload/' . $t['image']); ?>" class="rounded" alt="No Picture" width="50rem;">
                    </td>
                    <td><b id="nama_menu" name="nama_menu"><?= $t['nama_menu']; ?></b></td>
                    <td><b id="jumlah" name="jumlah"><?= $t['jumlah']; ?></b></td>
                    <td><b id="harga" name="harga">Rp. <?= number_format($t['harga']); ?></b></td>
                    <td><b id="total" name="total">Rp. <?= number_format($t['total']); ?></b></td>
                    <td>
                      <a href="<?= base_url('booking/hapusbooking/' . $t['id_menu']); ?>" onclick="return confirm('Yakin tidak jadi Booking <?= $t['nama_menu']; ?>')" class="btn btn-sm btn-outline-danger"><i class="fas fw fa-trash"></i></a>
                    </td>
                  </tr>
                <?php
                  $no++;
                }
                ?>
                <hr>
                <tr>
                  <!-- <td></td> -->
                  <td colspan="3">
                    <a href="<?= base_url('member'); ?>" class="btn btn-sm btn-outline-primary"><span class="fas fw fa-play"></span> Lanjutkan Booking Menu</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="<?= base_url() . 'booking/selesai/' . $this->session->userdata('nip'); ?>" id="selesai" class="selesai btn btn-sm btn-outline-success"><span class="fas fw fa-stop"></span> Selesaikan Booking</a>
                  </td>
                  <td colspan="2">
                    <b>Subtotal :</b>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="hidden" class="align-midle form-control form-control-user font-weight-bold" value="<?= $t['id_menu']; ?>" id="id_menu" name="id_menu" style="width: 100%; height: 40px; border-radius: 10px 10px 10px 10px; border: 2px solid grey; padding-left: 10px; text-align: center;"><br>
                      <input type="text" readonly class="align-midle form-control form-control-user font-weight-bold" value="Rp. <?= number_format($sum_total); ?>" id="grandtotal" name="grandtotal" style="width: 100%; height: 40px; border-radius: 10px 10px 10px 10px; border: 2px solid grey; padding-left: 10px; text-align: center;"><br>
                    </div>
                  </td>
                  <td></td>
                </tr>
              </table>
              <!-- Tambahkan Card Add-On -->
              <div class="row">
                <h5>Add-On :</h5>
                <?php foreach ($addons as $addon) { ?>
                  <div class="col-md-3 mb-3">
                    <a href="<?= base_url('booking/keranjang?filter=' . $addon['id_menu']); ?>" class="text-decoration-none">
                      <div class="card" style="cursor: pointer; width: 150px;">
                        <img src="<?= base_url('assets/img/upload/' . $addon['image']); ?>" class="card-img-top" alt="No Picture" style="height: 100px; object-fit: cover;">
                        <div class="card-body p-2 text-center">
                          <h6 class="card-title"><?= $addon['nama_menu']; ?></h6>
                        </div>
                      </div>
                    </a>
                  </div>
                <?php } ?>
              </div>
            </div>
          </table>
        </center>
      </div>
    </div>
  </div>
</main>