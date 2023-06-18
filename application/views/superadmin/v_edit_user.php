<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="header">
                    <div class="bcca-breadcrumb">
                        <div class="bcca-breadcrumb-item ">Edit User<i class="fa fa-pencil"></i></div>
                        <div class="bcca-breadcrumb-item">Data Pengguna</div>
                        <div class="bcca-breadcrumb-item">Home</div>
                    </div>
                    <h2 class="animate__animated animate__bounceInDown text-success"><?= $title ?></h2>
                </div>
                <div class="body animate__animated animate__zoomIn">
                    <div class=" shadow-lg p-3 mb-5 bg-body rounded">
                        <!-- Horizontal Layout -->
                        <?php foreach ($admin as $u) { ?>
                            <form method="POST" id="form_edit_user" class="form-horizontal" action="<?php echo site_url('admin/proses_update_user') ?>">
                                <input type="hidden" name="id_user" value="<?php echo $u->id_user ?>">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nama">Username</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="username" id="username" class="form-control" value="<?php echo $u->username ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- FULLNAME -->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password">Nama Lengkap</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo $u->fullname ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END FULLNAME -->

                                <!-- JENIS KELAMIN -->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="jenis">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control show-tick" name="jk" required>
                                                <option value="Pria">Pria</option>
                                                <option value="Wanita">Wanita</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- END JENIS KELAMIN -->

                                <!-- EMAIL -->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Email">Email</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="email" id="email" class="form-control" value="<?php echo $u->email ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END EMAIL -->

                                <!-- NOHP -->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Email">No Hp</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="no_hp" id="no_hp" class="form-control" value="<?php echo $u->no_hp ?>" required>
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
                                                <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $u->alamat ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END ALAMAT -->

                                <!-- ID ROLE -->
                                <!-- <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="jenis">Role</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="id_role" value="<?php echo $u->id_role ?>">
                                            <option value="1">Admin</option>
                                            <option value="2">User</option>
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                                <!-- END ID ROLE -->
                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-10">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                            <button type="submit" class="btn btn-primary mt-3 btn-sm"> Ubah</button>
                                            <a href="<?php echo base_url('super_admin/data_admin') ?>">
                                                <button type="button" class="btn btn-danger mt-3 btn-sm">Batal</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>


                        <!-- #END# Horizontal Layout -->
                    </div>
                </div>

            </div>
        </div>
        <!-- #END# Basic Examples -->
    </div>
</section>