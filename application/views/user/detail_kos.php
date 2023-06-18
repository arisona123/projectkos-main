<link rel="stylesheet" href="<?= base_url('asset/css/style.css') ?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="//resources/demos/style.css">

<section class="hero-wrap hero-wrap-2" style="background-image: url('../../asset/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate pb-0 text-center">
        <p class="breadcrumbs"><span class="mr-2">
            <a href="<?php echo base_url() ?>">Home <i class="fa fa-chevron-right"></i>
            </a></span> <span class="mr-2"><a href="<?php echo base_url() ?>semua-kos">Kos
              <i class="fa fa-chevron-right"></i></a></span> <span>Detail Kos <i class="fa fa-chevron-right"></i></span></p>
        <h1 class="mb-3 bread">Detail Kos</h1>
      </div>
    </div>
  </div>
</section>
<!-- list image kost -->
<section class="ftco-section ">
  <div class="container">
    <div class="detail-conten">
      <div class="detail-images">
        <div class="detail-images-left">
          <img class="detail-images-img" src="<?php echo base_url(); ?>file/kos_image/<?= $image_header ?>">
        </div>
        <div class="detail-images-right d-none d-sm-block">
          <div class="detail-images__each-right">
            <img class="detail-images-img" src="<?php echo base_url(); ?>file/kos_image/<?= $image_header ?>">
          </div>
          <div class="detail-images__each-right">
            <img class="detail-images-img" src="<?php echo base_url(); ?>file/kos_image/<?= $image_header ?>">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- list detail Kost -->
<div class="container text-left">
  <div class="row flex-column-reverse flex-lg-row">
    <div class="col">
      <div class="text">
        <strong class="subheading"><?= $kota ?></strong>
        
        <h2><b><?= $nama ?></b></h2>
        <span class="btn btn-success btn-rounded text-white">
          <?= ($tipe == 'Campur') ? '<i class="fa-solid fa-venus-mars"></i> Kos Campur' : ''; ?>
          <?= ($tipe == 'Putra') ? '<i class="fa-solid fa-mars"></i> Kos Putra' : ''; ?>
          <?= ($tipe == 'Putri') ? '<i class="fa-solid fa-venus"></i> Kos Putri' : ''; ?>
        </span>

        <?php
        if (!empty($diskon)) { ?>
          <span class="btn btn-warning btn-rounded text-white">
            Diskon
          </span>
        <?php } ?>
        <br>
        <?php
        $harga_awal = $harga;
        $diskon = $diskon;
        $mendiskon = ($diskon / 100) * $harga_awal;
        $harg_akhir = $harga_awal - $mendiskon;
        ?>

        <strong class="subheading mt-4"><i class="fa-sharp fa-solid fa-door-closed text-dark"></i>&ensp;Tersisa <span class="<?= ($total_kamar <= '2') ? 'text-danger' : 'text-success'; ?>"><?= $total_kamar ?> Kamar</span> </strong>
        <h3 class="text-success"><b>Rp. <?= $this->cart->format_number($harg_akhir); ?> /bulan</h3>
        <?php
        if (!empty($diskon)) { ?>
          <h5 class="text-muted"><b><s>Rp. <?= $this->cart->format_number($harga); ?></s></h5>
        <?php } ?>
        <div class="container text-right">
          <span class="btn btn-success btn-rounded mr-2"><img src="<?= base_url(); ?>/asset/images/simpan22.png" width="15px" heigth="20px">&ensp;Simpan</span>
          <span class="btn btn-success btn-rounded"><img src="<?= base_url(); ?>/asset/images/share.png" width="15px" heigth="20px">&ensp;Bagikan</span>
        </div>
        <hr>
        <!-- list owner -->
        <div class="image-profile">
          <div class="row">
            <div class="col">
              <h5 class="text"><b>Kos di sewakan Oleh <?= ucwords($fullname) ?></b></h5>
              <span class="text-dark">Hubungi&nbsp; : &ensp;</span>
              <a href="https://wa.me/<?= cvt_no($no_hp); ?>" target="_blank"><i class="fa-brands fa-whatsapp text-success fa-lg mr-2"></i></a>
              <a href="sms:<?= cvt_no($no_hp); ?>"><i class="fa-sharp fa-solid fa-message-sms text-success fa-lg mr-2"></i></a>
              <a href="tel:<?= cvt_no($no_hp); ?>"><i class="fa-sharp fa-solid fa-phone text-success fa-lg"></i></a>
            </div>
            <div class="col-2 text-right">
              <img class="rounded-circle" src="<?php echo base_url() ?>assets/images/profile/<?= $foto ?>" width="50px" alt="User" />
            </div>
          </div>
        </div>
        <hr>
        <!-- masp -->
        <h4 class="text-success"><b>Lokasi dan lingkungan sekitar</b></h4>
        <span class="subheading"><img src="<?= base_url(); ?>/asset/images/location.png" width="20px" heigth="300px"> &ensp;<?= $alamat ?></span>
        <br>
        <iframe width="100%" height="400" style="border:0" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC9tBei6I7vwLBsBHEBkD_ObDTUsk5mq04
           &q=<?= $alamat ?>">
        </iframe>
        <div>
          <h4 class="text-success"><b>Tempat terdekat</b></h4>
          <div id="pills-description" aria-labelledby="pills-description-tab">
            <div class="col-md-12">
              <?php if (!empty($tempat)) { ?>
                <?php foreach ($tempat as $item) { ?>
                  <!-- !empty($user->role) ? $user->role->name:'' -->
                  <?= ($item['kategoriTempat'] == 'MASJID') ? '<i class="fa-sharp fa-solid fa-mosque text-dark"></i>' : ''; ?>
                  <?= ($item['kategoriTempat'] == 'RUMAH MAKAN') ? '<i class="fa-solid fa-fork-knife text-dark"></i>' : ''; ?>
                  <?= ($item['kategoriTempat'] == 'ATM') ? '<i class="fa-solid fa-money-bill-simple-wave text-dark"></i>' : ''; ?>
                  <?= ($item['kategoriTempat'] == 'UNIVERSITAS') ? '<i class="fa-sharp fa-solid fa-buildings text-dark"></i>' : ''; ?>
                  <?= ($item['kategoriTempat'] == 'RUMAH SAKIT') ? '<i class="fa-sharp fa-solid fa-hospital text-dark"></i>' : ''; ?>
                  <?= ($item['kategoriTempat'] == 'TEMPAT BELANJA') ? '<i class="fa-sharp fa-solid fa-store text-dark"></i>' : ''; ?>
                  <?= ($item['kategoriTempat'] == 'STASIUN KERETA') ? '<i class="fa-solid fa-train text-dark"></i>' : ''; ?>
                  <?= ($item['kategoriTempat'] == 'BANDARA') ? '<i class="fa-sharp fa-solid fa-plane text-dark"></i>' : ''; ?>
                  <?= ($item['kategoriTempat'] == 'TERMINAL BUS') ? '<i class="fa-sharp fa-solid fa-bus"></i>' : ''; ?>
                  <!-- <div class="text"><img src="<?= base_url(); ?>/asset/images/<?= $item['kategoriTempat'] ?>.png" width="20" heigth="40">&ensp;<?= $item['namaTempat'] ?></div> -->
                  <span>&ensp; <?= $item['namaTempat']; ?><br></span>
                <?php } ?>
              <?php } ?>
            </div>
          </div>
        </div>
        <hr>
        <div id="pills-tabContent">
          <h4 class="text-success"><b>Spesifikasi Kamar</b></h4>
          <div id="pills-spesifikasi" aria-labelledby="pills-spesifikasi-tab">
            <div class="col-md-12">
              <?php
              $aturan = explode(";", $spesifikasi_kamar);
              foreach ($aturan as $val) { ?>
                <?= (stripos($val, 'Meter') !== false) ? '<i class="fa-solid fa-expand-wide text-dark"></i>' : '' ?>
                <?= (stripos($val, 'Listrik') !== false) ? '<i class="fa-solid fa-bolt text-dark"></i>' : '' ?>
                &ensp;<?= $val ?><br>
              <?php };
              ?>
            </div>
          </div>
          <hr>
          <!-- list detail fassilitas -->
          <h4 class="text-success"><b>Fasilitas Kamar</b></h4>
          <div id="pills-fasilitas" aria-labelledby="pills-fasilitas-tab">
            <div class="col-md-12">
              <?php if (!empty(json_decode($fasilitas))) { ?>
                <?php foreach (array_chunk(json_decode($fasilitas), 2) as $row) { ?>
                  <div class="row">
                    <?php foreach ($row as $value) { ?>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <?= ($value == 'Kasur') ? '<class="check"><img src="' . base_url() . 'asset/images/kasur2.png" width="20" heigth="20">' : ''; ?>
                        <?= ($value == 'Kursi') ? '<class="check"><img src="' . base_url() . 'asset/images/kursi.png" width="20" heigth="20">' : ''; ?>
                        <?= ($value == 'Kipas Angin') ? '<class="check"><img src="' . base_url() . 'asset/images/kipas.png" width="20" heigth="20">' : ''; ?>
                        <?= ($value == 'Lemari Baju') ? '<class="check"><img src="' . base_url() . 'asset/images/lemari3.png" width="20" heigth="20">' : ''; ?>
                        <?= ($value == 'Bantal') ? '<class="check"><img src="' . base_url() . 'asset/images/bantal.png" width="20" heigth="20">' : ''; ?>
                        <?= ($value == 'Guling') ? '<class="check"><img src="' . base_url() . 'asset/images/guling.png" width="20" heigth="20">' : ''; ?>
                        <?= ($value == 'Cermin') ? '<class="check"><img src="' . base_url() . 'asset/images/cermin.png" width="20" heigth="20">' : ''; ?>
                        <?= ($value == 'Kamar Mandi') ? '<class="check"><img src="' . base_url() . 'asset/images/bathtub.png" width="20" heigth="20">' : ''; ?>
                        <?= ($value == 'Jendela') ? '<class="check"><img src="' . base_url() . 'asset/images/jendela.png" width="20" heigth="20">' : ''; ?>
                        <?= ($value == 'Ventilasi') ? '<class="check"><img src="' . base_url() . 'asset/images/ventilasi.png" width="20" heigth="20">' : ''; ?>
                        <?= ($value == 'Meja') ? '<class="check"><img src="' . base_url() . 'asset/images/meja.png" width="20" heigth="20">' : ''; ?>
                        <?= ($value == 'Kosongan') ? '<class="check"><img src="' . base_url() . 'asset/images/kosongan.png" width="20" heigth="20">' : ''; ?>
                        <?= "<span>&nbsp; $value </span>" ?>
                      </div>
                    <?php } ?>
                  </div>
                <?php } ?>
              <?php } ?>
            </div>
          </div>
          <hr>
          <h4 class="text-success"><b>Fasilitas Kamar Mandi</b></h4>
          <div id="pills-fasilitas" aria-labelledby="pills-fasilitas-tab">
            <div class="col-md-12">
              <?php if (!empty(json_decode($fasilitas_kamar_mandi))) { ?>
                <?php foreach (array_chunk(json_decode($fasilitas_kamar_mandi), 2) as $row) { ?>
                  <div class="row">
                    <?php foreach ($row as $value) { ?>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <?= ($value == 'K. Mandi Dalam') ? '<i class="fa-sharp fa-solid fa-bath text-dark"></i>' : ''; ?>
                        <?= ($value == 'K. Mandi Luar') ? '<i class="fa-sharp fa-solid fa-bath text-dark"></i>' : ''; ?>
                        <?= ($value == 'Kloset Duduk') ? '<i class="fa-solid fa-toilet text-dark"></i>' : ''; ?>
                        <?= ($value == 'Kloset Jongkok') ? '<i class="fa-solid fa-toilet text-dark"></i>' : ''; ?>
                        <?= ($value == 'Shower') ? '<i class="fa-solid fa-shower text-dark"></i>' : ''; ?>
                        <?= ($value == 'Air Panas') ? '<i class="fa-solid fa-fire text-dark"></i>' : ''; ?>
                        <?= ($value == 'Cermin') ? '<i class="fa-solid fa-face-smile text-dark"></i>' : ''; ?>
                        <?= ($value == 'Bathtub') ? '<i class="fa-solid fa-bath text-dark"></i>' : ''; ?>
                        <?= "<span>&nbsp; $value </span>" ?>
                      </div>
                    <?php } ?>
                  </div>
                <?php } ?>
              <?php } ?>
            </div>
          </div>
          <hr>
          <h4 class="text-success"><b>Peraturan Kamar Ini</b></h4>
          <div id="pills-fasilitas" aria-labelledby="pills-fasilitas-tab">
            <div class="col-md-12">
              <?php if (!empty(json_decode($peraturan_kamar))) { ?>
                <?php foreach (json_decode($peraturan_kamar)  as $item) { ?>
                  <?= (strpos($item, 'dihuni') !== false) ? '<i class="fa-sharp fa-solid fa-person text-dark"></i>' : ''; ?>
                  <?= (strpos($item, 'pasutri') !== false) ? '<i class="fa-solid fa-people text-dark"></i>' : ''; ?>
                  <?= (strpos($item, 'anak') !== false) ? '<i class="fa-sharp fa-solid fa-baby text-dark"></i>' : ''; ?>
                  <?= (strpos($item, 'menginap') !== false) ? '<i class="fa-sharp fa-solid fa-moon text-dark"></i>' : ''; ?>
                  <span>&ensp; <?= $item; ?><br></span>
                <?php } ?>
              <?php } ?>
            </div>
          </div>
          <hr>
          <h4 class="text-success"><b>Fasilitas Umum</b></h4>
          <div id="pills-fasilitas" aria-labelledby="pills-fasilitas-tab">
            <div class="col-md-12">
              <?php if (!empty(json_decode($fasilitas_umum))) { ?>
                <?php foreach (array_chunk(json_decode($fasilitas_umum), 2) as $row) { ?>
                  <div class="row">
                    <?php foreach ($row as $value) { ?>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <?= ($value == 'Wifi') ? '<i class="fa-solid fa-wifi text-dark"></i>' : ''; ?>
                        <?= ($value == 'Laundry') ? '<i class="fa-solid fa-washing-machine text-dark"></i>' : ''; ?>
                        <?= ($value == 'Dapur') ? '<i class="fa-solid fa-knife-kitchen text-dark"></i>' : ''; ?>
                        <?= ($value == 'CCTV') ? '<i class="fa-solid fa-camera text-dark"></i>' : ''; ?>
                        <?= ($value == 'Pengurus Kos') ? '<i class="fa-solid fa-broom text-dark"></i>' : ''; ?>
                        <?= ($value == 'Penjaga Kos') ? '<i class="fa-solid fa-user-police-tie text-dark"></i>' : ''; ?>
                        <?= ($value == 'Kulkas') ? '<i class="fa-solid fa-ice-cream text-dark"></i>' : ''; ?>
                        <?= ($value == 'Dispenser') ? '<i class="fa-sharp fa-solid fa-glass text-dark"></i>' : ''; ?>
                        <?= ($value == 'Gazebo') ? '<i class="fa-sharp fa-solid fa-house text-dark"></i>' : ''; ?>
                        <?= ($value == 'Rice Cooker') ? '<i class="fa-solid fa-bowl-rice text-dark"></i>' : ''; ?>
                        <?= "<span>&nbsp; $value </span>" ?>
                      </div>
                    <?php } ?>
                  </div>
                <?php } ?>
              <?php } ?>
            </div>
          </div>
          <hr>
          <h4 class="text-success"><b>Fasilitas Parkir</b></h4>
          <div id="pills-fasilitas" aria-labelledby="pills-fasilitas-tab">
            <div class="col-md-12">
              <?php if (!empty(json_decode($fasilitas_parkir))) { ?>
                <?php foreach (json_decode($fasilitas_parkir)  as $item) { ?>
                  <?= ($item == 'Parkir Motor') ? '<i class="fa-solid fa-motorcycle text-dark"></i>' : ''; ?>
                  <?= ($item == 'Parkir Mobil') ? '<i class="fa-solid fa-car-side text-dark"></i>' : ''; ?>
                  <?= ($item == 'Parkir Sepeda') ? '<i class="fa-solid fa-bicycle text-dark"></i>' : ''; ?>
                  <span>&ensp; <?= $item; ?><br></span>
                <?php } ?>
              <?php } ?>
            </div>
          </div>
          <hr>
        </div>
      </div>
    </div>

    <!-- list detail sewa kost -->
    <div class="col container text-left sticky-top" style="top: 100px; z-index: 0;">
      <div class="col" class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light">
        <div class="property-wrap ftco-animate fadeInUp ftco-animated">
          <div class="card" style="width: 100%;">
            <div class="card-body">
              <form action=" <?= base_url('transaksi/tambah_sewa_aksi') ?> " method="POST">
                <h3 class="text-success"><b>Rp. <?= $this->cart->format_number($harg_akhir); ?> /bulan</h3>
                <input type="hidden" name="harga" id="harga" value="<?= $harga ?>" hidden>
                <input type="hidden" name="id_owner" value="<?= $id_user ?>">
                <input type="hidden" name="sisa_kamar" value="<?= $sisa_kamar ?>">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="hidden" name="id_kos" value="<?= $id_kos ?>">
                    <input class="form-control  readonly" type="text" placeholder="Tanggal Mulai " id="datepicker" name="tgl_sewa" autocomplete="off" required onkeypress="return false;" style="caret-color: transparent !important;">
                    <!-- <input class="form-control text-hidden" type="date" id="tgl_sewa" name="tgl_sewa" required> -->
                    <small class="text-danger"><?php echo form_error('tgl_sewa'); ?></small>
                  </div>
                  <div class="col-sm-6">
                    <select class="form-control" id="kategori" name="kategori" data-placeholder="Kategori sewa" aria-label="Default select example" required>
                      <option value="" hidden>Kategori Sewa</option>
                      <?php foreach (json_decode($kategori) as $value) {
                        if ($value == 1) {
                          $textKategori = "Per Bulan";
                        } elseif ($value == 3) {
                          $textKategori = "Per 3 Bulan";
                        } elseif ($value == 6) {
                          $textKategori = "Per 6 Bulan";
                        } elseif ($value == 12) {
                          $textKategori = "Per 1 Tahun";
                        } ?>
                        <option value="<?= $value ?>"><?= $textKategori ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <?php
                $sudah_login = $this->session->userdata('sudah_login');
                $id_sess = $this->session->userdata('id_user');

                if ($sudah_login) { ?>
                  <button type="submit" class="btn btn-success btn-lg btn-block" value="" <?= (empty(json_decode($kategori)) || $sisa_kamar == 0 || $id_user == $id_sess) ? 'disabled' : ''; ?>>
                    <b>Ajukan Sewa</b>
                  </button>
                  <?= (empty(json_decode($kategori))) ? '<small class="text-danger">Pemilik kost tidak memasukan Kategori Sewa!!</small>' : ''; ?>
                  <?= ($sisa_kamar == 0) ? '<div><small class="text-danger">Kamar Habis !!</small></div>' : ''; ?>
                  <?= ($id_user == $id_sess) ? '<div><small class="text-danger">Anda tidak dapat menyewa kos anda sendiri!</small></div>' : ''; ?>
                <?php } else { ?>
                  <button class="btn btn-success btn-lg btn-block" disabled><b>Ajukan Sewa</b></button>
                  <small class="text-danger">Anda harus melakukan login untuk mengajukan sewa kos!!</small>
                <?php } ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
  $(function() {
    $("#datepicker").datepicker({
      dateFormat: "yy-mm-dd",
      showAnim: "slideDown",
      minDate: -0,
      maxDate: "+2M +10D"

    });
  });

  const kategori = document.getElementById('kategori');
  const harga = document.getElementById('harga');
  const hargaText = document.getElementById('harga-text');

  setHarga(harga.value, 1);

  kategori.addEventListener('change', function(event) {
    setHarga(harga.value, kategori.value);
  });

  function setHarga(a, b) {
    let hargaKos = a * b;
    let nf = new Intl.NumberFormat('id-ID');
    if (kategori.value == 12) {
      hargaText.innerHTML = `<b>Rp.${nf.format(hargaKos)} /Tahun`;
    } else {
      hargaText.innerHTML = `<b>Rp.${nf.format(hargaKos)} /Bulan`;
    }
  }
</script>