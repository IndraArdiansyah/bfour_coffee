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
            <div class="card-header pb-0 bg-secondary">
              <div class="row">
                <div class="col-lg-4 col-4">
                  <h4 class="font-weight-bold ms-1"><i class="fa-solid fa-clipboard-list"></i>&nbsp;&nbsp;&nbsp;<?= $judul; ?>
                  </h4>
                </div>
                <div class="col-lg-4 col-4">
                </div>
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
                    <!-- <th>Harga</th> -->
                    <th>Total</th>
                  </tr>
                  <?php
                  $no = 1;
                  $grandtotal = 0;
                  foreach ($temp as $t) { ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td>
                        <img id="image" name="image" src="<?= base_url('assets/img/upload/' . $t['image']); ?>" class="rounded" alt="No Picture" width="50rem;">
                      </td>
                      <td><b id="nama_menu" name="nama_menu"><?= $t['nama_menu']; ?></b></td>
                      <td><b id="jumlah" name="jumlah"><?= $t['jumlah']; ?></b></td>
                      <td><b id="total" name="total">Rp. <?= number_format($t['total']); ?></b></td>

                    </tr>
                  <?php
                    $no++;
                    $grandtotal += $t['total'];
                  }
                  ?>
                </table>
                <!-- <hr> -->
                <table class="table table-bordered table-striped tabel-hover align-middle text-center" id="table-datatable" style="width: 50%;">
                  <form action="<?= base_url('user/exportToPdf'); ?>" method="post" target="_blank" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <td colspan="5">
                      <b>Subtotal :</b>
                    </td>
                    <td>
                      <div class="form-group">
                        <input type="text" readonly class="align-midle form-control form-control-user font-weight-bold" value="Rp. <?= number_format($grandtotal); ?>" id="grandtotal" name="grandtotal" style="width: 100%; height: 40px; border-radius: 10px 10px 10px 10px; border: 2px solid grey; padding-left: 10px; text-align: center;"><br>
                      </div>
                    </td>
                    </tr>
                    <tr>
                      <td colspan="5">
                        <b>Nama Customer :</b>
                      </td>
                      <td>
                        <div class="bayar form-group">
                          <input type="text" readonly class="align-midle form-control form-control-user font-weight-bold" id="nama_cust" name="nama_cust" value="<?= $user; ?>" style="width: 100%; height: 40px; border-radius: 10px 10px 10px 10px; border: 2px solid grey; padding-left: 10px; text-align: center;"><br>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="5">
                        <b>Phone :</b>
                      </td>
                      <td>
                        <div class="kembalian form-group">
                          <input type="text" class="align-midle form-control form-control-user font-weight-bold" id="phone" name="phone" style="width: 100%; height: 40px; border-radius: 10px 10px 10px 10px; border: 2px solid grey; padding-left: 10px; text-align: center;"><br>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="5">
                        <b>Aksi :</b>
                      </td>
                      <td>
                        <div class=" form-group">
                          <input type="submit" class="form-control form-control-user btn btn-success col-md-3 " value="submit" onclick="window.history.go(-4)">
                        </div>
                      </td>
                    </tr>
                  </form>
                </table>
              </div>
            </table>
          </center>
        </div>
      </div>
    </div>
  </main>


  <!-- JavaScript untuk validasi -->
  <!-- <script>
    function validateForm() {
      // Ambil nilai subtotal
      var subtotal = <?= $grandtotal; ?>;
      
      // Ambil nilai yang dimasukkan pada input cash
      var cash = document.getElementById('cash').value;

      // Konversi cash menjadi angka
      cash = parseFloat(cash);

      // Validasi: Cash tidak boleh kurang dari subtotal
      if (cash < subtotal) {
        alert('Cash yang dibayar tidak boleh kurang dari subtotal yang harus dibayar.');
        return false; // Berhenti submit formulir
      }

      return true; // Lanjutkan submit formulir jika validasi lolos
    }
  </script> -->