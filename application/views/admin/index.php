<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg " style="margin-left: 270px;">
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
  <div class="container-fluid py-3" style="background-color: #DCDCDC;">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <a href="<?= base_url('home/daftar_admin'); ?>" style="text-decoration: none; color: inherit;">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">supervisor_account</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Anggota Member</p>
                <h4 class="mb-0">
                  <?= $jml_admin; ?>
                </h4>
              </div>
            </div>
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>&nbsp;</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <a href="<?= base_url('home/daftar_kategori'); ?>" style="text-decoration: none; color: inherit;">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">dns</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Daftar kategori</p>
                <h4 class="mb-0"><?= $kategori; ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>&nbsp;</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <a href="<?= base_url('home/daftar_menu'); ?>" style="text-decoration: none; color: inherit;">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-warning shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">kitchen</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Daftar Menu</p>
                <h4 class="mb-0"><?= $menu; ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>&nbsp;</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <a href="<?= base_url('home/pengunjung'); ?>" style="text-decoration: none; color: inherit;">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Pengunjung</p>
                <h4 class="mb-0">
                  <?= $orders; ?>
                </h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>&nbsp;</p>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="container-fluid py-3" style="background-color: #DCDCDC;">
      <div class="row mb-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0 bg-secondary">
              <div class="row">
                <div class="col-lg-12 ">
                  <h4>Grafik Jumlah Pemesanan Customer All</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="row">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-body">
                        <canvas id="barChartAll" width="400" height="200"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-3" style="background-color: #DCDCDC;">
      <div class="row mb-4">
        <!-- Grafik Jumlah Pemesanan Customer Dine in -->
        <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0 bg-secondary">
              <div class="row">
                <div class="col-lg-12">
                  <h6>Grafik Jumlah Pemesanan Customer Dine in</h6>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="row">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="card">
                        <div class="card-body">
                          <canvas id="barChart0" width="400" height="200"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Grafik Jumlah Pemesanan Customer Online -->
        <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0 bg-secondary">
              <div class="row">
                <div class="col-lg-12">
                  <h6>Grafik Jumlah Pemesanan Customer Online</h6>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="row">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="card">
                        <div class="card-body">
                          <canvas id="barChart2" width="400" height="200"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      function getStartOfWeek(date) {
        var day = date.getDay();
        var diff = date.getDate() - day + (day === 0 ? -6 : 1); // Adjust for week start on Monday
        return new Date(date.setDate(diff));
      }

      function getDatesInRange(startDate, endDate) {
        var dates = [];
        var currentDate = new Date(startDate);
        while (currentDate <= endDate) {
          dates.push(new Date(currentDate));
          currentDate.setDate(currentDate.getDate() + 1);
        }
        return dates;
      }

      function formatDate(date) {
        return date.toISOString().split('T')[0]; // Format tanggal YYYY-MM-DD
      }

      function filterLast7DaysFromMonday(data) {
        var today = new Date();
        var startOfWeek = getStartOfWeek(new Date(today));
        var endDate = new Date(startOfWeek);
        endDate.setDate(startOfWeek.getDate() + 6); // 7 hari dari hari Senin

        return getDatesInRange(startOfWeek, endDate).map(function(date) {
          var formattedDate = formatDate(date);
          var item = data.find(item => item.tgl_booking === formattedDate);
          return {
            tgl_booking: formattedDate,
            total: item ? item.total : 0
          };
        });
      }

      // Data grafik pertama
      var ordersDataAll = <?= $orders_count_by_date; ?>;
      var filteredDataAll = filterLast7DaysFromMonday(ordersDataAll);

      // Menyiapkan label dan data
      var labelsAll = filteredDataAll.map(function(item) {
        return item.tgl_booking;
      });
      var dataAll = filteredDataAll.map(function(item) {
        return item.total;
      });

      var ctxAll = document.getElementById('barChartAll').getContext('2d');
      new Chart(ctxAll, {
        type: 'bar',
        data: {
          labels: labelsAll,
          datasets: [{
            label: 'Jumlah Pemesanan All',
            data: dataAll,
            backgroundColor: 'rgb(240, 128, 128, 0.2)',
            borderColor: 'rgb(233, 150, 122, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });

      // Ulangi untuk grafik lainnya (dine in, online)
      var ordersData0 = <?= $orders_count_by_date0; ?>;
      var filteredData0 = filterLast7DaysFromMonday(ordersData0);
      var labels0 = filteredData0.map(function(item) {
        return item.tgl_booking;
      });
      var data0 = filteredData0.map(function(item) {
        return item.total;
      });

      var ctx0 = document.getElementById('barChart0').getContext('2d');
      new Chart(ctx0, {
        type: 'bar',
        data: {
          labels: labels0,
          datasets: [{
            label: 'Jumlah Pemesanan Dine in',
            data: data0,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });

      var ordersData2 = <?= $orders_count_by_date2; ?>;
      var filteredData2 = filterLast7DaysFromMonday(ordersData2);
      var labels2 = filteredData2.map(function(item) {
        return item.tgl_booking;
      });
      var data2 = filteredData2.map(function(item) {
        return item.total;
      });

      var ctx2 = document.getElementById('barChart2').getContext('2d');
      new Chart(ctx2, {
        type: 'bar',
        data: {
          labels: labels2,
          datasets: [{
            label: 'Jumlah Pemesanan Online',
            data: data2,
            backgroundColor: 'rgba(255, 159, 64, 0.2)',
            borderColor: 'rgba(255, 159, 64, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>




</main>