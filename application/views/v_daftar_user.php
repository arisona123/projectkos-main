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
    <link href="<?= base_url() ?>asset_login/css/sb-admin-2.css" rel="stylesheet">
</head>

<body class="bg-gradient-success">
    <div class="container">
        <div class="container">
            <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                <form class="user" id="sign_up" method="POST" action="<?php echo base_url() ?>daftar">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" placeholder="Username" name="username" value="<?php echo set_value('username'); ?>">
                                        <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="fullname" placeholder="Full name" name="fullname" value="<?php echo set_value('fullname'); ?>">
                                        <?php echo form_error('fullname', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" placeholder="Email Address" name="email" value="<?php echo set_value('email'); ?>">
                                        <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control form-control-user" name="jk">
                                            <option value="" hidden>Jenis Kelamin</option>
                                            <option value="1" <?= (set_value('jk') == '1') ? 'selected' : ''; ?>>Pria</option>
                                            <option value="2" <?= (set_value('jk') == '2') ? 'selected' : ''; ?>>Wanita</option>
                                        </select>
                                        <?php echo form_error('jk', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" id="password1" name="password" min_length="6" placeholder="Password">
                                            <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" id="password2" name="password_confirm" min_length="6" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="no_hp" name="no_hp" placeholder="Phone number" value="<?php echo set_value('no_hp'); ?>">
                                        <?php echo form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Address" value="<?php echo set_value('alamat'); ?>">
                                        <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control form-control-user" id="id_role" name="id_role">
                                            <option value="" hidden>Tipe Akun</option>
                                            <option value="2" <?= (set_value('id_role') == '2') ? 'selected' : ''; ?>>Customer</option>
                                            <option value="3" <?= (set_value('id_role') == '3') ? 'selected' : ''; ?>>Owner</option>
                                            <?php echo form_error('id_role', '<small class="text-danger">', '</small>'); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form-control form-control-user" id="foto" name="foto" hidden>
                                    </div>

                                    <button type="submit" class="btn btn-success btn-user btn-block" value="Sign up">
                                        Register Account
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small"><a href="<?php echo base_url() ?>login">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <!-- Bootstrap core JavaScript-->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/fontawesome/all.min.js"></script>
    </body>

</html>
<!-- <div class="inputBx">
    <span>Upload</span>
    <input type="text" class="form-control" name="profil" placeholder="Profil" required autofocus>
</div>
<div class="inputBx">
    <span>Upload Profil</span>
    <label for="image">Upload Gambar</label>
    <div class="form-group">
        <input type="file" name="foto" accept="image/png, image/gif, image/jpeg">
    </div>
</div> -->