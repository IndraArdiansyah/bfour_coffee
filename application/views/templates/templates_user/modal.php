<!-- Daftar Modal -->
<div class="modal fade" tabindex="-1" id="daftarModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Daftar Pasien</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('member/daftar'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" name="nik" id="nik" placeholder="Nomor Identitas Penduduk" class="form-control"><br>
          </div>
          <div class="form-group">
            <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" class="form-control"><br>
          </div>
          <div class="form-group">
            <input type="text" name="alamat" id="alamat" placeholder="Alamat Lengkap" class="form-control"><br>
          </div>
          <div class="form-group">
            <input type="text" name="umur" id="umur" placeholder="Usia" class="form-control"><br>
          </div>
          <div class="form-group">
            <input type="text" name="no_telp" id="no_telp" placeholder="Nomor Telepon" class="form-control"><br>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-outline-primary" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /Daftar Modal -->