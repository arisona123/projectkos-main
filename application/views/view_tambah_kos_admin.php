<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header">
                    <div class="bcca-breadcrumb">
                        <div class="bcca-breadcrumb-item ">Tambah Data Kos<i class="fa fa-pencil"></i></div>
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
                        <form id="confirm" action="<?php echo site_url('owner/post_kos') ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                            <input type="hidden" name="id_kos" value="<?= $id_kos ?>" class="form-control">
                            <input type="hidden" name="stat" value="<?= $stat ?>" class="form-control">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="nama">Nama Kos </label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Kosan" required>
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
                                        <select class="form-control show-tick" name="tipe" required>
                                            <option value="Putra">Putra</option>
                                            <option value="Putri">Putri</option>
                                            <option value="Campur">Campur</option>
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
                                            <img id="preview" class="border img-thumbnail" width="200" height="100">
                                        </div>
                                        <div>
                                            <input type="file" id="foto" name="image_header" accept="image/*" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="peraturan_kamar">Spesifikasi Kamar</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <input type="number" style="width: 35px;" name="panjang_kmr" min="1" max="10" value="3" required>
                                        <strong> x </strong>
                                        <input type="number" style="width: 35px;" name="lebar_kmr" min="1" max="10" value="3" required>
                                        <strong>Meter</strong>
                                    </div>
                                    <div class="form-group" style="margin-top: 10px;">
                                        <div class="custom-control custom-checkbox listrik-checkbox">
                                            <div>
                                                <input type="checkbox" class="custom-control-input listrik" id="listrik1" name="listrik" value="Termasuk Listrik">
                                                <label class="custom-control-label" for="listrik1">Termasuk Listrik</label>
                                            </div>
                                            <div>
                                                <input type="checkbox" class="custom-control-input listrik" id="listrik2" name="listrik" value="Tidak Termasuk Listrik">
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
                                    <div class="form-group row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas1" name="fasilitas[]" value="Kasur">
                                                <label class="custom-control-label" for="fasilitas1">Kasur</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas2" name="fasilitas[]" value="Lemari Baju">
                                                <label class="custom-control-label" for="fasilitas2">Lemari Baju</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas3" name="fasilitas[]" value="Kursi">
                                                <label class="custom-control-label" for="fasilitas3">Kursi</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas4" name="fasilitas[]" value="Bantal">
                                                <label class="custom-control-label" for="fasilitas4">Bantal</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas5" name="fasilitas[]" value="Jendela">
                                                <label class="custom-control-label" for="fasilitas5">Jendela</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas6" name="fasilitas[]" value="Meja">
                                                <label class="custom-control-label" for="fasilitas6">Meja</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas7" name="fasilitas[]" value="Ventilasi">
                                                <label class="custom-control-label" for="fasilitas7">Ventilasi</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas8" name="fasilitas[]" value="Kipas Angin">
                                                <label class="custom-control-label" for="fasilitas8">Kipas Angin</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas9" name="fasilitas[]" value="Guling">
                                                <label class="custom-control-label" for="fasilitas9">Guling</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas10" name="fasilitas[]" value="Cermin">
                                                <label class="custom-control-label" for="fasilitas10">Cermin</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas11" name="fasilitas[]" value="Kamar Mandi">
                                                <label class="custom-control-label" for="fasilitas11">Kamar Mandi</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas12" name="fasilitas[]" value="Kosongan">
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
                                    <div class="form-group row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_kamar_mandi1" name="fasilitas_kamar_mandi[]" value="K. Mandi Dalam">
                                                <label class="custom-control-label" for="fasilitas_kamar_mandi1">K. Mandi Dalam</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_kamar_mandi2" name="fasilitas_kamar_mandi[]" value="K. Mandi Luar">
                                                <label class="custom-control-label" for="fasilitas_kamar_mandi2">K. Mandi Luar</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_kamar_mandi3" name="fasilitas_kamar_mandi[]" value="Kloset Duduk">
                                                <label class="custom-control-label" for="fasilitas_kamar_mandi3">Kloset Duduk</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_kamar_mandi4" name="fasilitas_kamar_mandi[]" value="Kloset Jongkok">
                                                <label class="custom-control-label" for="fasilitas_kamar_mandi4">Kloset Jongkok</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_kamar_mandi5" name="fasilitas_kamar_mandi[]" value="Shower">
                                                <label class="custom-control-label" for="fasilitas_kamar_mandi5">Shower</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_kamar_mandi6" name="fasilitas_kamar_mandi[]" value="Air Panas">
                                                <label class="custom-control-label" for="fasilitas_kamar_mandi6">Air Panas</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_kamar_mandi7" name="fasilitas_kamar_mandi[]" value="Cermin">
                                                <label class="custom-control-label" for="fasilitas_kamar_mandi7">Cermin</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_kamar_mandi8" name="fasilitas_kamar_mandi[]" value="Bathtub">
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
                                    <div class="form-group row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_umum1" name="fasilitas_umum[]" value="Wifi">
                                                <label class="custom-control-label" for="fasilitas_umum1">Wifi</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_umum2" name="fasilitas_umum[]" value="Laundry">
                                                <label class="custom-control-label" for="fasilitas_umum2">Laundry</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_umum3" name="fasilitas_umum[]" value="Dapur">
                                                <label class="custom-control-label" for="fasilitas_umum3">Dapur</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_umum4" name="fasilitas_umum[]" value="CCTV">
                                                <label class="custom-control-label" for="fasilitas_umum4">CCTV</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_umum5" name="fasilitas_umum[]" value="Pengurus Kos">
                                                <label class="custom-control-label" for="fasilitas_umum5">Pengurus Kos</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_umum6" name="fasilitas_umum[]" value="Kulkas">
                                                <label class="custom-control-label" for="fasilitas_umum6">Kulkas</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_umum7" name="fasilitas_umum[]" value="Penjaga Kos">
                                                <label class="custom-control-label" for="fasilitas_umum7">Penjaga Kos</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_umum8" name="fasilitas_umum[]" value="Dispenser">
                                                <label class="custom-control-label" for="fasilitas_umum8">Dispenser</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_umum9" name="fasilitas_umum[]" value="Gazebo">
                                                <label class="custom-control-label" for="fasilitas_umum9">Gazebo</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fasilitas_umum10" name="fasilitas_umum[]" value="Rice Cooker">
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
                                            <textarea rows="4" name="alamat" class="form-control no-resize" placeholder="Deskripsikan alamat kosanmu dengan jelas..." required></textarea>
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
                                            foreach ($datakota as $key => $tiap) {
                                                echo "<option value='$tiap[city_name]'>";
                                                echo $tiap['city_name'];
                                                echo "</option>";
                                            }
                                            echo "</select>";
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="kota">Kota</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <?php
                                                            echo "<select class='form-control show-tick' name='kota' required>";
                                                            echo "<option value=''>--- Pilih Kota ---</option>";
                                                            foreach ($datakota as $key => $tiap) {
                                                                echo "<option value='$tiap[city_name]'>";
                                                                echo $tiap['city_name'];
                                                                echo "</option>";
                                                            }
                                                            echo "</select>";
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="harga">Harga</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="harga" class="form-control" name="harga" placeholder="Masukan Harga" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="kategori">Kategori Sewa</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="kategori1" name="kategori[]" value="1">
                                            <label class=" custom-control-label" for="kategori1">Per 1 Bulan</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="kategori2" name="kategori[]" value="3">
                                            <label class="custom-control-label" for="kategori2">Per 3 Bulan</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="kategori3" name="kategori[]" value="6">
                                            <label class="custom-control-label" for="kategori3">Per 6 Bulan</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="kategori4" name="kategori[]" value="12">
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
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="fasilitas_parkir1" name="fasilitas_parkir[]" value="Parkir Motor">
                                            <label class="custom-control-label" for="fasilitas_parkir1">Parkir Motor</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="fasilitas_parkir2" name="fasilitas_parkir[]" value="Parkir Mobil">
                                            <label class="custom-control-label" for="fasilitas_parkir2">Parkir Mobil</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="fasilitas_parkir3" name="fasilitas_parkir[]" value="Parkir Sepeda">
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
                                            <input type="number" id="sisa_kamar" class="form-control" name="sisa_kamar" placeholder="Masukan Sisa Kamar" min="0">
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
                                        <select class="form-control show-tick" name="status" required>
                                            <option value="1">Tersedia</option>
                                            <option value="0">Tidak tersedia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="peraturan_kamar">Peraturan Kamar</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input maks_huni" id="peraturan_kamar1" name="peraturan_kamar[]" value="Kamar maksimal dihuni oleh 1 orang">
                                            <label class="custom-control-label" for="peraturan_kamar1">Kamar maksimal dihuni oleh </label>
                                            <input type="number" style="width: 35px;" class="maks_huni_num" name="maks_huni" min="1" max="10" value="1" required> orang<br>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input pasutri" id="peraturan_kamar2" name="peraturan_kamar[]" value="Boleh pasutri">
                                            <label class="custom-control-label" for="peraturan_kamar2">Boleh pasutri</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input pasutri" id="peraturan_kamar3" name="peraturan_kamar[]" value="Tidak untuk pasutri">
                                            <label class="custom-control-label" for="peraturan_kamar3">Tidak untuk pasutri</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input bawa-anak" id="peraturan_kamar4" name="peraturan_kamar[]" value="Boleh bawa anak">
                                            <label class="custom-control-label" for="peraturan_kamar4">Boleh bawa anak</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input bawa-anak" id="peraturan_kamar5" name="peraturan_kamar[]" value="Tidak boleh bawa anak">
                                            <label class="custom-control-label" for="peraturan_kamar5">Tidak boleh bawa anak</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="peraturan_kamar6" name="peraturan_kamar[]" value="Tamu menginap dikenakan biaya">
                                            <label class="custom-control-label" for="peraturan_kamar6">Tamu menginap dikenakan biaya</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="m-t-15">
                                            <div class="data" data-data="Data kos akan dibatalkan" data-confirm="Data kos akan ditambahkan"></div>
                                            <button type="submit" id="btn-submit" class="btn btn-primary konfirmasi" value="Submit">Tambah data kos</button>
                                            <a href="<?php echo base_url('owner') ?> " class="btn btn-danger  hapus">Batal</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=-33.8670522,151.1957362&radius=1500&type=restaurant&keyword=cruise&key=AIzaSyAN2SQVsf1uQRtKyIcNRXCxjriavGkL9ow"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    $("#btn-submit").click(function(e) {
        // e.preventDefault();
        listrik = $('div.listrik-checkbox :checkbox:checked').length;
        if (listrik == 0) {
            toastr.warning('Harap pilih spesifikasi Listrik');
        }
        // toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!');
        // ($('div.listrik-checkbox :checkbox:checked').length == 0) ? alert('Pilih Listrik'): '';
    });

    $('input[type=number].maks_huni_num').on('change', function() {
        num = $('input[type=number].maks_huni_num').val();
        val = 'Kamar maksimal dihuni oleh ' + num + ' orang';
        $('input[type=checkbox].maks_huni').val(val);
    });

    $('input[type=checkbox].bawa-anak').on('change', function() {
        $('input[type=checkbox].bawa-anak').not(this).prop('checked', false);
    });
    $('input[type=checkbox].pasutri').on('change', function() {
        $('input[type=checkbox].pasutri').not(this).prop('checked', false);
    });
</script>

<script>
    $('input[type=checkbox].listrik').on('change', function() {
        $('input[type=checkbox].listrik').not(this).prop('checked', false);
    });

    // Image Preview
    function imagePreview(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function(event) {
                $('#preview').attr('src', event.target.result);
            };
            fileReader.readAsDataURL(fileInput.files[0]);
        }
    }

    $("#foto").change(function() {
        imagePreview(this);
    });
</script>