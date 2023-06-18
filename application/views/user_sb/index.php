<link href="<?php echo base_url() ?>asset/css/profile.css" rel="stylesheet">
<!-- Begin Page Content -->
<div class="container-fluid ">

    <!-- Page Heading -->
    <div class="body">
        <h2 class="animate__animated animate__bounceInDown text-success"><?= $title ?></h2>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

        <div class="card shadow-lg p-3 mb-5 bg-body rounded animate__animated animate__zoomIn">
            <div class="row clearfix">
                <div class="col-sm-3 ml-auto">
                    <div class="form-group">
                        <article class="listing">
                            <div class="ms-4">    
                                <a class="title" href="<?= base_url() ?>User/view_ubah_foto/<?= $user['id_user'] ?>">
                                    <button type="button" class="btn btn-outline-light btn-sm ">
                                    <i class="fas fa-images"> Ubah Foto</i></button>
                                </a>
                            </div>
                            <div class="image-user image">
                                <img src="<?php echo base_url() ?>assets/images/profile/<?= $user['foto'] ?>" class="image-fluid figure-img image-user m-auto" alt="User" />
                            </div>
                        </article>
                    </div>
                </div>

                <div class="col-sm-8 mt-3">
                    <form class="form-horizontal formm">

                        <div class="row clearfix">
                            <div class="col-lg-3 ml-4 form-control-label">
                                <label for="email_address_2">Nama Lengkap</label>
                            </div>
                            <div class="col-lg-7 ml-4 mb-3">
                                <input type="text" value="<?= $user['fullname'] ?>" class="form-control" placeholder="Disabled" disabled />
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-3 ml-4  form-control-label">
                                <label for="email_address_2">Jenis Kelamin</label>
                            </div>
                            <div class="col-lg-7 ml-4 mb-3 ">
                                <input type="text" value="<?= $user['jk'] ?>" class="form-control" placeholder="Disabled" disabled />
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-3 ml-4 form-control-label">
                                <label for="email_address_2">Email</label>
                            </div>
                            <div class="col-lg-7 ml-4 mb-3 ">
                                <input type="text" value="<?= $user['email'] ?>" class="form-control" placeholder="Disabled" disabled />
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-3 ml-4 form-control-label">
                                <label for="email_address_2">Password</label>
                            </div>
                            <div class="col-lg-7 ml-4 mb-3 ">
                                <input type="password" value="<?= $user['password'] ?>" class="form-control" placeholder="Disabled" disabled />
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-3 ml-4 form-control-label">
                                <label for="email_address_2">No.Hp</label>
                            </div>
                            <div class="col-lg-7 ml-4 mb-3 ">
                                <input type="text" value="<?= $user['no_hp'] ?>" class="form-control" placeholder="Disabled" disabled />
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-3 ml-4 form-control-label">
                                <label for="email_address_2">Alamat</label>
                            </div>
                            <div class="col-lg-7 ml-4 mb-3 ">
                                <input type="text" value="<?= $user['alamat'] ?>" class="form-control" placeholder="Disabled" disabled />
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-3  form-control-label"></div>
                            <div class="col-lg-7 ml-5 mb-3 ">
                                <a href="<?= base_url() ?>User/edit_profil/<?= $user['id_user'] ?>">
                                    <button type="button" class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"> Ubah Profil</i></button>
                                </a>
                                <a href="<?= base_url() ?>User/ubah_password/<?= $user['id_user'] ?>">
                                    <button type="button" class="btn btn-info btn-sm">
                                        <i class="fas fa-key"> Ubah Password</i></button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>