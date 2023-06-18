<div class="container-fluid">
    <!-- DATA KOS -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="header">
                <h1>
                    <?= $title ?>
                </h1>
                <div class="row">
                    <div class="col">
                        <div class="mt-5">
                            <a href="<?php echo base_url() ?>owner/tambah_kos">
                                <button type="button" class="btn btn-primary" title="tambah data Kos">
                                    <i class="fas fa-house-user"> Tambah Kos </i></button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" body">
                <div class="row">
                    <div class="col">
                        <div class="col-md-4 offset-md-8">
                            <form action="" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control " placeholder="Cari data Kos" name="keyword" autocomplete="off">
                                    <button class="btn btn-outline-primary" type="submit" name="submit"><i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <h5 class="text-left mx-">Result : <?= $total_rows ?></h5>
                <div class="table-responsive-sm">
                    <table class="table table-striped table-bordered table-hover table-sm">
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
                            <?php foreach ($kos as $k) { ?>
                                <tr>
                                    <td><?php echo ++$start ?></td>
                                    <td><a href="<?= base_url(); ?>Dashboard_Admin/view_konten_kos/<?= $k->slug ?>"><?php echo $k->nama; ?></a></td>
                                    <td><img width="100px" src="<?php echo base_url() ?>file/kos_image/<?= $k->image_header; ?>"></td>
                                    <td><?php echo $k->tipe; ?></td>
                                    <td>Rp. <?= number_format($k->harga, 0, ',', '.') ?></td>
                                    <td><?php echo $k->date; ?></td>
                                    <td><?php echo $k->email; ?></td>
                                    <td><?php echo $k->sisa_kamar; ?></td>
                                    <td><?php
                                        if ($k->status == '1') {
                                            echo 'Tersedia';
                                        } elseif ($k->status == '0') {
                                            echo 'Tidak tersedia';
                                        } ?></td>
                                    <td>
                                        <a href="<?php echo base_url('owner/tambah_tempat/' . $k->id_kos) ?>">
                                            <button type="button" class=" btn mb-1 btn-success btn-block waves-effect " title="Tambah tempat terdekat"><i class="fas fa-map-marked-alt"></i></button>
                                        </a>
                                        <a href="<?php echo base_url('owner/edit_kos_admin/' . $k->id_kos) ?>">
                                            <button type="button" class="btn mb-1 btn-info btn-block waves-effect mt-8" title="Edit data Kos"><i class="fas fa-edit"></i></button>
                                        </a>

                                        <a onclick="return confirm('Apa anda yakin akan menghapus data kos ini ?')" href="<?php echo base_url('owner/hapus_kos_admin/' . $k->id_kos) ?>">
                                            <button type="button" class="btn btn-danger btn-block " title="Hapus data admin"><i class="fas fa-trash-alt "></i></button>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?= $this->pagination->create_links(); ?>
                <!-- END DATA KOS-->
            </div>
        </div>
    </div>
</div>
</section>