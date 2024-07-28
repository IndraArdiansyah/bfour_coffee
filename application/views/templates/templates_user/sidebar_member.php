<!-- sidebar -->
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-1 fixed-start ms-2 bg-gradient-dark" id="sidenav-main" style="height: 55%; overflow-y: auto;">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="#">
      <img src="<?php echo base_url('assets/img/upload/outlet.PNG'); ?>" style=" height: 50px; width: 70px; ">
      <span class="font-weight-bold text-white" style="font-size: 20px;">&nbsp;&nbsp;Bfour Coffee</span>
    </a>
  </div>
  <hr class="horizontal light mt-0 mb-2">
  <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white active bg-gradient-primary" href="<?= base_url('member'); ?>">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">kitchen</i>
          </div>
          <span class="nav-link-text ms-1">All Menu</span>
        </a>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link text-white dropdown-toggle" href="#" id="ordersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">apps</i>
          </div>
          <span class="nav-link-text ms-1">Orders</span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="ordersDropdown">
          <li><a class="dropdown-item" href="<?= base_url('member/orders'); ?>">Orders</a></li>
          <li><a class="dropdown-item" href="<?= base_url('member/ordersCustomer'); ?>">Orders Customer</a></li>
        </ul>
      </li>
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">-- Kategori --</h6>
      </li>
      <?php foreach ($kategori as $kategori) :
      ?>
        <li class="nav-item">
          <a class="nav-link text-white " href="<?= base_url('member/kategori?filter=') . $kategori['kategori'] ?>">
            <div class="text-white text-center me-2  d-flex align-items-center justify-content-center">
              <picture>
                <source srcset="" type="image/svg+xml">
                <img src="<?= base_url('assets/img/upload/') . $kategori['image']; ?>" class="img-fluid img-thumbnail" alt="......." width="30">
              </picture>
            </div>
            <span class="nav-link-text ms-1"><?= $kategori['kategori']; ?></span>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</aside>