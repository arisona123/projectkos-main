<style>
    .image-user {
        background-position: 50%;
        background-size: cover;
        border-radius: 5%;
        height: 200px;
        margin-right: 1em;
        position: relative;
        top: 0;
        width: 200px;
    }
</style>

</html>
<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header">
                    <div class="bcca-breadcrumb">
                        <div class="bcca-breadcrumb-item ">Edit Profil<i class="fa fa-pencil"></i></div>
                        <div class="bcca-breadcrumb-item">Profil Saya</div>
                        <div class="bcca-breadcrumb-item">Home</div>
                    </div>
                    <h2 class="animate__animated animate__bounceInDown text-success"><?= $title ?></h2>
                </div>
                <div class="body">
                    <div class="card shadow-lg p-3 mb-5 bg-body rounded animate__animated animate__zoomIn">
                        <!-- Horizontal Layout -->

                        <form id="form_edit_user" method="POST" class="form-horizontal" action="<?php echo site_url('User/edit_profil') ?>" enctype="multipart/form-data">
                            <input type="hidden" name="id_user" value="<?php echo $user['id_user'] ?>">
                            <!-- EMAIL -->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Email">Email</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="email" id="email" class="form-control" value="<?php echo $user['email'] ?>">
                                            <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END EMAIL -->

                            <!-- FULLNAME -->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="password">Nama Lengkap</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo $user['fullname'] ?>">
                                            <?php echo form_error('fullname', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END FULLNAME -->

                            <!-- NOHP -->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Email">No Hp</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="no_hp" id="no_hp" class="form-control" value="<?php echo $user['no_hp'] ?>">
                                            <?php echo form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END NOHP -->

                            <!-- ALAMAT -->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="alamat">Alamat</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $user['alamat'] ?>">
                                            <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ALAMAT -->

                            <div class="form-group row justify-content-end">
                                <div class="col-sm-10">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary mt-3 btn-sm"> Ubah</button>
                                        <a href="<?= base_url('User') ?>">
                                            <button type="button" class="btn btn-danger mt-3 btn-sm">Batal</button>
                                        </a>
                                        <!-- <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Submit"> -->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->