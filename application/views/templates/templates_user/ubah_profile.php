<!-- Begin Page Content -->

<div class="container-fluid py-4">
  <div class="row no-gutters">
    <div class="col-md-3"></div>
    <div class="col-md-9">
      <div class="d-flex flex-column">
        <div class="d-flex flex-row justify-content-between align-items-center p-5 bg-secondary text-dark">
          <h4><?= $judul; ?></h4>
        </div>
        <div class="col-md-20">
          <div class="card mb-3">
            <div class="card-body">
              <?= form_open_multipart('member/ubahprofil'); ?>
              <div class="form-group row">
                <label for="email" class="col-sm-2 col-formlabel">Username</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control bordered" style="width:70%; background-color: #DFDFDF; " id="nip" name="nip" value="<?= $user['nip']; ?>" readonly>
                </div>
              </div>
              <br>
              <div class="form-group row">
                <label for="nama" class="col-sm-2 col-formlabel">Nama Lengkap </label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" style="width:70%; background-color: #DFDFDF; " id="nama_admin" name="nama_admin" value="<?= $user['nama_admin']; ?>">
                  <?= form_error('nama', '<small class="textdanger pl-3">', '</small>'); ?>
                </div>
              </div>
              <br>
              <div class="form-group row">
                <label for="nama" class="col-sm-2 col-formlabel">Alamat</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" style="width:70%; background-color: #DFDFDF; " id="alamat" name="alamat" value="<?= $user['alamat']; ?>">
                  <?= form_error('nama', '<small class="textdanger pl-3">', '</small>'); ?>
                </div>
              </div>
              <br>
              <div class="form-group row">
                <div class="col-sm-2">Gambar</div>
                <div class="col-sm-9">
                  <div class="row">
                    <div class="col-sm-2">
                      <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="imgthumbnail" alt="">
                    </div>
                    <div class="col-sm-9">
                      <div class="custom-file">
                        <input type="file" class="customfile-input" id="image" name="image">
                        <!-- <label class="custom-file-label" for="image">Pilih file</label> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <br>
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


</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->