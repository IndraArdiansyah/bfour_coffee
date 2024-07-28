<!-- Begin Page Content -->

<div class="container-fluid py-4">
  <div class="row no-gutters">
    <div class="col-md-3"></div>
    <div class="col-md-7">
      <div class="card">
        <div class="card-header text-center">
          <h4><?= $judul; ?></h4>
        </div>
        <!-- <div class="col-md-20">
          <div class="card mb-3"> -->
        <div class="card-body">
          <?= form_open_multipart('admin/ubahprofil'); ?>
          <div class="form-group row">
            <label for="nip" class="col-sm-2 col-form-label">NIP</label>
            <div class="col-sm-9">
              <input type="text" class="form-control bordered" style="width:70%; background-color: #DFDFDF; " id="nip" name="nip" value="<?= $user['nip']; ?>" readonly>
            </div>
          </div>
          <!-- <br> -->
          <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap </label>
            <div class="col-sm-9">
              <input type="text" class="form-control" style="width:70%; background-color: #DFDFDF; " id="nama_admin" name="nama_admin" value="<?= $user['nama_admin']; ?>">
              <?= form_error('nama', '<small class="textdanger pl-3">', '</small>'); ?>
            </div>
          </div>
          <!-- <br> -->
          <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" style="width:70%; background-color: #DFDFDF; " id="alamat" name="alamat" value="<?= $user['alamat']; ?>">
              <?= form_error('nama', '<small class="textdanger pl-3">', '</small>'); ?>
            </div>
          </div>
          <!-- <br> -->
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-10">
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail" alt="">
                </div>
                <div class="col-sm-9">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <!-- <br> -->
          <div class="form-group row justify-content-end">
            <div class="col-sm-12">
              <button class="btn btn-danger" onclick="window.history.go(-1)"> Kembali</button>
              <button type="submit" class="btn btn-success">Ubah</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<style>
  .container-fluid {
    background-color: #f8f9fa;
  }

  .card-header {
    background-color: #6c757d;
    color: white;
  }

  .form-control {
    background-color: #e9ecef;
    border-radius: 5px;
    margin-bottom: 15px;
  }

  .form-group label {
    font-weight: bold;
  }

  .img-thumbnail {
    max-width: 100px;
    border-radius: 5px;
  }

  .custom-file-input~.custom-file-label::after {
    content: "Browse";
  }

  .btn {
    margin-right: 10px;
  }

  .card-body {
    padding: 20px;
  }
</style>