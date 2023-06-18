<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SevenKos | Login Page</title>
    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>asset_login/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>asset_login/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-success">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h2 text-gray-900 mb-4">Reset Password Akun</h1>
                                    </div>
                                    <?php echo $this->session->flashdata('notif'); ?>
                                    <?php
                                    if ($this->session->flashdata('form_error')) {
                                        echo "<div class='alert alert-warning' role='alert'>";
                                        foreach ($this->session->flashdata('form_error') as $value) {
                                            echo '• ' . $value . '<br>';
                                        }
                                        echo "</div>";
                                    }
                                    ?>
                                    <?php if ($form == TRUE) { ?>
                                        <form class="user" name="formreset" method="POST" action="<?php echo base_url() ?>Login/post_reset_pass">
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" name="password" placeholder="Password Baru" value="<?= set_value('password'); ?>" required>
                                                <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" name="konfir_password" placeholder="Konfirmasi Password Baru" value="<?= set_value('konfir_password'); ?>" required>
                                                <?php echo form_error('konfir_password', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <input type="submit" value="Ubah Password" class="btn btn-primary btn-user btn-block btn-submit">
                                            </div>
                                        </form>
                                    <?php } else {; ?>
                                        <a href="<?= base_url('login'); ?>" class="btn btn-primary btn-user btn-block">Lanjutkan</a>
                                    <?php }; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>asset_login/vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>asset_login/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>asset_login/js/sb-admin-2.min.js"></script>
    <script src="<?= base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/fontawesome/all.min.js"></script>

</body>

</html>