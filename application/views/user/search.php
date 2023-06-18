<!DOCTYPE html>
<html lang="en">

<head>
  <title>SevenKos | Solusi cari kost!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>">
  <!-- <link rel="stylesheet" href="../asset/css/animate.css"> -->
  <link rel="stylesheet" href="<?= base_url('asset/css/animate.css') ?>">
  <!-- <link rel="stylesheet" href="../asset/css/owl.carousel.min.css">
  <link rel="stylesheet" href="../asset/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../asset/css/magnific-popup.css"> -->
  <link rel="stylesheet" href="<?= base_url('asset/css/owl.carousel.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/owl.theme.default.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/magnific-popup.css') ?>">
  <!-- <link rel="stylesheet" href="../asset/css/flaticon.css">
  <link rel="stylesheet" href="../asset/css/style.css"> -->
  <link rel="stylesheet" href="<?= base_url('asset/css/flaticon.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/style.css') ?>">

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
</head>

<body>

  <section class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate pb-0 text-center">
          <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url() ?>">Home <i class="fa fa-chevron-right"></i></a></span> <span>Kost<i class="fa fa-chevron-right"></i></span></p>
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
          <div class="col-md-12" style="display: inline-block;">
            <?php echo form_open('search') ?>
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
        <form action="filter" method="get">
          <div class="form-inline">
            <div class="p-2">
              <select class="form-control" name="kota">
                <option value="" hidden>Kota</option>
                <option value="Jakarta" <?= ($this->input->get('kota') == 'Jakarta') ? 'selected' : ''; ?>>Jakarta</option>
                <option value="Yogyakarta" <?= ($this->input->get('kota') == 'Yogyakarta') ? 'selected' : ''; ?>>Yogyakarta</option>
                <option value="Surabaya" <?= ($this->input->get('kota') == 'Surabaya') ? 'selected' : ''; ?>>Surabaya</option>
                <option value="Bandung" <?= ($this->input->get('kota') == 'Bandung') ? 'selected' : ''; ?>>Bandung</option>
              </select>
            </div>
            <div class="p-2">
              <select class="form-control" name="tipe">
                <option value="" hidden>Tipe</option>
                <option value="Campur" <?= ($this->input->get('tipe') == 'Campur') ? 'selected' : ''; ?>>Campur</option>
                <option value="Putra" <?= ($this->input->get('tipe') == 'Putra') ? 'selected' : ''; ?>>Putra</option>
                <option value="Putri" <?= ($this->input->get('tipe') == 'Putri') ? 'selected' : ''; ?>>Putri</option>
              </select>
            </div>
            <div class="p-2">
              <button type="submit" class="btn btn-success">Filter</button>
              <a href="<?php echo base_url() ?>semua-kos" class="btn btn-light">Reset</a>
            </div>
          </div>
          <?php echo form_close() ?>
      </div>

      <br>
      <div class="row ftco-animate justify-content-center">
        <?= (empty($sql)) ? '<div class="alert alert-info" role="alert">Data yang anda cari tidak tersedia!!</div>' : ''; ?>
        <?php foreach ($sql as $kos) : ?>
          <div class="item" style="width:352px; margin: 1rem;">
            <div class="property-wrap ftco-animate">
            <?php if ($kos->diskon) { ?>
            <div class="btn bg-warning text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Diskon <?= $kos->diskon?>%</div>
            <?php } ?>
              <a href="<?= base_url(); ?>detail/<?= strtolower($kos->slug) ?>"><img src="<?php echo base_url(); ?>file/kos_image/<?= $kos->image_header ?>" fix width="352px" height="250">

                <br><br>
                <button class="btn btn-success btn-rounded" style="margin-left: 2em">
                  <?php
                  if ($kos->tipe == 'Campur') {
                    echo 'Campur';
                  } elseif ($kos->tipe == 'Putra') {
                    echo 'Putra';
                  } elseif ($kos->tipe == 'Putri') {
                    echo 'Putri';
                  }

                  ?>
                </button>
                
               
                
                 <div class="text">
                  <h3> <a href="<?= base_url(); ?>detail/<?= $kos->slug ?>">
                      <?= $kos->nama ?></a>
                  </h3>
                  <span class="location"> <?= $kos->alamat ?></span>
                  <br><br>
                    <?php
                    $query = $this->db->query("SELECT COUNT(t.id_kos) AS count
                    FROM transaksi t
                    JOIN tb_user u ON t.id_user = u.id_user
                    WHERE u.is_active = 1
                    AND t.id_kos = " . $this->db->escape($kos->id_kos));

                    $sewa= $query->row()->count;
                    $total_kamar = $kos->sisa_kamar - $sewa;?>
                    <h3 class="text-success">Tersedia <?=$total_kamar?>  kamar</h3>
                    <?php        
                    $harga_awal = $kos->harga;
                    $diskon = $kos->diskon;
                    $mendiskon = ($diskon / 100) * $harga_awal;
                    $harg_akhir = $harga_awal - $mendiskon;
                    ?>
                  <h3 class="
                  <?php
        if (!empty($kos->diskon)) { ?>
                  text-warning
                  <?php } ?>
                  "><strong><span>Rp. <?= $this->cart->format_number($harg_akhir); ?><small> / bulan</small></span></strong></h3>
                  <!-- <?php
        if (!empty($kos->diskon)) { ?>
          <h6 class="text-muted"><b><s>Rp. <?= $this->cart->format_number($kos->harga); ?></s></h6>
        <?php } ?> -->
                  <div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
                    <div class="d-flex align-items-center">
                      <div class="img" style="background-image: url(images/person_1.jpg);"></div>
                    </div>
                    <span class="text-right"><?= tgl_indo($kos->date) ?></span>
                  </div>
                </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
      <?= $this->pagination->create_links(); ?>
    </div>
  </section>
  <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>

  <script src="<?= base_url('asset/js/jquery.min.js') ?>"></script>
  <script src="<?= base_url('asset/js/jquery-migrate-3.0.1.min.js') ?>"></script>
  <script src="<?= base_url('asset/js/popper.min.js') ?>"></script>
  <script src="<?= base_url('asset/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('asset/js/jquery.easing.1.3.js') ?>"></script>
  <script src="<?= base_url('asset/js/jquery.waypoints.min.js') ?>"></script>
  <script src="<?= base_url('asset/js/jquery.stellar.min.js') ?>"></script>
  <script src="<?= base_url('asset/js/owl.carousel.min.js') ?>"></script>
  <script src="<?= base_url('asset/js/jquery.magnific-popup.min.js') ?>"></script>
  <script src="<?= base_url('asset/js/jquery.animateNumber.min.js') ?>"></script>
  <script src="<?= base_url('asset/js/scrollax.min.js') ?>"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?= base_url('asset/js/google-map.js') ?>"></script>
  <script src="<?= base_url('asset/js/main.js') ?>"></script>
</body>

</html>