<style>
    .table-hover>tbody>tr:hover {
        background-color: #7ee6b0 !important;
        color: #fff
    }
</style>
<section class="content">
    <div class="container-fluid">
        <!-- DATA KOS -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="header col-mb-4">
                    <h2 class="col-mb-4 animate__animated animate__bounceInDown text-success"> <?= $title ?> </h2>
                </div>
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                <div class="body animate__animated animate__zoomIn">
                    <div class="table-responsive-sm shadow-lg p-3 mb-5 bg-body rounded">
                        <table id="dtable" class="table table-striped table-hover table-sm ">
                            <thead class="table-success">
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th>JK</th>
                                    <th>No HP</th>
                                    <th>Alamat</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php if (empty($user)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    Data Kost Tidak Ditemukan!
                                </div>
                            <?php endif; ?>
                            <tbody>
                                <?php $no = 0;
                                foreach ($User_data as $u) { ?>
                                    <tr>
                                        <td><?= ++$no ?></td>
                                        <td><?= $u['username']; ?></td>
                                        <td><?= $u['fullname']; ?></td>
                                        <td><?= $u['email']; ?></td>
                                        <td><?= $u['jk']; ?></td>
                                        <td><?= $u['no_hp']; ?></td>
                                        <td><?= $u['alamat']; ?></td>
                                        <?php if ($u['id_role'] == 2) {
                                            $nama_role = 'Pengguna';
                                        } elseif ($u['id_role'] == 3) {
                                            $nama_role = 'Pemilik';
                                        } ?>
                                        <td><?= $nama_role; ?></td>
                                        <div class="data" data-data="Data pengguna akan dihapus!"></div>
                                        <td> <a href="<?php echo base_url('admin/edit_user/' . $u['id_user']) ?>">
                                                <button type="button" class="btn mb-1 btn-info btn-block btn-sm" data-toggle="tooltip" data-placement="left" title="Edit data admin"><i class="fas fa-edit"></i></button>
                                            </a>
                                            <a href="<?php echo base_url('admin/hapus_user/' . $u['id_user']) ?>" data-toggle="tooltip" data-placement="left" title="Hapus data admin" class="btn btn-danger btn-block btn-sm hapus"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- END DATA KOS-->
            </div>
        </div>
    </div>
    </div>
</section>