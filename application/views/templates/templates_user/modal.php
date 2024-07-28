<!-- Modal untuk pilihan Print -->
<div class="modal fade" id="printModal" tabindex="-1" aria-labelledby="printModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="printModalLabel">Pilih Opsi Print</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Pilih opsi untuk melakukan Print data:</p>
        <div class="text-center">
          <a href="<?= base_url('laporan/pengunjung_print'); ?>" class="btn btn-primary mb-3" onclick="window.history.go(-1)"><i class="fas fa-print"></i>
            &nbsp;&nbsp;Print Semua Data</a>
          <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#filterModal"><i class="fas fa-calendar-alt"></i>&nbsp;&nbsp; Filter by Tanggal</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal untuk filter by Tanggal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filterModalLabel">Filter by Tanggal</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('laporan/pengunjung_print_by_date'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="start_date">Tanggal Mulai:</label>
            <input type="date" id="start_date" name="start_date" class="form-control" required>
          </div>
          <div class="form-group mt-2">
            <label for="end_date">Tanggal Akhir:</label>
            <input type="date" id="end_date" name="end_date" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Filter Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end modal -->

<!-- Modal untuk pilihan Pdf -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pdfModalLabel">Pilih Opsi Cetak</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Pilih opsi untuk melakukan Cetak data:</p>
        <div class="text-center">
          <a href="<?= base_url('laporan/pengunjung_pdf'); ?>" class="btn btn-primary mb-3" onclick="window.history.go(-1)"><i class="fas fa-pdf"></i>
            &nbsp;&nbsp;Cetak Semua Data</a>
          <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#filterPdf"><i class="fas fa-calendar-alt"></i>&nbsp;&nbsp; Filter by Tanggal</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal untuk filter by Tanggal -->
<div class="modal fade" id="filterPdf" tabindex="-1" aria-labelledby="filterPdfLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filterPdfLabel">Filter by Tanggal</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('laporan/pengunjung_pdf_by_date'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="start_date">Tanggal Mulai:</label>
            <input type="date" id="start_date" name="start_date" class="form-control" required>
          </div>
          <div class="form-group mt-2">
            <label for="end_date">Tanggal Akhir:</label>
            <input type="date" id="end_date" name="end_date" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Filter Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end modal -->

<!-- Modal untuk pilihan excel -->
<div class="modal fade" id="excelModal" tabindex="-1" aria-labelledby="excelModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="excelModalLabel">Pilih Opsi Cetak</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Pilih opsi untuk melakukan Cetak data:</p>
        <div class="text-center">
          <a href="<?= base_url('laporan/pengunjung_excel'); ?>" class="btn btn-primary mb-3" onclick="window.history.go(-1)"><i class="fas fa-pdf"></i>
            &nbsp;&nbsp;Cetak Semua Data</a>
          <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#filterExcel"><i class="fas fa-calendar-alt"></i>&nbsp;&nbsp; Filter by Tanggal</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal untuk filter by Tanggal -->
<div class="modal fade" id="filterExcel" tabindex="-1" aria-labelledby="filterExcelLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filterExcelLabel">Filter by Tanggal</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('laporan/pengunjung_excel_by_date'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="start_date">Tanggal Mulai:</label>
            <input type="date" id="start_date" name="start_date" class="form-control" required>
          </div>
          <div class="form-group mt-2">
            <label for="end_date">Tanggal Akhir:</label>
            <input type="date" id="end_date" name="end_date" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Filter Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end modal -->



<!-- Tambah Menu -->
<div class="modal fade" tabindex="-1" id="TambahMenu" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Menu Baru</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('home/tambah_menu'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group ">
            <input type="text" name="nama_menu" id="nama_menu" placeholder="Masukkan Nama Menu" required="" class="form-control font-weight-bolder" style="width: 100%; height: 40px; border-radius: 10px 10px 10px 10px; border: 2px solid grey; padding-left: 10px;"><br>
          </div>
          <div class="form-group ">
            <input type="text" name="harga" id="harga" placeholder="Masukkan Harga Menu" required="" class="form-control font-weight-bolder" style="width: 100%; height: 40px; border-radius: 10px 10px 10px 10px; border: 2px solid grey; padding-left: 10px;"><br>
          </div>
          <div class="form-group ">
            <input type="text" name="harga2" id="harga2" placeholder="Masukkan Harga upsize Menu" required="" class="form-control font-weight-bolder" style="width: 100%; height: 40px; border-radius: 10px 10px 10px 10px; border: 2px solid grey; padding-left: 10px;"><br>
          </div>
          <div class="form-group ">
            <select name="id_kategori" id="id_kategori" class="form-control font-weight-bolder" style="width: 100%; height: 40px; border-radius: 10px 10px 10px 10px; border: 2px solid grey; padding-left: 10px;" required>
              <option value="">Pilih Kategori</option>
              <?php foreach ($kategori as $kat) : ?>
                <option value="<?= $kat['id']; ?>"><?= $kat['kategori']; ?></option>
              <?php endforeach; ?>
            </select>
          </div><br>
          <div class="form-group ">
            <input type="file" name="image" id="image" class="form-control font-weight-bolder" required="" style="width: 100%; height: 40px; border-radius: 10px 10px 10px 10px; border: 2px solid grey; padding-left: 10px;"><br>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-outline-success" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /edit Modal -->

<!-- Tambah Anggota -->
<div class="modal fade" tabindex="-1" id="TambahAnggota" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Anggota Baru</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('home/tambah_anggota'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group ">
            <input type="text" name="nama_admin" id="nama_admin" placeholder="Masukkan Nama Anggota" required="" class="form-control font-weight-bolder" style="width: 100%; height: 40px; border-radius: 10px 10px 10px 10px; border: 2px solid grey; padding-left: 10px;"><br>
          </div>
          <div class="form-group ">
            <input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat Anggota" required="" class="form-control font-weight-bolder" style="width: 100%; height: 40px; border-radius: 10px 10px 10px 10px; border: 2px solid grey; padding-left: 10px;"><br>
          </div>
          <div class="form-group ">
            <select name="is_active" id="is_active" class="form-control font-weight-bolder" style="width: 100%; height: 40px; border-radius: 10px; border: 2px solid grey; padding-left: 10px;" required>
              <option value="">Pilih Hak Akses</option>
              <option value="1">Admin</option>
              <option value="0">Kasir</option>
              <option value="2">Pelanggan</option>
            </select>
          </div><br>
          <div class="form-group ">
            <input type="text" name="nip" id="nip" placeholder="Masukkan Username Anggota" required="" class="form-control font-weight-bolder" style="width: 100%; height: 40px; border-radius: 10px 10px 10px 10px; border: 2px solid grey; padding-left: 10px;"><br>
          </div>
          <div class="form-group ">
            <input type="text" name="password" id="password" placeholder="Masukkan Password Anggota" required="" class="form-control font-weight-bolder" style="width: 100%; height: 40px; border-radius: 10px 10px 10px 10px; border: 2px solid grey; padding-left: 10px;"><br>
          </div>
          <div class="form-group ">
            <input type="file" name="image" id="image" class="form-control font-weight-bolder" required="" style="width: 100%; height: 40px; border-radius: 10px 10px 10px 10px; border: 2px solid grey; padding-left: 10px;"><br>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-outline-success" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /edit Modal -->

<!-- Edit Modal -->
<div class="modal fade" tabindex="-1" id="editModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Kategori Baru</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('home/tambahKategori'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" name="kategori" id="kategori" placeholder="Masukkan Nama Kategori" class="form-control font-weight-bolder" style="width: 100%; height: 40px; border-radius: 10px; border: 2px solid grey; padding-left: 10px;">
          </div><br>
          <div class="form-group">
            <input type="file" name="image" id="image" class="form-control font-weight-bolder" style="width: 100%; height: 40px; border-radius: 10px; border: 2px solid grey; padding-left: 10px;" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-outline-success" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- /edit Modal -->