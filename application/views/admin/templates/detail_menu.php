<!DOCTYPE html>
<html lang="en">

<head>
  <title>Profile Admin</title>
</head>

<style>
.card_profile img {
  position: relative;
  justify-content: center;
  margin-left: 40px;
  margin-top: 25px;
  border-radius: 50%;
  width: 80%;
  height: 65%;
  border: 15px solid #fff;
}

.card_profile img:hover {
  opacity: 0.5;
  width: 90%;
  height: 75%;
}

.card_profile {
  height: 490px;
  border-radius: 10px;
  /* background-color: #191970; */
}

.col-md-4 {
  margin-left: 35px;
  margin-top: -10px;
}

.col-md-5 {
  margin-top: -10px;
  width: 47%;
}

.bg-black {
  background: #000;
}

.skill-block {
  width: 30%;
}

@media (min-width: 991px) and (max-width:1200px) {
  .skill-block {
    padding: 32px !important;
  }
}

@media (min-width: 1200px) {
  .skill-block {
    padding: 56px !important;
  }
}

body {
  background-color: #eeeeee;
}
</style>

<body>
  <div class="container-fluid py-4">
    <div class="row no-gutters">
      <div class="col-md-2"></div>
      <div class="col-md-4">
        <div class="card_profile container ms-1 bg-dark">
          <img src="<?= base_url('assets/img/upload/') . $image; ?>" class="img-fluid img-thumbnail" alt=".......">
          <br>
          <br>
          <br>
          <a type="submit" class="container btn btn-success" href="<?= base_url('home/ubahMenu'); ?>">Ubah
            Menu</a>
        </div>
      </div>
      <div class="col-md-5">
        <div class="d-flex flex-column">
          <div class="d-flex flex-row justify-content-between align-items-center p-5 bg-dark text-white">
            <h2 class="display-5"></h2>
            <!-- <i class="fa fa-facebook"></i><i class="fa fa-google"></i><i class="fa fa-youtube-play"></i><i
              class="fa fa-dribbble"></i><i class="fa fa-linkedin"></i> -->
          </div>
          <div class="p-3 bg-black justify-content-center">
            <h5>Admin Bfour Coffee</h5>
          </div>
          <div class="col-md-20">
            <div class="card mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">ID Menu</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    :&nbsp;&nbsp;&nbsp;
                    <strong><?=menu['id_menu']?></strong>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Nama Menu</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    :&nbsp;&nbsp;&nbsp;
                    <strong><?= $menu['nama_menu']; ?></strong>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">ID Kategori</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    :&nbsp;&nbsp;&nbsp;
                    <strong><?= $menu['id_kategori']; ?></strong>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">harga</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    :&nbsp;&nbsp;&nbsp;
                    <strong>Rp. <?=number_format( $menu['harga']); ?></strong>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Detail</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    :&nbsp;&nbsp;&nbsp;
                    <strong><?= $menu['detail']; ?></strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>