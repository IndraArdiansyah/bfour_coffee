<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="#">Halaman</a></li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Dashboard</h6>
      </nav>
      <div class="collapse navbar-collapse" id="navbar" style="margin-left: 45em;">
        <ul class="navbar-nav">
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
              ariahaspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 font-weight-bolder"><?= $user; ?> </span>
            </a>
            <!-- Dropdown - User Information -->

            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="<?= base_url('user'); ?>">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile Saya
              </a>

              <div class="dropdown-divider"></div>

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
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div
              class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="fa-solid fa-users"></i>
            </div>
            <div class="text-end pt-1 pb-4">
              <p class="text-sm mb-0 text-capitalize"></p>
              <h5 class="mb-0">Poli Umum</h5>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success font-weight-bolder" style="font-size: 20px;">
                <?= $this->ModelAdmin->getWhere(['is_active' => 1])->num_rows(); ?>
              </span></p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div
              class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
              <i class="fa-solid fa-tooth"></i>
            </div>
            <div class="text-end pt-1 pb-4">
              <p class="text-sm mb-0 text-capitalize"></p>
              <h5 class="mb-0">Poli Gigi</h5>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">- </span></p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div
              class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="fa-solid fa-child-reaching"></i>
            </div>
            <div class="text-end pt-1 pb-4">
              <p class="text-sm mb-0 text-capitalize"></p>
              <h5 class="mb-0">Poli Anak</h5>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-</span></p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div
              class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
              <i class="fa-solid fa-person-pregnant"></i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize"></p>
              <h5 class="mb-0">Poli Kesehatan</h5>
              <h5 class="mb-0">Ibu dan Anak</h5>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">- </span></p>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="row mb-4">
      <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
        <div class="card">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h6>Data Pasien</h6>
                <p class="text-sm mb-0">
                  <i class="fa fa-check text-info" aria-hidden="true"></i>
                  <span class="font-weight-bold ms-1">Bulan Ini</span>
                </p>
              </div>
              <div class="col-lg-6 col-5 my-auto text-end">
                <div class="dropdown float-lg-end pe-4">
                  <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-ellipsis-v text-secondary"></i>
                  </a>
                  <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive">
              <table class="table align-items-center mb-0">

                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary  text-xxs font-weight-bolder opacity-10">No</th>
                    <th class="text-uppercase text-secondary  text-xxs font-weight-bolder opacity-10">Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ps-2">NIK</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Umur
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">
                      Poli</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                    $i = 1; 
                    foreach ($pasien as $p) :
                    ?>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $i++; ?></h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $p['nama']; ?></h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $p['nik']; ?></h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $p['umur']; ?></h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle">
                      <div class="progress-wrapper w-75 mx-auto">
                        <div class="progress-info">
                          <div class="progress-percentage">
                            <span class="text-xs font-weight-bold">60%</span>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="<?php $i=1; $i=10; $i++;?>">1</a></li>
                  <li class="page-item"><a class="page-link" href="<?php $i=11; $i=20; $i++;?>">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>