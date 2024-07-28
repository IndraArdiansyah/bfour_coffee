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
          <img src="<?= base_url('assets/img/profile/') . $image; ?>" class="card-img" alt="...">
          <br>
          <br>
          <br>
          <a type="submit" class="container btn btn-success" href="<?= base_url('member/ubahProfil'); ?>">Ubah
            Profile</a>
        </div>
      </div>
      <div class="col-md-5">
        <div class="d-flex flex-column">
          <div class="p-3 bg-primary text-center">
            <h5>Member Bfour Coffee</h5>
          </div>
          <div class="col-md-20">
            <div class="card mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">No ID</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    :&nbsp;&nbsp;&nbsp;
                    <strong><?php echo $id; ?></strong>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Nama</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    :&nbsp;&nbsp;&nbsp;
                    <strong><?php echo $nama_admin; ?></strong>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">NIP</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    :&nbsp;&nbsp;&nbsp;
                    <strong><?php echo $nip; ?></strong>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">tgl_input</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    :&nbsp;&nbsp;&nbsp;
                    <strong><?php echo $tgl_input; ?></strong>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Alamat</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    :&nbsp;&nbsp;&nbsp;
                    <strong><?php echo $alamat; ?></strong>
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