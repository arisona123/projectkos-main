<section class="content">
    <div class="container-fluid">
        <!-- DATA KOS -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="header col-mb-4">

                    <h2 class="col-mb-4 animate__animated animate__bounceInDown text-success ">
                        <?= $title ?> </h2>
                </div>
                <div class="body animate__animated animate__zoomIn">
                    <?php if (empty($owner)) : ?>
                        <div class="alert alert-danger" role="alert">
                            Data Request Tidak Ditemukan!
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive-sm shadow-lg p-3 mb-5 bg-body rounded">
                        <table id="dtable" class="table table-striped table-hover table-sm ">
                            <thead class="table-success">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Depan</th>
                                    <th>Nama Belakang</th>
                                    <th>Info Hubungin Kemana</th>
                                    <th>No HP</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($owner as $rqst) : ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $rqst['nama_depan'] ?></td>
                                        <td><?php echo $rqst['nama_belakang'] ?></td>
                                        <td><?php echo $rqst['info_hub'] ?></td>
                                        <td><?php echo $rqst['no_hp'] ?></td>
                                        <div class="data" data-data="Data request akan dihapus!!"></div>
                                        <td class="text-center">
                                            <?php if ($rqst['is_active'] == 0) {
                                                echo '<span class="badge badge-warning text-white">Blum diaktifasi</span>';
                                            } else {
                                                echo '<span class="badge badge-success">Sudah diaktifasi</span>';
                                            } ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($rqst['is_active'] == 0) { ?>
                                                <a href="<?= base_url('admin/cek_avtivasi/' . $rqst['id_request']) ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Akun blum di aktivasi"><i class="fas fa-user-times"></i></a>
                                            <?php } else { ?>

                                                <!-- <a href="<?= base_url('admin/cek_avtivasi/' . $rqst['id_request']) ?>" class="btn btn-primary btn-sm disabled" data-toggle="tooltip" data-placement="left" title="Akun blum di aktivasi"><i class="fas fa-user-times"></i></a> -->
                                            <?php } ?>
                                            <?php echo anchor('admin/request_detail/' . $rqst['id_request'], '<div class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="left" title="Lihat detail request"><i class="fas fa-info-circle"></i></div>') ?>
                                            <a href="<?= base_url('admin/hapus_request/') . $rqst['id_request'] ?> " data-toggle="tooltip" data-placement="left" title="Hapus data request" class="btn btn-danger btn-sm hapus"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA KOS-->
                </div>
            </div>
        </div>
    </div>
</section>