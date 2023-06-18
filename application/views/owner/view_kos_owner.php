<div class="container-fluid">
    <!-- DATA KOS -->
    <div class="row clearfix ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="header">
                <h2 class="animate__animated animate__bounceInDown text-success"><?= $title ?></h2>
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                <?php if ($this->session->flashdata('message')) : ?>
                <?php endif; ?>
                <div class="row">
                    <div class="col">
                        <div class="mt-0">
                            <?php if ($user['id_role'] == 3) : ?>
                                <?php if (empty($request['is_active']) || $request['is_active'] == 0) { ?>
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="top" title="Anda blum bisa menambah data kos">
                                        <a href="<?php echo base_url() ?>owner/tambah_kos" class="btn btn-primary  disabled" role="button"><i class="fas fa-house-user"> Tambah Kos </i></a>
                                    </span>
                                <?php } else { ?>
                                    <a href="<?php echo base_url() ?>owner/tambah_kos" class="btn btn-primary " role="button" data-toggle="tooltip" data-placement="top" title="Tambah data kos"><i class="fas fa-house-user"> Tambah Kos </i></a>
                                <?php } ?>
                                <?php if ($user['id_role'] == 3) : ?>
                                    <?php if (empty($request)) : ?>
                                        <a href="<?php echo base_url() ?>owner/request_owner" class="btn btn-warning" role="button" data-toggle="tooltip" data-placement="top" title="Request pemilik"><i class="fas fa-registered"> Request Pemilik </i></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <br>
                                <?= (empty($request['id_user_request'])) ? '<small class="text-danger">Anda harus melakuakn request pemilik terlebih dahulu!!</small>' : ''; ?>
                                <?php if (!empty($request)) : ?>
                                    <?= ($request['is_active'] == 0) ? '<div><small class="text-warning">Menunggu request pemilik di <b>aktivasi!!</b></small></div>' : ''; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body mt-3 animate__animated animate__zoomIn ">
                <div class="table-responsive shadow-lg p-3 mb-5 bg-body rounded ">
                    <table id="dtable" class="table table-striped table-bordered table-hover table-sm ">
                        <thead class="table-success">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Gambar</th>
                                <th>Tipe</th>
                                <th>Harga/bulan</th>
                                <th>Terakhir diubah</th>
                                <th>Oleh</th>
                                <th>Sisa Kamar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <?php if (empty($kos)) : ?>
                            <div class="alert alert-danger" role="alert">
                                Data Kost Tidak Ditemukan!
                            </div>
                        <?php endif; ?>
                        <tbody>
                            <?php $no = 0;
                            foreach ($kos as $k) { ?>
                                <tr>
                                    <td><?php echo ++$no ?></td>
                                    <td><a href="<?= base_url(); ?>detail/<?= $k->slug ?>" target="_blank"><?php echo $k->nama; ?></a></td>
                                    <td><img width="100px" src="<?php echo base_url() ?>file/kos_image/<?= $k->image_header; ?>"></td>
                                    <td><?php echo $k->tipe; ?></td>
                                    <td>Rp. <?= number_format($k->harga, 0, ',', '.') ?></td>
                                    <td><?php echo $k->date; ?></td>
                                    <td><?php echo $k->email; ?></td>
                                    <td><?php echo $k->sisa_kamar; ?></td>
                                    <td><?php
                                        if ($k->sisa_kamar == '0') {
                                            echo '<span class="badge badge-warning text-white">Tidak Tersedia</span>';
                                        } else {
                                            echo '<span class="badge badge-success">Tersedia</span>';
                                        } ?></td>
                                    <td>
                                        <a href="<?php echo base_url('owner/tambah_tempat/' . $k->id_kos) ?>">
                                            <button type="button" class="btn mb-1 btn-success btn-block btn-sm" data-toggle="tooltip" data-placement="left" title="Tambah tempat terdekat"><i class="fas fa-map-marked-alt"></i></button>
                                        </a>
                                        <a href="<?php echo base_url('owner/edit_kos_admin/' . $k->id_kos) ?>">
                                            <button type="button" class="btn mb-1 btn-info btn-block waves-effect btn-sm mt-8" data-toggle="tooltip" data-placement="left" title="Edit data kos"><i class="fas fa-edit"></i></button>
                                        </a>
                                        <div class="data" data-data="Data Kos akan dihapus!"></div>
                                        <a class="btn btn-danger btn-block  btn-sm hapus" href="<?php echo base_url('owner/hapus_kos_admin/' . $k->id_kos) ?>" data-toggle="tooltip" data-placement="left" title="Hapus data kos">
                                            <i class="fas fa-trash-alt "></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- END DATA KOS-->
            </div>
        </div>
    </div>
</div>
</section>