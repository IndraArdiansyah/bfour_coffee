  <!-- navabar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light position-relative">
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link ">
            <span class="mr-2 d-none d-lg-inline text-dark font-weight-bolder">Beranda</span>
          </a>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link" data-target="#daftarModal" data-toggle="modal">
            <span class="mr-2 d-none d-lg-inline text-gray font-weight-bolder">Daftar</span>
          </a>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
            ariahaspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray font-weight-bolder">Tentang</span>
          </a>
          <!-- Dropdown - User Information -->

          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?= base_url('#'); ?>">
              <i class="fa-solid fa-circle-info"></i>&nbsp;&nbsp;
              Bantuan
            </a>

            <div class="dropdown-divider"></div>

            <a class="dropdown-item" href="<?= base_url('#'); ?>" data-dismiss="modal" datatarget="#logoutModal">
              <i class="fas fa-user fa-sm fa-fw"></i>&nbsp;&nbsp;
              Profile
            </a>
          </div>
        </li>
      </ul>
    </div>
    <span class="navbar-text text-dark font-weight-bolder">
      Selamat Datang <strong>Pengunjung</strong>
    </span>
  </nav>


  <!-- akhir navbar -->

  <!-- selection menu -->
  <div class="carousel">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/img/upload/rumah_sakit.jpg'); ?>"
        style="max-width: 100%; max-height: 100%; height: 500px; width: 1440px">
      <!-- <img src="<?php echo base_url('assets/img/upload/gency.jpeg'); ?>"
        style="max-width: 100%; max-height: 100%; height: 400px; width: 670px"> -->
    </div>
  </div>




  <!-- akhir selection menu -->




  <!-- aktivitas -->
  <section id="aktivitas">
    <div class="aktivitas">
      <div class="row">
        <div class="col-md-6 text-dark">
          <p style="text-align: left; margin-left: 20px; font-size: 50px; position: relative;">
            Your Health <strong>is always</strong>
          </p>
          <p style="text-align: left; margin-left: 20px; margin-top: -30px; font-size: 50px; position: relative;">
            <strong>in the first place</strong>
          </p>
          <br>
          <h6 style="text-align: left; margin-left: 20px; font-size: 20px; position: relative;">
            <strong>
              Kesehatan anda selalu di tempat pertama, karna Motto kami membangun Indonesia sehat tanpa gejala
            </strong>
          </h6>
        </div>
      </div>
    </div>
  </section>

  <!-- akhir aktivitas -->

  <!-- button -->
  <div class="row">
    <div class="col-sm-6" style="padding-left: 50px; position: relative;">
      <button type="button" class="btn btn-primary btn-user btn-block text-dark" data-toggle="modal"
        data-target="#daftarModal">
        <strong>ambil antrean</strong>
      </button>
    </div>
    <!-- akhir button -->


    <!-- keterangan -->
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <div class="collapse navbar-collapse" id="navbarText">
                <span class="navbar-text">
                  <ul class="navbar-nav me-auto mt-2 mb-lg-3">
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <ul style="list-style : none;">
                          <li>
                            <h4><i class="fa-solid fa-users"></i></h4>
                          </li>
                        </ul>
                        poli Umum
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <ul style="list-style : none;">
                          <li>
                            <h4><i class="fa-solid fa-tooth"></i></h4>
                          </li>
                        </ul>
                        poli Gigi
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <ul style="list-style : none;">
                          <li>
                            <h4><i class="fa-solid fa-child-reaching"></i></h4>
                          </li>
                        </ul>
                        poli Anak
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <ul style="list-style : none;">
                          <li>
                            <h4><i class="fa-solid fa-person-pregnant"></i></h4>
                          </li>
                        </ul>
                        poli KIA
                      </a>
                    </li>
                  </ul>
                </span>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <!-- akhir keterangan -->

  <br>