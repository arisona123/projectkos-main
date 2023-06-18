<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix animate__animated animate__zoomIn">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header">
                    <div class="bcca-breadcrumb">
                        <div class="bcca-breadcrumb-item ">Edit Kos<i class="fa fa-pencil"></i></div>
                        <div class="bcca-breadcrumb-item">Data Kos</div>
                        <div class="bcca-breadcrumb-item">Home</div>
                    </div>
                    <h2 class="animate__animated animate__bounceInDown text-success">
                        <?= $title; ?>
                    </h2>
                </div>
                <div class="body animate__animated animate__zoomIn">
                    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                        <!-- Horizontal Layout -->
                        <?php
                        $items = json_decode(json_encode($kos[0]), true);
                        ?>

                        <form method="POST" class="form-horizontal" role="form" enctype="multipart/form-data" action="<?php echo site_url('owner/proses_update_kos') ?>">
                            <input type="hidden" name="id_kos" value="<?= $items['id_kos']; ?>" class="form-control">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="nama">Nama</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama" id="nama" value="<?= $items['nama']; ?>" class="form-control" placeholder="Masukan Nama Kosan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="jenis">Jenis Kos</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="tipe">
                                            <option value="Putra" <?= ($items['tipe'] == 'Putra') ? "selected" : ''; ?>>Putra</option>
                                            <option value="Putri" <?= ($items['tipe'] == 'Putri') ? "selected" : ''; ?>>Putri</option>
                                            <option value="Campur" <?= ($items['tipe'] == 'Campur') ? "selected" : ''; ?>>Campur</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="image">Upload Gambar</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div>
                                            <img src="<?= base_url(); ?>file/kos_image/<?= $items["image_header"]; ?>" id="preview" class="border img-thumbnail" width="200" height="150">
                                        </div>
                                        <div>
                                            <input type="file" id="foto" name="image_header" value="<?php $image_header ?>" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="peraturan_kamar">Spesifikasi Kamar</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <?php
                                    $clean = str_replace(" Meter", "", $items['spesifikasi_kamar']);
                                    $spek = explode(";", $clean);
                                    $luas = explode("x", $spek[0]);
                                    ?>
                                    <div class="form-group">
                                        <input type="number" style="width: 35px;" name="panjang_kmr" min="1" max="10" value="<?= $luas[0]; ?>" required>
                                        <strong> x </strong>
                                        <input type="number" style="width: 35px;" name="lebar_kmr" min="1" max="10" value="<?= $luas[1]; ?>" required>
                                        <strong>Meter</strong>
                                    </div>
                                    <div class="form-group" style="margin-top: 10px;">
                                        <div class="custom-control custom-checkbox listrik-checkbox">
                                            <div>
                                                <input type="checkbox" class="custom-control-input listrik" id="listrik1" name="listrik" value="Termasuk Listrik" <?= ($spek[1] == 'Termasuk Listrik') ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="listrik1">Termasuk Listrik</label>
                                            </div>
                                            <div>
                                                <input type="checkbox" class="custom-control-input listrik" id="listrik2" name="listrik" value="Tidak Termasuk Listrik" <?= ($spek[1] == 'Tidak Termasuk Listrik') ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="listrik2">Tidak Termasuk Listrik</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="fasilitas">Fasilitas Kamar</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <?php
                                    if (!empty(json_decode($items['fasilitas']))) {
                                        $fas = json_decode($items['fasilitas']);
                                    } else {
                                        $fas = [""];
                                    }
                                    ?>
                                    <div class="form-group row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas1" name="fasilitas[]" value="Kasur" <?= (in_array("Kasur", $fas)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas1">Kasur</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas2" name="fasilitas[]" value="Lemari Baju" <?= (in_array("Lemari Baju", $fas)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas2">Lemari Baju</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas3" name="fasilitas[]" value="Kursi" <?= (in_array("Kursi", $fas)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas3">Kursi</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas4" name="fasilitas[]" value="Bantal" <?= (in_array("Bantal", $fas)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas4">Bantal</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas5" name="fasilitas[]" value="Jendela" <?= (in_array("Jendela", $fas)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas5">Jendela</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas6" name="fasilitas[]" value="Meja" <?= (in_array("Meja", $fas)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas6">Meja</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas7" name="fasilitas[]" value="Ventilasi" <?= (in_array("Ventilasi", $fas)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas7">Ventilasi</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas8" name="fasilitas[]" value="Kipas Angin" <?= (in_array("Kipas Angin", $fas)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas8">Kipas Angin</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas9" name="fasilitas[]" value="Guling" <?= (in_array("Guling", $fas)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas9">Guling</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas10" name="fasilitas[]" value="Cermin" <?= (in_array("Cermin", $fas)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas10">Cermin</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas11" name="fasilitas[]" value="Kamar Mandi" <?= (in_array("Kamar Mandi", $fas)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas11">Kamar Mandi</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas12" name="fasilitas[]" value="Kosongan" <?= (in_array("Kosongan", $fas)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas12">Kosongan </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="fasilitas">Fasilitas Kamar Mandi</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <?php
                                    if (!empty(json_decode($items['fasilitas_kamar_mandi']))) {
                                        $fas = json_decode($items['fasilitas_kamar_mandi']);
                                    } else {
                                        $fas = [""];
                                    }
                                    ?>
                                    <div class="form-group row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_kamar_mandi1" name="fasilitas_kamar_mandi[]" value="K. Mandi Dalam" <?= (in_array("K. Mandi Dalam", $fas)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas_kamar_mandi1">K. Mandi Dalam</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_kamar_mandi2" name="fasilitas_kamar_mandi[]" value="K. Mandi Luar" <?= (in_array("K. Mandi Luar", $fas)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas_kamar_mandi2">K. Mandi Luar</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_kamar_mandi3" name="fasilitas_kamar_mandi[]" value="Kloset Duduk" <?= (in_array("Kloset Duduk", $fas)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas_kamar_mandi3">Kloset Duduk</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_kamar_mandi4" name="fasilitas_kamar_mandi[]" value="Kloset Jongkok" <?= (in_array("Kloset Jongkok", $fas)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas_kamar_mandi4">Kloset Jongkok</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_kamar_mandi5" name="fasilitas_kamar_mandi[]" value="Shower" <?= (in_array("Shower", $fas)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas_kamar_mandi5">Shower</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_kamar_mandi6" name="fasilitas_kamar_mandi[]" value="Air Panas" <?= (in_array("Air Panas", $fas)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas_kamar_mandi6">Air Panas</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_kamar_mandi7" name="fasilitas_kamar_mandi[]" value="Cermin" <?= (in_array("Cermin", $fas)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas_kamar_mandi7">Cermin</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_kamar_mandi8" name="fasilitas_kamar_mandi[]" value="Bathtub" <?= (in_array("Bathub", $fas)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas_kamar_mandi8">Bathtub</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="fasilitas">Fasilitas Umum</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <?php
                                    if (!empty(json_decode($items['fasilitas_umum']))) {
                                        $fas_um = json_decode($items['fasilitas_umum']);
                                    } else {
                                        $fas_um = [""];
                                    }
                                    ?>

                                    <div class="form-group row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_umum1" name="fasilitas_umum[]" value="Wifi" <?= (in_array("Wifi", $fas_um)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas_umum1">Wifi</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_umum2" name="fasilitas_umum[]" value="Laundry" <?= (in_array("Laundry", $fas_um)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas_umum2">Laundry</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_umum3" name="fasilitas_umum[]" value="Dapur" <?= (in_array("Dapur", $fas_um)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas_umum3">Dapur</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_umum4" name="fasilitas_umum[]" value="CCTV" <?= (in_array("CCTV", $fas_um)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas_umum4">CCTV</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_umum5" name="fasilitas_umum[]" value="Pengurus Kos" <?= (in_array("Pengurus Kos", $fas_um)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas_umum5">Pengurus Kos</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_umum6" name="fasilitas_umum[]" value="Kulkas" <?= (in_array("Kulkas", $fas_um)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas_umum6">Kulkas</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_umum7" name="fasilitas_umum[]" value="Penjaga Kos" <?= (in_array("Penjaga Kos", $fas_um)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas_umum7">Penjaga Kos</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_umum8" name="fasilitas_umum[]" value="Dispenser" <?= (in_array("Dispenser", $fas_um)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas_umum8">Dispenser</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_umum9" name="fasilitas_umum[]" value="Gazebo" <?= (in_array("Gazebo", $fas_um)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas_umum9">Gazebo</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_umum10" name="fasilitas_umum[]" value="Rice Cooker" <?= (in_array("Rice Cooker", $fas_um)) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="fasilitas_umum10">Rice Cooker</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="alamat">Alamat</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" name="alamat" class="form-control no-resize" placeholder="Deskripsikan alamat kosanmu dengan jelas..."><?= $items['alamat']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="kota">Kota</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php
                                            echo "<select class='form-control show-tick select-kota' name='kota' required>";
                                            echo "<option value=''>--- Pilih Kota ---</option>";
                                            foreach ($datakota as $key => $tiap) { ?>
                                                <option value="<?= $tiap["city_name"]; ?>" <?= ($tiap['city_name'] == $items['kota']) ? "selected" : ''; ?>><?= $tiap["city_name"]; ?></option>
                                            <?php };
                                            echo "</select>";
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="harga">Harga</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="harga" value="<?= $items['harga']; ?>" class="form-control" name="harga" placeholder="Masukan Harga">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="kategori">Kategori Sewa</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <?php
                                    if (!empty(json_decode($items['kategori']))) {
                                        $kat = json_decode($items['kategori']);
                                    } else {
                                        $kat = [""];
                                    }
                                    ?>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="kategori1" name="kategori[]" value="1" <?= (in_array("1", $kat)) ? 'checked' : ''; ?>>
                                            <label class=" custom-control-label" for="kategori1">Per 1 Bulan</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="kategori2" name="kategori[]" value="3" <?= (in_array("3", $kat)) ? 'checked' : ''; ?>>
                                            <label class="custom-control-label" for="kategori2">Per 3 Bulan</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="kategori3" name="kategori[]" value="6" <?= (in_array("6", $kat)) ? 'checked' : ''; ?>>
                                            <label class="custom-control-label" for="kategori3">Per 6 Bulan</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="kategori4" name="kategori[]" value="12" <?= (in_array("12", $kat)) ? 'checked' : ''; ?>>
                                            <label class="custom-control-label" for="kategori4">Per 1 tahun</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="fasilitas">Fasilitas Parkir</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <?php
                                    if (!empty(json_decode($items['fasilitas_parkir']))) {
                                        $fas_par = json_decode($items['fasilitas_parkir']);
                                    } else {
                                        $fas_par = [""];
                                    }
                                    ?>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="fasilitas_parkir1" name="fasilitas_parkir[]" value="Parkir Motor" <?= (in_array("Parkir Motor", $fas_par)) ? 'checked' : ''; ?>>
                                            <label class="custom-control-label" for="fasilitas_parkir1">Parkir Motor</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="fasilitas_parkir2" name="fasilitas_parkir[]" value="Parkir Mobil" <?= (in_array("Parkir Mobil", $fas_par)) ? 'checked' : ''; ?>>
                                            <label class="custom-control-label" for="fasilitas_parkir2">Parkir Mobil</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="fasilitas_parkir3" name="fasilitas_parkir[]" value="Parkir Sepeda" <?= (in_array("Parkir Sepeda", $fas_par)) ? 'checked' : ''; ?>>
                                            <label class="custom-control-label" for="fasilitas_parkir3">Parkir Sepeda</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="harga">Sisa Kamar</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="sisa_kamar" value="<?= $items['sisa_kamar']; ?>" class="form-control" name="sisa_kamar" placeholder="Masukan Sisa Kamar" min="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="jenis">Status</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="status">
                                            <option value="1" <?= ($items['status'] == '1') ? "selected" : ''; ?>>Tersedia</option>
                                            <option value="0" <?= ($items['status'] == '0') ? "selected" : ''; ?>>Tidak tersedia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="peraturan_kamar">Peraturan Kamar</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <?php
                                    if (!empty(json_decode($items['peraturan_kamar']))) {
                                        $example = json_decode($items['peraturan_kamar']);
                                    } else {
                                        $example = [""];
                                    }
                                    // $example = json_decode($items['peraturan_kamar']);
                                    $searchword = 'dihuni';
                                    $matches = array_filter($example, function ($var) use ($searchword) {
                                        return preg_match("/\b$searchword\b/i", $var);
                                    });
                                    if ($matches) {
                                        $maks_huni_num = preg_replace('/[^0-9]/', '', $matches[0]);
                                    } else {
                                        $maks_huni_num = 1;
                                    }
                                    ?>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input maks_huni" id="peraturan_kamar1" name="peraturan_kamar[]" value="Kamar maksimal dihuni oleh <?= $maks_huni_num; ?> orang" <?= (strpos($items['peraturan_kamar'], 'dihuni oleh') !== false) ? 'checked' : ''; ?>>
                                            <label class="custom-control-label" for="peraturan_kamar1">Kamar maksimal dihuni oleh </label>
                                            <input type="number" style="width: 35px;" class="maks_huni_num" name="maks_huni" min="1" max="10" value="<?= $maks_huni_num; ?>" required> orang<br>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input pasutri" id="peraturan_kamar2" name="peraturan_kamar[]" value="Boleh pasutri" <?= (strpos($items['peraturan_kamar'], 'Boleh pasutri') !== false) ? 'checked' : ''; ?>>
                                            <label class="custom-control-label" for="peraturan_kamar2">Boleh pasutri</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input pasutri" id="peraturan_kamar3" name="peraturan_kamar[]" value="Tidak untuk pasutri" <?= (strpos($items['peraturan_kamar'], 'Tidak untuk pasutri') !== false) ? 'checked' : ''; ?>>
                                            <label class="custom-control-label" for="peraturan_kamar3">Tidak untuk pasutri</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input bawa-anak" id="peraturan_kamar4" name="peraturan_kamar[]" value="Boleh bawa anak" <?= (strpos($items['peraturan_kamar'], 'Boleh bawa anak') !== false) ? 'checked' : ''; ?>>
                                            <label class="custom-control-label" for="peraturan_kamar4">Boleh bawa anak</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input bawa-anak" id="peraturan_kamar5" name="peraturan_kamar[]" value="Tidak boleh bawa anak" <?= (strpos($items['peraturan_kamar'], 'Tidak boleh bawa anak') !== false) ? 'checked' : ''; ?>>
                                            <label class="custom-control-label" for="peraturan_kamar5">Tidak boleh bawa anak</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="peraturan_kamar6" name="peraturan_kamar[]" value="Tamu menginap dikenakan biaya" <?= (strpos($items['peraturan_kamar'], 'Tamu menginap') !== false) ? 'checked' : ''; ?>>
                                            <label class="custom-control-label" for="peraturan_kamar6">Tamu menginap dikenakan biaya</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="m-t-15">
                                <input type="submit" class="btn btn-primary waves-effect" value="Submit">
                                <a href="<?php echo base_url('owner') ?>">
                                    <button type="button" class="btn btn-danger waves-effect">Cancel</button>
                                </a>
                            </div>
                        </form>

                        <!-- #END# Horizontal Layout -->

                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    </div>
</section>