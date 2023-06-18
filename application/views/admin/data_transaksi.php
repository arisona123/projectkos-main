<section class="content">
    <div class="container-fluid">
        <!-- DATA KOS -->
        <div class="row clearfix ">
            <div class="col-lg-12   ">
                <div class="header mb-3">
                    <h2 class="animate__animated animate__bounceInDown text-success">Data Sewa</h2>
                </div>
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                <div class="body animate__animated animate__zoomIn">
                    <div class=" table-responsive-sm shadow-lg p-3 mb-5 bg-body rounded">
                        <table id="dtable" class="table table-striped table-hover table-sm ">
                            <thead class="table-success">
                                <tr>
                                    <th>No </th>
                                    <th>Penyewa </th>
                                    <th>Kos yang disewa </th>
                                    <th>Mulai </th>
                                    <th>Selesai </th>
                                    <th>Lama </th>
                                    <th>Tagihan </th>
                                    <th>Status </th>
                                    <th>Aksi </th>
                                </tr>
                            </thead>
                            <?php if (empty($transaksi)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    Data Sewa Tidak Ditemukan!
                                <?php endif; ?>
                                <!-- <?php var_dump($transaksi);
                                        ?> -->
                                </div>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($transaksi as $tr) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $tr['fullname'] ?></td>
                                            <td><?= $tr['nama'] ?></td>
                                            <td><?= $tr['tgl_sewa'] ?></td>
                                            <td><?= $tr['tanggal_selesai'] ?></td>
                                            <td><?= $tr['tr_kategori']; ?> Bulan</td>
                                            <td>Rp. <?= number_format($tr['harga'] * $tr['tr_kategori'], 0, ',', '.') ?></td>
                                            <td><?php if (empty($tr['bukti_pembayaran'])) {
                                                    echo '<span class="badge badge-warning text-white">Blum Bayar</span>';
                                                } else {
                                                    echo '<span class="badge badge-success">Sudah Bayar</span>';
                                                } ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="data" data-data="Data transaksi akan dihapus!"></div>
                                                <?php if ($user['id_role'] == '1') { ?>
                                                    <?php if (empty($tr['bukti_pembayaran'])) { ?>
                                                        <a href="<?= base_url('owner/cek_pembayaran/' . $tr['id_booking']) ?>" class="btn btn-primary btn-sm disabled" data-toggle="tooltip" data-placement="left" title="Konfirmasi pembayaran"><i class="fas fa-money-check-alt"></i></a>
                                                    <?php } else { ?>
                                                        <a href="<?= base_url('owner/cek_pembayaran/' . $tr['id_booking']) ?>" class="btn btn-primary btn-sm " data-toggle="tooltip" data-placement="left" title="Konfirmasi pembayaran"><i class="fas fa-money-check-alt"></i></a>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <div>-</div>
                                                <?php } ?>
                                                <a href="<?= base_url('owner/batal_transaksi/') . $tr['id_booking'] ?> " data-toggle="tooltip" data-placement="left" title="Hapus data transaksi" class="btn btn-danger btn-sm  hapus"><i class="fas fa-trash-alt"></i></a>

                                            </td>

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