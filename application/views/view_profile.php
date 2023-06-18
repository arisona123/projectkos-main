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
<style>
  .title {
    font-size: 1.5em;
    font-weight: bold;
    text-decoration: none;
    z-index: 100;
    position: absolute;
    height: 200px;
    width: 200px;
    top: 68px;
    left: 50%;
    transform: translate(-50%, 0);
    opacity: 0;
    transition: opacity 0.5s;
    background: rgba(0, 153, 51, 0.5);
    color: white;
    border-radius: 50%;

    /* position the text in t’ middle*/
    display: flex;
    align-items: center;
    justify-content: center;
  }
</style>

<body>
  <?php foreach ($sql as $user) : ?>

    <div class="container container-profile">
      <article class="listing">
        <div class=" image image-profile ">
          <a class="title" href="<?= base_url() ?>Main_Back_User/edit_foto/<?= $user->id_user ?>">
            <button type="button" class="btn btn-outline-light btn-sm ">Ubah Foto</button> </a>
          <img class=" image-user bg-light" src="<?php echo base_url() ?>assets/images/profile/<?= $user->foto ?>" alt="User" />
        </div>
      </article>
      <br>
      <div class="card-profile">
        <div class="row">
          <div class="col-12">
            <p class="nama-profil"><b><?= $user->fullname ?></b></p>
            <hr class="hr-profile">
          </div>

          <div class="col-12">
            <center><a href="<?= base_url() ?>profil/edit/<?= $user->id_user ?>"><button class="btn btn-success"><b>Ubah Profil</b></button></a>
              <a href="<?= base_url() ?>password/edit/<?= $user->id_user ?>"><button class="btn btn-success"><b>Ubah Password</b></button></a>
            </center>
          </div>

          <div class="col-12">
            <?php if ($this->session->flashdata('pesan_sukses') == TRUE) { ?>
              <br>
              <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?= $this->session->flashdata('pesan_sukses') ?> </strong>
              </div>
            <?php } else if ($this->session->flashdata('pesan_gagal') == TRUE) { ?>
              <br>
              <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong><?= $this->session->flashdata('pesan_gagal'); ?></strong>
              </div>
            <?php } ?>
          </div>

          <div class="col-md-6">
            <div class="content-profile">
              <h4>Email :</h4>
              <p class="background"><?= $user->email ?></p>
            </div>
            <div class="content-profile">
              <h4>Telepon :</h4>
              <p><?= $user->no_hp ?></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="content-profile">
              <h4>Jenis Kelamin :</h4>
              <p><?= $user->jk ?></p>
            </div>
            <div class="content-profile">
              <h4>Alamat :</h4>
              <p><?= $user->alamat ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach ?>
  <script type="text/javascript" src="<?= base_url() ?>assets/global/js/jquery/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/global/js/bootstrap/bootstrap.min.js"></script>
</body>

</html>
<br><br>

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
<script src="../../asset/js/main.js"></script>
<script src="<?php echo base_url('asset_login/'); ?>js/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url('asset_login/'); ?>js/sweetalert.js"></script>