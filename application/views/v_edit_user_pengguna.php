<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
    <?= $title ?>
  </title>
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
  <?php foreach ($user as $u) { ?>
    <div class="container container-profile">

      <form method="POST" id="form_edit_user" class="form-horizontal " action="<?php echo site_url('Main_Back_User/proses_update_user') ?>">
        <div class="card-profile">
          <div style="text-align:center;">
            <div class="row">
              <input type="hidden" id="id_user" value="<?php echo $u->id_user ?>" name="id_user" required="required">
              <input type="hidden" id="email" value="<?php echo $u->email ?>" name="email" required="required">
              <br><br>
              <div class="col-md-6" style="float:none;margin:auto">
                <div class="content-profile">
                  <h4>Username :</h4>
                  <input type="text" name="username" id="username" value="<?php echo $u->username ?>" required>
                </div>

                <div class="content-profile">
                  <h4>Nama :</h4>
                  <input type="text" name="fullname" id="fullname" value="<?php echo $u->fullname ?>" required>
                </div>

                <div class="content-profile">
                  <h4>Email :</h4>
                  <input type="text" name="email" id="email" value="<?php echo $u->email ?>" required>
                </div>

                <div class="content-profile">
                  <h4>Telepon :</h4>
                  <input type="text" name="no_hp" id="no_hp" value="<?php echo $u->no_hp ?>" required>
                </div>

                <!-- <div class="content-profile">
                <h4>Password :</h4>
                <input type="password" id="password" name="password" required>
              </div> -->

                <div class=" content-profile">
                  <h4>Jenis Kelamin :</h4>
                  <?php if ($u->jk == "Pria") : ?>
                    <select name="jk">
                      <option value="<?= $u->jk ?>">
                        <?= $u->jk ?>
                      </option>
                      <option value="Wanita">Wanita</option>
                    </select>
                  <?php else : ?>
                    <select name="jk">
                      <option value="<?= $u->jk ?>">
                        <?= $u->jk ?>
                      </option>
                      <option value="Pria"> Pria</option>
                    </select>
                  <?php endif ?>
                </div>

                <div class="content-profile">
                  <h4>Alamat :</h4>
                  <input type="text" name="alamat" id="alamat" value="<?php echo $u->alamat ?>" required>
                </div>
              </div>
            </div>
            <input type="hidden" name="id_role" id="id_role" class="form-control" value="<?php echo $u->id_role ?>" required>

            <br>

            <div style="text-align:center; width:100%;">
              <button type="submit" value="Submit" class="btn btn-success btn-rounded btn-lg">Ubah</button>
              <button type="button" class="btn btn-danger btn-rounded btn-lg" onclick="location.href='<?php echo base_url('profil/' . $this->session->userdata('id_user')) ?>'">Batal</button>
            </div>
            <br>
      </form>
    </div>
  <?php } ?>
</body>

</html>
<br><br>

<script src="<?= base_url(); ?>assets/plugins/fontawesome/all.min.js"></script>
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