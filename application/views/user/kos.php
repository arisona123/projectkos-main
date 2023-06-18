<!DOCTYPE html>
<html lang="en">

<head>
  <title>SevenKos | Solusi cari kost!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

  <link rel="stylesheet" href="../asset/css/animate.css">

  <link rel="stylesheet" href="../asset/css/owl.carousel.min.css">
  <link rel="stylesheet" href="../asset/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../asset/css/magnific-popup.css">


  <link rel="stylesheet" href="../asset/css/flaticon.css">
  <link rel="stylesheet" href="../asset/css/style.css">
</head>

<body>

  <section class="hero-wrap hero-wrap-2" style="background-image: url('../asset/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate pb-0 text-center">
          <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url() ?>Main_Front_User">Home <i class="fa fa-chevron-right"></i></a></span> <span>Kost<i class="fa fa-chevron-right"></i></span></p>
          <h1 class="mb-3 bread">Kost</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          <span class="subheading">What we offer</span>
          <h2 class="mb-2">Cari Kostmu Sekarang</h2>
        </div>
      </div>

      <div class="container justify-content-center">
        <div class="row">
          <div class="col-md-12">
            <?php echo form_open('Main_Front_User/search') ?>
            <div class="input-group mb-3">
              <input type="text" class="form-control input-text" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2" name="keyword">
              <div class="input-group-append">
                <button class="btn btn-outline-success btn-lg" type="submit"><i class="fa fa-search"></i></button>
              </div>
            </div>
            <?php echo form_close() ?>
          </div>
        </div>
      </div>

      <div class="d-flex p-3 justify-content-center">
        <?php echo form_open('Main_Back_User/filter') ?>
        <div class="form-inline">
          <div class="p-2">
            <select class="form-control " name="kota">
              <option>Kota</option>
              <option value="Jakarta">Jakarta</option>
              <option value="Yogyakarta">Yogyakarta</option>
              <option value="Surabaya">Surabaya</option>
              <option value="Bandung">Bandung</option>
            </select>
          </div>
          <div class="p-2">
            <select class="form-control" name="tipe">
              <option>Tipe</option>
              <option value="Campur">Campur</option>
              <option value="Putra">Putra</option>
              <option value="Putri">Putri</option>
            </select>
          </div>
          <div class="p-2">
            <?php echo form_submit(['name' => 'submit', 'value' => 'Search', 'class' => 'btn btn-success']) ?>
          </div>
        </div>
        <?php echo form_close() ?>
      </div>

      <br><br>

      <div class="row ftco-animate">
        <?php foreach ($sql as $kos) : ?>

          <div class="item" style="width:352px; margin: 1rem;">
            <div class="property-wrap ftco-animate">
              <img src="<?php echo base_url(); ?>file/kos_image/<?= $kos->image_header ?>" width="352px">
              <br><br>
              <button type="button" class="btn btn-success btn-rounded" style="margin-left: 2em">
                <?php
                if ($kos->tipe == 'Campur') {
                  echo 'Campur';
                } elseif ($kos->tipe == 'Putra') {
                  echo 'Putra';
                } elseif ($kos->tipe == 'Putri') {
                  echo 'Putri';
                } ?>
              </button>
              <div class="text">
                <h3> <a href="<?= base_url(); ?>Main_Front_User/view_konten_kos/<?= $kos->slug ?>">
                    <?= $kos->nama ?></a>
                </h3>
                <span class="location"><?= $kos->alamat ?></span>
                <br><br>
                <h3 class="text-success">Tersedia <?= $kos->sisa_kamar ?> kamar</h3>
                <h3><b><span>Rp. <?= $this->cart->format_number($kos->harga); ?></del><small> / bulan</small></span></b></h3>
                <div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
                  <div class="d-flex align-items-center">
                    <div class="img" style="background-image: url(images/person_1.jpg);"></div>
                  </div>
                  <span class="text-right"><?= $kos->date ?></span>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
      <?= $this->pagination->create_links(); ?>
    </div>
  </section>

  <!-- loader -->
  <!-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div> -->

  <script src="../asset/js/jquery.min.js"></script>
  <script src="../asset/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../asset/js/popper.min.js"></script>
  <script src="../asset/js/bootstrap.min.js"></script>
  <script src="../asset/js/jquery.easing.1.3.js"></script>
  <script src="../asset/js/jquery.waypoints.min.js"></script>
  <script src="../asset/js/jquery.stellar.min.js"></script>
  <script src="../asset/js/owl.carousel.min.js"></script>
  <script src="../asset/js/jquery.magnific-popup.min.js"></script>
  <script src="../asset/js/jquery.animateNumber.min.js"></script>
  <script src="../asset/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../asset/js/google-map.js"></script>
  <script src="../asset/js/main.js"></script>

</body>

</html>