<body>
  <?= $this->session->flashdata('pesan'); ?>
  <form class="admin" method="post" action="<?= base_url('admin'); ?>">
    <div class="wrapper">
      <div class="gambar align-items-center">
        <img src="<?php echo base_url('assets/img/upload/logo2.png'); ?>" alt="Image" class="img-fluid ">
      </div>
      <div class="text-center mt-4 name"> Login Admin</div>
      <hr>
      <br>
      <div class="form-field d-flex align-items-center">
        <input type="text" class="form-control" id="nip" name="nip" placeholder="Nomor Induk Pegawai"
          value="<?= set_value('nip'); ?>">
        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-field d-flex align-items-center">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password"
          value="<?= set_value('password'); ?>">
        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <br>
      <input type="submit" value="Log In" id="btnLogin" class="btn mt-3"></input>
      <div class="text-center fs-6"> Belum memiliki akun ? <a href="<?= base_url('admin/registrasi'); ?>"
          class="link-primary text-center">Sign up</a> </div>
    </div>
  </form>