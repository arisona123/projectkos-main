<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?= $title ?>
    </title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>asset/css/profile.css" />

</head>

<div class="flash-data-pass" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<p><?= $this->session->flashdata('message'); ?></p>

<body>
    <?php foreach ($user as $u) { ?>
        <div class="container container-profile">

            <form id="form_edit_user" method="POST" class="form-horizontal" action="<?php echo site_url('Main_Back_User/edit_password') ?>">
                <div class="card-profile">
                    <div style="text-align:center;">
                        <div class="row">
                            <div class="col-md-6" style="float:none;margin:auto">
                                <input type="hidden" id="id_user" value="<?php echo $u->id_user ?>" name="id_user" required="required">
                                <div class="col-md-6" style="float:none;margin:auto">
                                    <div class="content-profile">
                                        <h4>Password Saat ini :</h4>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="current_password" id="current_password" class="form-control">
                                                <?php echo form_error('current_password', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="content-profile">
                                        <h4>Password baru :</h4>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="new_password" id="new_password" class="form-control">
                                                <?php echo form_error('new_password', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="content-profile">
                                        <h4>Ulangi Password baru :</h4>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="new_password_confirm" id="new_password_confrim" class="form-control">
                                                <?php echo form_error('new_password_confirm', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div style="text-align:center; width:100%;">
                                        <button type="submit" value="Submit" class="btn btn-success btn-rounded btn-lg">Ubah</button>
                                        <button type="button" class="btn btn-danger btn-rounded btn-lg" onclick="location.href='<?php echo base_url('profil/' . $this->session->userdata('id_user')) ?>'">Batal</button>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php } ?>
</body>

</html>