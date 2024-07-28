<body>
  <nav class="navbar">
    <a href="#" class="navbar-logo">Bfour<span> Coffee</span></a>

    <div class="nav-item">
      <a href="#home">Home</a>
      <a href="#about">Tentang Kami</a>
      <a href="#contact">Kontak</a>

    </div>
  </nav>

  <!-- Hero Section start -->
  <section class="hero" id="home">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/img/upload/download.jpeg'); ?>" style="max-width: 100%; max-height: 100%; height: 650px; width: 1440px">
      <main class="content">
        <h1>get your coffee <span>ready</span></h1>
        <br>
        <a type="submit" style="height: 55px; text-decoration: none;" class="cta btn-primary btn-user btn-block text-dark" href="<?= base_url('admin'); ?>"><strong>Pesan Sekarang</strong></a>
      </main>
    </div>
  </section>
  <!-- Hero Section end -->

  <!-- About Section start -->
  <section id="about" class="about">
    <h2><span>Tentang</span> Kami</h2>

    <div class="row">
      <div class="col-md-6">
        <img src="<?php echo base_url('assets/img/upload/latte_2.jpg'); ?>" alt="Tentang Kami" style="height: 30rem;">
      </div>
      <div class="content" style="margin-top: 3rem;">
        <h3>Kenapa memilih kopi kami?</h3>
        <p>Kami menggunakan biji kopi pilihan, yang di kirim dari petani kopi terpercaya sehingga menjaga cita rasa dari minuman kami</p>
        <p>terdapat berbagai varian rasa kopi dan non kopi, serta memiliki tempat yang nyaman untuk melakukan ativitas anda baik hanya nongkrong asik maupun Work From Coffee shop</p>
      </div>
    </div>
  </section>


  <!-- Contact Section start -->
  <section id="contact" class="contact">
    <h2><span>Kontak</span> Kami</h2>

    <div class="row">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9875830810124!2d107.55576407317838!3d-6.892087967439901!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e5299dc3fb65%3A0xd1a0b8dbfa28f014!2sBfour%20Coffee!5e0!3m2!1sen!2sid!4v1716431949522!5m2!1sen!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>


    </div>
  </section>
  <!-- Contact Section end -->

  <!-- Footer start -->
  <footer>
    <!-- <div class="socials">
      <a href="#"><i data-feather="instagram"></i></a>
    </div> -->

    <div class="copyright text-center my-auto">
      <span>Create by &copy; Indra Ardiansyah <?= date('Y'); ?></span>
    </div>

  </footer>
  <!-- Footer end -->

  <br>