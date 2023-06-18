<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<!-- Custom Css -->
<link href="<?php echo base_url() ?>asset_login/css/hover.css" rel="stylesheet">
<style>
    body {
        background: rgb(251, 251, 251);
        font-family: "muli";
        color: rgba(74, 74, 74, 0.8);
    }
</style>
<div class=" m-3 text-center">
    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="body">
                        <div class="row clearfix  animate__delay-2s">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 animate__animated animate__bounceInDown ">
                                <div class="info-box hover-zoom-effect shadow-lg bg-body rounded">
                                    <div class="icon bg-gradient-success">
                                        <i class="fas fa-house-user"></i>
                                    </div>
                                    <div class="content ">
                                        <div class="text ml-4"><strong>JUMLAH KOS</strong></div>
                                        <div class="number"><?= $jumlahkos ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 animate__animated animate__bounceInDown animate__delay-1s">
                                <div class="info-box hover-zoom-effect shadow-lg bg-body rounded">
                                    <div class="icon bg-gradient-success">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="content ">
                                        <div class="text ml-4"><strong>JUMLAH USER</strong></div>
                                        <div class="number"><?= $jumlahuser ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 animate__animated animate__bounceInDown animate__delay-2s">
                                <div class="info-box hover-zoom-effect shadow-lg bg-body rounded">
                                    <div class="icon bg-gradient-success">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                    <div class="content ">
                                        <div class="text ml-4"><strong>JUMLAH SEWA</strong></div>
                                        <div class="number"><?= $jumlahsewa ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 animate__animated animate__bounceInDown animate__delay-3s">
                                <div class="info-box hover-zoom-effect shadow-lg bg-body rounded">
                                    <div class="icon bg-gradient-success">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                    <div class="content ">
                                        <div class="text ml-4"><strong>JUMLAH REQUEST</strong></div>
                                        <div class="number"><?= $jumlahrequest ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if ($user['id_role'] == 1) {
                            $role = 'Admin';
                        } elseif ($user['id_role'] == 2) {
                            $role = 'User';
                        } elseif ($user['id_role'] == 3) {
                            $role = 'Owner';
                        } else {
                            $role = 'Super Admin';
                        } ?>
                        <div class="alert alert-success">
                            <strong>HALLO !</strong> <?php echo strtoupper($user['fullname']) ?>, Anda login sebagai <b><?= $role ?></b>.
                        </div>
                    </div>
                </div>
                <!-- #END# Basic Examples -->
            </div>
    </section>
</div>
</div>