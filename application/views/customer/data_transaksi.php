<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $title ?></title>
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet" type="text/css">
  <link rel="icon" href="<?= base_url() ?>assets/global/image/logo.png" type="image/png" width="40px" height="auto">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/global/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/global/css/animate.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/global/css/fonts.css" />
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/global/fonts/icofont/icofont.min.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>asset/css/profile.css" />
</head>

<body>
  <br><br><br>
  <section class="content">
    <div class="container-fluid">
      <!-- Basic Examples -->
      <div class="container mt-2 mb-2 ">
        <div class="card border-info mt-2">
          <div class="card-body">
            <div class="header">
              <h3>Riwayat Transaksi</h3>
            </div>
            <div class="body">
              <?php foreach ($transaksi as $dt) : ?>
                <div class="row">
                  <div class="col-md-5 my-4">
                    <img src="<?php echo base_url(); ?>file/kos_image/<?= $dt->image_header ?>" width="100%">
                  </div>
                  <hr>
                  <?php
                        $harga_awal = $dt->harga;
                        $diskon = $dt->diskon;
                        $mendiskon = ($diskon / 100) * $harga_awal;
                        $harg_akhir = $harga_awal - $mendiskon;
                        ?>

                  <div class="col-md-7 my-4">
                    <table class="table">
                    <tr>
                        <td>Nama Kos</td>
                        <td>: <?= $dt->nama ?> </td>
                      </tr>
                      <tr>
                        <td>ID Transaksi</td>
                        <td>: #<?= $dt->id_booking, $dt->id_kos, $dt->id_user ?> </td>
                      </tr>
                      <tr>
                        <td>Tanggal Sewa</td>
                        <td>: <?= tgl_indo($dt->tgl_sewa) ?></td>
                      </tr>
                      <tr>
                        <td>Durasi Sewa</td>
                        <td>: <?= $dt->tr_kategori ?> Bulan</td>
                      </tr>
                      <tr>
                        <td>Tanggal Selesai</td>
                        <td>: <?= tgl_indo($dt->tanggal_selesai) ?></td>
                      </tr>
                      <tr>
                        <td>Harga per Bulan</td>
                        <td>: Rp. <?= number_format($dt->kos_harga, 0, ',', '.') ?></td>
                      </tr>
                      <tr>
                        <td>Potongan Harga</td>
                        <td>: Rp. <?= number_format($mendiskon, 0, ',', '.') ?></td>
                      </tr>
                      <tr>
                        <td><strong>Total Harga</strong></td>
                        <td><strong>: Rp. <?= number_format($harg_akhir * $dt->tr_kategori, 0, ',', '.') ?></strong></td>
                      </tr>
                    </table>
                    <?php if ($dt->status_pembayaran == 1) { ?>
                      <button class="btn btn-success">Lunas</button>
                      <a href="<?= base_url(); ?>detail/<?= $dt->slug ?>" class="btn btn-info">Tambah Masa Sewa</a>
                      
                     
                    <?php } else { ?>
                      <a href="<?= base_url('transaksi/pembayaran/') . $dt->id_booking ?>" class="btn btn-warning">Lanjutkan Pembayaran</a>
                    <?php } ?>
                    <?php if ($dt->status_sewa == 'belum_selesai') { ?>
                      <a href="<?= base_url('customer/transaksi/batal_transaksi/' . $dt->id_booking) ?>" id="batal" class="btn btn-danger batal">Batal</a>
                    <?php } else { ?>
                      <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal"> Batal Transaksi </button>
                    <?php } ?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>


      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="#exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Informasi Batal Transaksi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= base_url('customer/transaksi/pembayaran_aksi') ?>" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
                Maaf Transaksi tidak bisa di batalkan :)
              </div>
              <div class="modal-footer">

                <button type="button" class="btn btn-warning text text-light">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <br><br>

      <!-- loader -->
      <!-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div> -->

<!-- 
      <script src="../../asset/js/jquery.min.js"></script>
      <script src="../../asset/js/jquery-migrate-3.0.1.min.js"></script>
      <script src="../../asset/js/popper.min.js"></script>
      <script src="../../asset/js/bootstrap.min.js"></script>
      <script src="../../asset/js/jquery.easing.1.3.js"></script>
      <script src="../../asset/js/jquery.waypoints.min.js"></script>
      <script src="../../asset/js/jquery.stellar.min.js"></script>
      <script src="../../asset/js/owl.carousel.min.js"></script>
      <script src="../../asset/js/jquery.magnific-popup.min.js"></script>
      <script src="../../asset/js/jquery.animateNumber.min.js"></script>
      <script src="../../asset/js/scrollax.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
      <script src="../../asset/js/google-map.js"></script>
      <script src="../../asset/js/main.js"></script> -->
			<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

      <script src="<?= base_url(); ?>assets/plugins/fontawesome/all.min.js"></script>


</body>

</html>
 
