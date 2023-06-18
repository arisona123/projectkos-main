<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="bcca-breadcrumb">
                    <div class="bcca-breadcrumb-item ">Tambah tempat terdekat<i class="fa fa-pencil"></i></div>
                    <div class="bcca-breadcrumb-item">Data Kss</div>
                    <div class="bcca-breadcrumb-item">Home</div>
                </div>
                <h1 class="animate__animated animate__bounceInDown text-success">
                    <?= $nama ?>
                </h1>
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

                <div class="col-md-12">
                    <div id="notif"></div>
                </div>
                <div class="shadow-lg p-3 mb-5 bg-body rounded animate__animated animate__zoomIn">
                    <form action="<?php echo base_url('owner/post_tempat') ?>" method="post">
                        <input type="text" name="id_kos" value="<?= $id_kos ?>" hidden>
                        <div class="box-body ">
                            <br>
                            <table class="table table-borderless">

                                <thead>
                                    <tr>
                                        <th>Pilih tempat</th>
                                        <th>Masukan Nama Tempat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>
                                        <select class="form-control kategoriTempat" name="kategoriTempat" data-placeholder="Kategori Tempat" required>;
                                            <option value="MASJID">MASJID</option>
                                            <option value="RUMAH MAKAN">RUMAH MAKAN</option>
                                            <option value="ATM">ATM</option>
                                            <option value="UNIVERSITAS">UNIVERSITAS</option>
                                            <option value="RUMAH SAKIT">RUMAH SAKIT</option>
                                            <option value="TEMPAT BELANJA">TEMPAT BELANJA</option>
                                            <option value="STASIUN KERETA">STASIUN KERETA</option>
                                            <option value="BANDARA">BANDARA</option>
                                            <option value="TERMINAL BUS">TERMINAL BUS</option>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <input type="text" class="form-control namaTempat" name="namaTempat" placeholder="Masukan Nama tempat" required>
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right mb-3">
                            <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Submit">
                            <a href="<?php echo base_url('owner') ?>">
                                <button type="button" class="btn btn-danger m-t-15 ">Cancel</button>
                            </a>
                        </div>
                    </form>
                </div>

                <div class="table-responsive shadow-lg p-3 mb-5 bg-body rounded animate__animated animate__zoomIn">
                    <table id="dtable" class="table table-bordered table-striped table-hover table-sm">

                        <thead class="table-success">
                            <tr>
                                <th>No</th>
                                <th hidden>id_kos</th>
                                <th>Kategori Tempat</th>
                                <th>Nama Tempat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 0;
                            foreach ($tempat as $k) { ?>
                                <tr>
                                    <td><?= ++$no; ?></td>
                                    <td hidden><?= $k['kos_id']; ?></td>
                                    <td><?= $k['kategoriTempat']; ?></td>
                                    <td><?= $k['namaTempat']; ?></td>

                                    <td class="text-center">
                                        <div class="data" data-data="Data tempat akan dihapus!"></div>
                                        <a class="btn btn-danger  hapus" href="<?php echo base_url('owner/hapus_tempat_terdekat/' . $k['id_tempat'] . '/' . $id_kos) ?>" data-toggle="tooltip" data-placement="left" title="Hapus data tempat">
                                            <i class="fas fa-trash-alt "></i>
                                        </a>

                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- End Example Code -->
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>

</script>