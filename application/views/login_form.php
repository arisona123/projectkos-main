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
                                        <h1 class="h2 text-gray-900 mb-4">Sign in</h1>
                                    </div>
                                    <?php echo $this->session->flashdata('suksesdaftar'); ?>
                                    <?php echo $this->session->flashdata('notif'); ?>

                                    <?= form_open('Login/proses_login', array('id' => 'sign_in', 'class' => 'user')); ?>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="email" placeholder="Enter Email Address..." required>
                                        <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
                                        <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <input type="submit" value="Sign in" name="" class="btn btn-success btn-user btn-block">
                                    </div>
                                    <?= form_close(); ?>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#" data-toggle="modal" data-target="#forgotModal">Lupa Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url(); ?>daftar">Buat Akun!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hapus Modal-->
    <div class="modal fade" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lupa Password</h5>
                    <button class="close btn-cancel" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?= form_open('login/kirim_token_reset', array('id' => 'formreset')); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="mb-2"><b>Masukan Alamat Email Anda</b></label>
                        <input type="email" class="form-control" name="email" value="<?= set_value('email'); ?>" placeholder="username@email.com" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-cancel" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="submitresetpass" class="btn btn-success btn-submit">Submit</button>
                </div>
                <?= form_close(); ?>
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
    <script>
        $(document).ready(function() {
            $('#formreset').submit(function(e) {
                $('.btn-submit').attr('disabled', true);
                $('.btn-cancel').attr('disabled', true);
                $('.btn-submit').html('<i class="fa fa-spin fa-spinner"></i> Loading...');
            });
        });
    </script>

</body>

</html>