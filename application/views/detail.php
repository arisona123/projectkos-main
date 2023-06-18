<section class="content">
    <div class="container-fluid">
        <div class="bcca-breadcrumb">
            <div class="bcca-breadcrumb-item ">Detail Permintaan Pemilik<i class="fa fa-pencil"></i></div>
            <div class="bcca-breadcrumb-item">Permintaan Pemilik</div>
            <div class="bcca-breadcrumb-item">Home</div>
        </div>
        <h2 class="animate__animated animate__bounceInDown text-success"><?= $title ?> </h2>
        <div class="content-wrapper shadow-lg p-3 mb-5 bg-body rounded animate__animated animate__zoomIn">

            <table class="table">

                <tr>
                    <th>Nama Depan</th>
                    <td><?php echo $detail->nama_depan ?></td>
                </tr>
                <tr>
                    <th>Nama Belakang</th>
                    <td><?php echo $detail->nama_belakang ?></td>
                </tr>
                <tr>
                    <th>Info Hubungin</th>
                    <td><?php echo $detail->info_hub ?></td>
                </tr>
                <tr>
                    <th>No HP</th>
                    <td><?php echo $detail->no_hp ?></td>
                </tr>
                <tr>
                    <th>Tipe Kos</th>
                    <td><?php echo $detail->tipe_kos ?></td>
                </tr>
                <tr>
                    <th>Nama Properti</th>
                    <td><?php echo $detail->nama_properti ?></td>
                </tr>
                <tr>
                    <th>URL Properti</th>
                    <td><?php echo $detail->url_properti ?></td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td><?php echo $detail->harga ?></td>
                </tr>
                <tr>
                    <th>Provinsi</th>
                    <td><?php echo $detail->provinsi ?></td>
                </tr>
                <tr>
                    <th>Kabupaten/Kota</th>
                    <td><?php echo $detail->kabupaten_kota ?></td>
                </tr>
                <tr>
                    <th>Kecamatan</th>
                    <td><?php echo $detail->kecamatan ?></td>
                </tr>
                <tr>
                    <th>Kelurahan</th>
                    <td><?php echo $detail->kelurahan ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?php echo $detail->alamat ?></td>
                </tr>
                <tr>
                    <th>Jumlah Kamar</th>
                    <td><?php echo $detail->jumlah_kamar ?></td>
                </tr>
            </table>
            <a href="<?php echo base_url('admin/request_owner'); ?>" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</section>