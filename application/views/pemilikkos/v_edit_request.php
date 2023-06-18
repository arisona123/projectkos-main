<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Update Data Request
                        </h2>

                    </div>
                    <div class="card-body">
                        <!-- Horizontal Layout -->
                        <?php foreach ($request as $rqst) { ?>
                            <form action="<?php echo site_url('Main_Back_Owner/proses_update_request') ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                                <input type="hidden" name="id_request" value="<?php echo $rqst->id_request ?>" class="form-control">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nama_depan">Nama Depan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nama_depan" id="nama_depan" value="<?php echo $rqst->nama_depan ?>" class="form-control" placeholder="Masukan Nama Depan" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nama_belakang">Nama Belakang</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nama_belakang" id="nama_belakang" value="<?php echo $rqst->nama_belakang ?>" class="form-control" placeholder="Masukan Nama Depan" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="info_hub">Ingin dihubungin melalui?</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control show-tick" value="<?php echo $rqst->info_hub ?>" name="info_hub" required>
                                                <option value="Whatsapp">Whatsapp</option>
                                                <option value="No Handphone">No Handphone</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="no_hp">No HP</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="no_hp" id="no_hp" class="form-control" value="<?php echo $rqst->no_hp ?>" placeholder="Masukan No HP" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="tipe_kos">Tipe Kos</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control show-tick" value="<?php echo $rqst->tipe_kos ?>" name="tipe_kos" required>
                                                <option value="Putra">Kost Putra</option>
                                                <option value="Putri">Kost Putri</option>
                                                <option value="Campur">Kost Campur</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nama_properti">Nama Properti</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nama_properti" id="nama_properti" class="form-control" value="<?php echo $rqst->nama_properti ?>" placeholder="Masukan Nama Properti" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="url_properti">URL Properti</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="url_properti" id="url_properti" class="form-control" value="<?php echo $rqst->url_properti ?>" placeholder="Masukan URL Properti" required>
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
                                                <input type="text" name="harga" id="harga" class="form-control" value="<?php echo $rqst->harga ?>" placeholder="Masukan Harga" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="provinsi">Provinsi</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control show-tick" value="<?php echo $rqst->provinsi ?>" name="provinsi" required>
                                                <option value="Aceh">Aceh</option>
                                                <option value="Sumatera Utara">Sumatera Utara</option>
                                                <option value="Sumatera Barat">Sumatera Barat</option>
                                                <option value="Riau">Riau</option>
                                                <option value="Jambi">Jambi</option>
                                                <option value="Sumatera Selatan">Sumatera Selatan</option>
                                                <option value="Bengkulu">Bengkulu</option>
                                                <option value="Lampung">Lampung</option>
                                                <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
                                                <option value="Kepulauan Riau">Kepulauan Riau</option>
                                                <option value="DKI Jakarta">DKI Jakarta</option>
                                                <option value="Jawa Barat">Jawa Barat</option>
                                                <option value="Jawa Tengah">Jawa Tengah</option>
                                                <option value="DI Yogyakarta">DI Yogyakarta</option>
                                                <option value="Jawa Timur">Jawa Timur</option>
                                                <option value="Banten">Banten</option>
                                                <option value="Bali">Bali</option>
                                                <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                                <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                                                <option value="Kalimantan Barat">Kalimantan Barat</option>
                                                <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                                <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                                <option value="Kalimantan Timur">Kalimantan Timur</option>
                                                <option value="Kalimantan Utara">Kalimantan Utara</option>
                                                <option value="Sulawesi Utara">Sulawesi Utara</option>
                                                <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                                                <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                                <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                                                <option value="Gorontalo">Gorontalo</option>
                                                <option value="Sulawesi Barat">Sulawesi Barat</option>
                                                <option value="Maluku">Maluku</option>
                                                <option value="Maluku Utara">Maluku Utara</option>
                                                <option value="Papua">Papua</option>
                                                <option value="Papua Barat">Papua Barat</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="kabupaten_kota">Kabupaten/Kota</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="kabupaten_kota" id="kabupaten_kota" class="form-control" value="<?php echo $rqst->kabupaten_kota ?>" placeholder="Masukan Kabupaten/Kota" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="kecamatan">Kecamatan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="kecamatan" id="kecamatan" class="form-control" value="<?php echo $rqst->kecamatan ?>" placeholder="Masukan Kecamatan" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="kelurahan">Kelurahan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="kelurahan" id="kelurahan" class="form-control" value="<?php echo $rqst->kelurahan ?>" placeholder="Masukan Kelurahan" required>
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
                                                <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $rqst->alamat ?>" placeholder="Masukan Alamat" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="jumlah_kamar">Jumlah Kamar</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="jumlah_kamar" class="form-control quantity" value="<?php echo $rqst->jumlah_kamar ?>" id="jumlah_kamar" id="id_form-0-quantity" min="0" name="form-0-quantity" value="1" type="number" placeholder="Masukkan Jumlah Kamar" required></input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Submit">
                                    </div>
                                    <br>
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <a href="<?php echo base_url('Main_Back_Owner/view_request') ?>">
                                            <button type="button" class="btn btn-danger waves-effect">Cancel</button>
                                        </a>
                                        <div>


                                        </div>


                            </form>
                        <?php } ?>
                        <!-- #END# Horizontal Layout -->

                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    </div>
</section>