<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="col-lg-12">
            <div class="col-md-12">
                <div class="header mb-3">
                    <div class="bcca-breadcrumb">
                        <div class="bcca-breadcrumb-item ">Konfirmasi Pembayaran<i class="fa fa-pencil"></i></div>
                        <div class="bcca-breadcrumb-item">Data Sewa</div>
                        <div class="bcca-breadcrumb-item">Home</div>
                    </div>
                    <h1 class="animate__animated animate__bounceInDown text-success"><?= $title; ?></h1>
                </div>
                <div class="card-body shadow-lg p-3 mb-5 bg-body rounded animate__animated animate__zoomIn">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <form id="confirm" action="<?= base_url('owner/dl_pembayaran') ?>" method="POST">

                        <div class="row">
                            <div class="col">
                                <img src="<?= base_url('owner/download_pembayaran/' . $pembayaran['id_booking']); ?>" alt="..." class="img-thumbnail">
                                <a href="<?= base_url('owner/download_pembayaran/' . $pembayaran['id_booking']); ?>" class="btn btn-primary btn-sm"><i class="fas fa-download"> Download bukti pembayaran</i> </a>
                            </div>
                            <div class="col">
                                <strong>Harga yang harus dibayarkan :</strong>
                                <h3>Rp.<?= number_format($pembayaran['harga'] * $pembayaran['kategori'], 0, ',', '.'); ?></h3>
                                <div class="custom-control custom-switch m-2">
                                    <input type="hidden" name="id_booking" value="<?= $pembayaran['id_booking'] ?>">
                                    <input type="hidden" name="id_kos" value="<?= $pembayaran['id_kos'] ?>">
                                    <input type="hidden" name="sisa_kamar" value="<?= $pembayaran['sisa_kamar'] - 1 ?>">
                                </div>
                                <div class="data" data-data="Data transaksi akan di tolak" data-confirm="Data transaksi akan dikonfirmasi"></div>
                                <button type="button" class="btn btn-success btn-sm konfirmasi">Konfirmasi</button>
                                <a href="<?= base_url('owner/batal_transaksi/') . $pembayaran['id_booking'] ?> " class="btn btn-danger btn-sm hapus">Tolak</a>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</section>