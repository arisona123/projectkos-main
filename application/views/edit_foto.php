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


<body>
    <?php foreach ($user as $u) { ?>
        <div class="container container-profile">

            <form id="form_edit_user" method="POST" class="form-horizontal" action="<?php echo site_url('Main_Back_User/proses_foto') ?>" enctype="multipart/form-data">
                <div class="card-profile">
                    <div style="text-align:center;">
                        <div class="row">
                            <input type="hidden" id="id_user" value="<?php echo $u->id_user ?>" name="id_user" required="required">
                            <!-- picture -->
                            <div class="row clearfix">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img id="preview" src="<?= base_url('assets/images/profile/') . $u->foto ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="mb-3">
                                                <label for="foto" class="form-label">Pilih Gambar </label>
                                                <input type="file" class="form-control" name="foto" id="foto" value="<?php $u->foto ?>" accept="image/*" required>
                                                <?php echo form_error('foto', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end picture -->
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

<script src="../../asset/js/jquery.min.js"></script>
<script src="../../asset/js/jquery-migrate-3.0.1.min.js"></script>
<script src="../../asset/js/jquery.easing.1.3.js"></script>

<script>
    function imagePreview(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function(event) {
                $('#preview').attr('src', event.target.result);
            };
            fileReader.readAsDataURL(fileInput.files[0]);
        }
    }

    $("#foto").change(function() {
        imagePreview(this);
    });
</script>