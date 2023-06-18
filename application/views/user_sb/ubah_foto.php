<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header">
                    <div class="bcca-breadcrumb">
                        <div class="bcca-breadcrumb-item ">Ubah Foto Profil<i class="fa fa-pencil"></i></div>
                        <div class="bcca-breadcrumb-item">Profil Saya</div>
                        <div class="bcca-breadcrumb-item">Home</div>
                    </div>
                    <h2 class="animate__animated animate__bounceInDown text-success"><?= $title ?></h2>
                </div>
                <div class="body animate__animated animate__zoomIn">
                    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                        <!-- Horizontal Layout -->
                        <form id="form_edit_user" method="POST" class="form-horizontal" action="<?php echo site_url('User/ubah_foto') ?>" enctype="multipart/form-data">
                            <input type="hidden" name="id_user" value="<?php echo $user['id_user'] ?>">
                            <!-- picture -->
                            <div class="row clearfix">
                                <div class="col-sm-2">Foto Profil</div>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img id="preview" src="<?= base_url('assets/images/profile/') . $user['foto'] ?>" class="img-thumbnail image-user ">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="mb-3">
                                                <label for="foto" class="form-label">Pilih Gambar </label>
                                                <input type="file" class="form-control" name="foto" id="foto" value="<?php $user['foto'] ?>" accept="image/*" required>
                                                <?php echo form_error('foto', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end picture -->

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=-33.8670522,151.1957362&radius=1500&type=restaurant&keyword=cruise&key=AIzaSyAN2SQVsf1uQRtKyIcNRXCxjriavGkL9ow"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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