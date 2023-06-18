<section class="content">
    <div class="container-fluid">
        <!-- DATA KOS -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="header">
                    <h2 class="animate__animated animate__bounceInDown text-success"><?= $title ?></h2>
                    <br>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <a class="mb-5" href="<?php echo base_url() ?>super_admin/daftar_admin">
                        <button type="button" class="btn btn-primary waves-effect mb-5">
                            <i class="fas fa-user-plus"> Tambah Data Admin</i></button>
                    </a>

                </div>
                <div class="body animate__animated animate__zoomIn">
                    <div class="table-responsive shadow-lg p-3 mb-5 bg-body rounded">
                        <table id="dtable" class="table table-striped table-bordered table-hover table-sm">
                            <thead class="table-success">
                                <tr>
                                    <th>NO</th>
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

                            <?php $no = 1 ?>
                            <tbody>
                                <?php foreach ($admin as $A) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $A['username']; ?></td>
                                        <td><?php echo $A['fullname']; ?></td>
                                        <td><?php echo $A['email']; ?></td>
                                        <td><?php echo $A['jk']; ?></td>
                                        <td><?php echo $A['no_hp']; ?></td>
                                        <td><?php echo $A['alamat']; ?></td>
                                        <?php if ($A['id_role'] == 1) {
                                            $nama_role = 'Admin';
                                        } ?>
                                        <td><?php echo $nama_role ?></td>
                                        <td>
                                            <a href="<?php echo base_url('super_admin/edit_admin/' . $A['id_user']) ?>">
                                                <button type="button" class="btn mb-1 btn-info btn-block btn-sm" data-toggle="tooltip" data-placement="left" title="Edit data admin"><i class="fas fa-edit"></i></button>
                                            </a>

                                            <div class="data" data-data="akun Admin akan dihapus!"></div>
                                            <a href="<?php echo base_url('super_admin/hapus_admin/' . $A['id_user']) ?>" data-toggle="tooltip" data-placement="left" title="Hapus data admin" class="btn btn-danger btn-block btn-sm hapus"><i class="fas fa-trash-alt"></i></a>

                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                        <!-- END DATA KOS-->
                    </div>
                </div>
            </div>
        </div>
</section>