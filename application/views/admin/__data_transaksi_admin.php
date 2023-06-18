<section class="content">
    <div class="container-fluid">
        <!-- DATA KOS -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="header mb-4">
                    <h1>Data Sewa</h1>
                </div>
                <div class="table-responsive-sm">
                    <table id="dtable" class="table table-striped table-hover table-sm ">
                        <thead class="table-success">
                            <tr>
                                <th>No</th>
                                <th>Penyewa</th>
                                <th>Kos yang disewa</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Lama </th>
                                <th>Tagihan</th>
                            </tr>
                        </thead>
                        <?php if (empty($transaksi)) : ?>
                            <div class="alert alert-danger" role="alert">
                                Data Sewa Tidak Ditemukan!
                            <?php endif; ?>

                            </div>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($transaksi as $tr) : ?>
                                    <tr>
                                        <td><?= ++$no ?></td>
                                        <td><?= $tr->fullname ?></td>
                                        <td><?= $tr->nama ?></td>
                                        <td><?= $tr->tgl_sewa ?></td>
                                        <td><?= $tr->tanggal_selesai ?>
                                        <td><?= $tr->tr_kategori; ?> Bulan</td>
                                        <td>Rp. <?= number_format($tr->harga * $tr->tr_kategori, 0, ',', '.') ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>