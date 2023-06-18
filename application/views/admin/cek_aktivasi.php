<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="col-lg-12">
            <div class="col-md-12">
                <div class="header mb-3">
                    <div class="bcca-breadcrumb">
                        <div class="bcca-breadcrumb-item ">Cek Aktivasi<i class="fa fa-pencil"></i></div>
                        <div class="bcca-breadcrumb-item">Permintaan Pemilik</div>
                        <div class="bcca-breadcrumb-item">Home</div>
                    </div>
                    <h2 class="animate__animated animate__bounceInDown text-success"><?= $title; ?></h2>
                </div>
                <div class="body animate__animated animate__zoomIn">
                    <div class="shadow-lg p-3 mb-5 bg-body rounded">
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                        <form id="confirm" action="<?= base_url('admin/proses_aktivasi') ?>" method="POST">
                            <?php foreach ($request as $pmb) : ?>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-switch m-2">
                                            <input type="hidden" name="id_request" value="<?= $pmb->id_request ?>">
                                        </div>
                                        <div class="data" data-data="Data aktivasi akan di tolak" data-confirm="Data request akan diaktivasi"></div>
                                        <button type="button" class="btn btn-success btn-sm konfirmasi">Aktivasi</button>
                                        <a href="<?= base_url('admin/hapus_request/') . $pmb->id_request ?> " class="btn btn-danger btn-sm hapus">Tolak</a>
                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                            <?php endforeach ?>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>