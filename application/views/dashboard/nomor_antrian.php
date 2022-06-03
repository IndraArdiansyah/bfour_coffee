  <!-- navabar -->
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Tentang
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">bantuan</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">profile</a></li>
            </ul>
          </li>
        </ul>
        <span class="navbar-text text-dark">
          <h5 style="margin-right: 30px;">
            Selamat Datang <strong><?= $user; ?></strong>
          </h5>
        </span>
      </div>
    </div>
  </nav>


  <!-- akhir navbar -->

  <!-- selection menu -->
  <div class="carousel">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/img/upload/doctor2.jpg'); ?>"
        style="max-width: 100%; max-height: 100%; height: 500px; width: 1440px">
      <!-- <img src="<?php echo base_url('assets/img/upload/gency.jpeg'); ?>"
        style="max-width: 100%; max-height: 100%; height: 400px; width: 670px"> -->
    </div>
  </div>

  <!-- akhir selection menu -->

  <!-- nomor antrian -->
  <div class="container position-relative">
    <center>
      <table>
        <?php
      foreach ($useraktif as $u) {
      ?>
        <tr>
          <td nowrap>Terima Kasih <b><?= $u->nama; ?></b></td>
        </tr>
        <tr>
          <td>Nomor Antrian Anda adalah sebagai berikut : </td>
        </tr>
        <?php } 
        ?>
        <tr>
          <td>
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover" id="table-datatable">
                <tr>
                  <td>No.</td>
                  <td>NIK</td>
                  <td>Nama</td>
                  <td>Poli</td>
                  <td>Tanggal</td>
                </tr>
                <?php
      $no = 1;
      foreach ($items as $i) {
      ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td nowrap><?= $i['id_pasien']; ?></td>
                  <td nowrap><?= $i['id_antrian']; ?></td>
                  <td nowrap><?= $i['poli']; ?></td>
                  <td nowrap><?= $i['tgl_antrian']; ?></td>
                </tr>
                <?php $no++;
      } ?>
              </table>
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <hr>
          </td>
        </tr>
        <tr>
          <td>
            <a href="<?= base_url() . 'booking/exportToPdf/' . $this->session->userdata('id_user'); ?>"
              class="btn btn-sm btn-outline-danger"
              onclick="information('Waktu Pengembalian Buku 1x24 Jam dari booking!!!')"><span
                class="far fa-lg fa-fw fa-file-pdf"></span> Pdf</a>
          </td>
        </tr>
      </table>
    </center>
  </div>


  <!-- akhir nomor antrian -->

  <!-- aktivitas -->
  <section id="aktivitas">
    <div class="aktivitas">
      <div class="row">
        <div class="col text-dark">
          <p style="text-align: center;font-size: 40px; position: relative; font-family: monospace; margin-top: 50px;">
            Helping <strong>You</strong>, Live Your <strong>Life</strong>
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- akhir aktivitas -->