<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg " style="margin-left: 270px;">
  <nav class="nav navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <div class="collapse navbar-collapse" id="navbar" style="margin-left: 47em;">
        <ul class="navbar-nav">
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" ariahaspopup="true" aria-expanded="false">Selamat datang
              <span class=" d-none d-lg-inline text-black-600 font-weight-bolder"> <?= $user; ?>
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
              <form action="<?= base_url('booking/exportToPdf'); ?>" target="_blank" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <table class="table table-bordered table-striped tabel-hover align-middle text-center" id="table-datatable" style="width: 50%;">
                  <tr>
                    <td colspan="5">
                      <b>Subtotal :</b>
                    </td>
                    <td>
                      <input type="text" readonly class="align-midle form-control form-control-user font-weight-bold" value="Rp. <?= number_format($grandtotal); ?>" id="grandtotal" name="grandtotal" style="width: 100%; height: 40px; border-radius: 10px 10px 10px 10px; border: 2px solid grey; padding-left: 10px; text-align: center;"><br>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="5">
                      <b>Nama Customer :</b>
                    </td>
                    <td>
                      <input type="text" class="align-midle form-control form-control-user font-weight-bold" id="nama_cust" name="nama_cust" style="width: 100%; height: 40px; border-radius: 10px 10px 10px 10px; border: 2px solid grey; padding-left: 10px; text-align: center;"><br>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="5">
                      <b>Metode Pembayaran :</b>
                    </td>
                    <td>
                      <select class="form-select" id="payment_method" name="payment_method" onchange="handlePaymentMethodChange()">
                        <option value="0">pilihan pembayaran</option>
                        <option value="Qris">QRIS</option>
                        <option value="cash">Cash</option>
                      </select>
                    </td>
                  </tr>
                  <tr id="cash_row" style="display: none;">
                    <td colspan="5">
                      <b>Cash :</b>
                    </td>
                    <td>
                      <input type="text" class="align-midle form-control form-control-user font-weight-bold" id="cash" name="cash" style="width: 100%; height: 40px; border-radius: 10px 10px 10px 10px; border: 2px solid grey; padding-left: 10px; text-align: center;"><br>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="6">
                      <input type="submit" class="form-control form-control-user btn btn-success col-md-3 " onclick="window.history.go(-4)" value="submit">
                    </td>
                  </tr>
                </table>
              </form>
            </div>
          </table>
        </center>
      </div>
    </div>
  </div>
</main>

<script>
  function validateForm() {
    var selectedOption = document.getElementById('payment_method').value;
    var subtotal = <?= $grandtotal; ?>;
    var cash = document.getElementById('cash').value;
    cash = parseFloat(cash.replace(/[^\d.-]/g, '')); // Remove non-numeric characters

    if (selectedOption === 'cash' && (isNaN(cash) || cash < subtotal)) {
      alert('Cash yang dibayar tidak boleh kurang dari subtotal yang harus dibayar.');
      return false;
    }

    return true;
  }

  function formatRupiah(input) {
    // Remove non-numeric characters
    var value = input.value.replace(/[^\d.-]/g, '');

    // Format as rupiah
    var formattedValue = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR'
    }).format(value);

    input.value = formattedValue;
  }

  // Function to handle dropdown change
  function handlePaymentMethodChange() {
    var selectedOption = document.getElementById('payment_method').value;
    var cashRow = document.getElementById('cash_row');

    if (selectedOption === 'cash') {
      cashRow.style.display = 'table-row';
    } else {
      cashRow.style.display = 'none';
    }
  }

  // Initial call to handle dropdown change based on current selected value
  handlePaymentMethodChange();
</script>