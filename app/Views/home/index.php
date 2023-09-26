<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        <h1>Selamat Datang</h1>
        <h2><?= $perusahaan['nama_perusahaan']; ?></h2>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img src="<?= base_url('Arsha'); ?>/assets/img/hero-img.png" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<!-- ======= About Us Section ======= -->
<section id="about" class="about">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>About Us</h2>
    </div>

    <div class="row content">
      <div class="col-lg-6">
        <p>
          <?= $perusahaan['tentang_kami']; ?>
        </p>
        <!-- <ul>
          <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
          <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
          <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
        </ul> -->
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0">
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="<?= base_url('Arsha'); ?>/assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </div>
</section><!-- End About Us Section -->

<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Layanan</h2>
      <p>berikut merupakan layanan kami:</p>
    </div>

    <div class="row">

      <?php foreach ($layanan as $key => $l) { ?>
        <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="fa-solid fa-magnifying-glass"></i></div>
            <h4><a href=""><?= $l['nama_layanan']; ?></a></h4>
            <p><?= $l['deskripsi_layanan']; ?></p>
          </div>
        </div>
      <?php } ?>

    </div>

  </div>
</section><!-- End Services Section -->