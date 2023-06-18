<!DOCTYPE html>
<html>

<head>
    <style>
        th {
            max-width: 10px;
            min-width: 5px;
        }

        td {
            max-width: 120px;
            min-width: 10px;
        }
    </style>
</head>

<body>
    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <!-- <div class="header"> -->
                        <h2>
                            Detail Request
                        </h2>
                    </div>
                    <div class="card">
                        <div class="header">
                            <table class="table">
                                <?php foreach ($request as $detail) { ?>
                                    <tr>
                                        <th>Nama Depan</th>
                                        <td>:</td>
                                        <td><?php echo $detail->nama_depan ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Belakang</th>
                                        <td>:</td>
                                        <td><?php echo $detail->nama_belakang ?></td>
                                    </tr>
                                    <tr>
                                        <th>Info Hubungin</th>
                                        <td>:</td>
                                        <td><?php echo $detail->info_hub ?></td>
                                    </tr>
                                    <tr>
                                        <th>No HP</th>
                                        <td>:</td>
                                        <td><?php echo $detail->no_hp ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tipe Kos</th>
                                        <td>:</td>
                                        <td><?php echo $detail->tipe_kos ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Properti</th>
                                        <td>:</td>
                                        <td><?php echo $detail->nama_properti ?></td>
                                    </tr>
                                    <tr>
                                        <th>URL Properti</th>
                                        <td>:</td>
                                        <td><?php echo $detail->url_properti ?></td>
                                    </tr>
                                    <tr>
                                        <th>Harga</th>
                                        <td>:</td>
                                        <td><?php echo $detail->harga ?></td>
                                    </tr>
                                    <tr>
                                        <th>Provinsi</th>
                                        <td>:</td>
                                        <td><?php echo $detail->provinsi ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kabupaten/Kota</th>
                                        <td>:</td>
                                        <td><?php echo $detail->kabupaten_kota ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kecamatan</th>
                                        <td>:</td>
                                        <td><?php echo $detail->kecamatan ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kelurahan</th>
                                        <td>:</td>
                                        <td><?php echo $detail->kelurahan ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>:</td>
                                        <td><?php echo $detail->alamat ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Kamar</th>
                                        <td>:</td>
                                        <td><?php echo $detail->jumlah_kamar ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                            <a href="<?php echo base_url('Main_back_owner/view_request'); ?>" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>
</body>

</html>