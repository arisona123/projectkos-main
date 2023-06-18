<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header">
                    <div class="bcca-breadcrumb">
                        <div class="bcca-breadcrumb-item ">Ubah Password<i class="fa fa-pencil"></i></div>
                        <div class="bcca-breadcrumb-item">Profil Saya</div>
                        <div class="bcca-breadcrumb-item">Home</div>
                    </div>
                    <h2 class="animate__animated animate__bounceInDown text-success"><?= $title ?></h2>
                    <div class="flash-data-pass" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                </div>
                <div class="body animate__animated animate__zoomIn">
                    <div class="shadow-lg p-3 mb-5 bg-body rounded">
                        <!-- Horizontal Layout -->
                        <form id="form_edit_user" method="POST" class="form-horizontal" action="<?php echo site_url('User/ubah_password') ?>">
                            <input type="hidden" name="id_user" value="<?php echo $user['id_user'] ?>">

                            <!-- current password -->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="current_password">Password saat ini</label>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" name="current_password" id="current_password" class="form-control">
                                            <?php echo form_error('current_password', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END current password -->

                            <!-- new password -->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="new_password">Password Baru</label>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" name="new_password" id="new_password" class="form-control">
                                            <?php echo form_error('new_password', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END new password -->

                            <!-- new password -->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="new_password_confirm"> Ulangi Password</label>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" name="new_password_confirm" id="new_password_confrim" class="form-control">
                                            <?php echo form_error('new_password_confirm', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END new password -->

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