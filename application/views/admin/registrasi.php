<body>

  <!-- Main Content -->
  <form class="user" method="post" action="<?= base_url('admin/registrasi'); ?>">
    <div class="container-fluid">
      <div class="row main-content bg-success text-center">
        <div class="col-md-4 text-center company__info">
          <h5 class="logoo">
            <img src="<?php echo base_url('assets/img/avatar.jpg'); ?>" alt="Image" class="img-fluid "
              style="max-width: 100%; max-height:100%; height: 120px;">
            <br><br>
            <span> Bfour</span>
            Coffee
          </h5>
        </div>
        <div class=" col-md-8 col-xs-12 col-sm-12 login_form">
          <div class=" container-fluid">
            <div class="row">
              <h2>Registrasi </h2>
            </div>
            <div class="row">
              <div class="form-group first">
                <div class="col">
                  <input type="text" name="nama_admin" id="nama_admin" class="form__input" placeholder="Nama lengkap" required
                    value="<?= set_value('nama_admin'); ?>">
                  <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group last">
                <div class="col">
                  <input type="text" name="nip" id="nip" class="form__input" placeholder="Username" required
                    value="<?= set_value('nip'); ?>">
                  <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group last">
                <div class="col">
                  <input type="password" name="password" id="password" class="form__input" placeholder="Password" required
                    value="<?= set_value('password'); ?>">
                  <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group last ">
                <div class="col">

                </div>
              </div>
            </div>
            <div class="form-group last">
              <div class="col">
                <input type="submit" value="Sign Up" id="btnLogin" class="btn">
              </div>
            </div>
            <div class="form-group last">
              <div class="col">
                <p>Sudah punya Akun? <a href="<?= base_url('admin'); ?>" class="link-primary text-center">Sign In</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>