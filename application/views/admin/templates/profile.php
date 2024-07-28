<!DOCTYPE html>
<html lang="en">

<head>
  <title>Profile Admin</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    .card_profile img {
      position: relative;
      justify-content: center;
      display: block;
      margin: 25px auto;
      border-radius: 50%;
      width: 80%;
      height: auto;
      border: 5px solid #fff;
      transition: all 0.3s ease;
    }

    .card_profile img:hover {
      opacity: 0.8;
      transform: scale(1.05);
    }

    .card_profile {
      height: auto;
      border-radius: 10px;
      background-color: #343a40;
      padding: 20px;
    }

    .col-md-4,
    .col-md-5 {
      margin-top: -10px;
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

    .profile-info .row {
      margin-bottom: 10px;
    }

    .profile-info .row h6 {
      margin-bottom: 0;
    }

    .profile-info .row div {
      display: flex;
      align-items: center;
    }

    .profile-info .row div strong {
      margin-left: 10px;
    }

    .profile-info hr {
      margin: 0.5rem 0;
    }
  </style>
</head>

<body>
  <div class="container-fluid py-4" style="margin-left: 6rem;">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card_profile text-white text-center">
          <img src="<?= base_url('assets/img/profile/') . $image; ?>" alt="Profile Image">
          <a class="btn btn-success mt-4" href="<?= base_url('admin/ubahProfil'); ?>">Ubah Profile</a>
        </div>
      </div>
      <div class="col-md-5">
        <div class="d-flex flex-column">
          <div class="p-3 bg-primary text-center text-white rounded">
            <h5>Member Bfour Coffee</h5>
          </div>
          <div class="card mt-3">
            <div class="card-body profile-info">
              <div class="row">
                <div class="col-sm-3">
                  <h6>No ID</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  : <strong><?php echo $id; ?></strong>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6>Nama</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  : <strong><?php echo $nama_admin; ?></strong>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6>NIP</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  : <strong><?php echo $nip; ?></strong>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6>Tanggal Input</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  : <strong><?php echo $tgl_input; ?></strong>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6>Alamat</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  : <strong><?php echo $alamat; ?></strong>
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