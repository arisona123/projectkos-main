<style>
    .sidebar .active::before {
        border-radius: 4px 0px 0px 4px;
        content: "";
        position: absolute;
        right: 0;
        width: 7px;
        height: 65px;
        background-color: floralwhite;
    }
</style>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion sticky-top" id="accordionSidebar">
    <?php if ($user['id_role'] == 1) {
        $url_brand = 'Admin';
    } elseif ($user['id_role'] == 2) {
        $url_brand = 'User';
    } elseif ($user['id_role'] == 3) {
        $url_brand = 'Owner';
    } elseif ($user['id_role'] == 4) {
        $url_brand = 'Admin';
    }; ?>
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center mb-4" href="<?= base_url($url_brand); ?>">
        <div class="sidebar-brand-icon" id="img-brand">
            <img src=" <?php echo base_url() ?>assets/images/mbakos 1.png" class="ml-2 ">
        </div>
        <div class="sidebar-brand-text mx-1 " id="text-brand"> <img src=" <?php echo base_url() ?>assets/images/mbakos 2.png"></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- query menu -->
    <?php
    $id_role = $this->session->userdata('id_role');
    $queryMenu = "SELECT `user_menu`.`id`,`menu`
                    FROM `user_menu`  
                    JOIN `unser_access_menu` ON `user_menu`.`id` = `unser_access_menu`.`menu_id`
                   WHERE `unser_access_menu`.`id_role` = $id_role
                ORDER BY `unser_access_menu`.`menu_id` ASC
                 ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>
    <?php foreach ($menu as $m) : ?>
        <!-- Heading -->
        <div class="sidebar-heading ">
            <?= ($m['menu'] == "Admin") ? "Admin" : ''; ?>
            <?= ($m['menu'] == "User") ? "Pengguna" : ''; ?>
            <?= ($m['menu'] == "Owner") ? "Pemilik" : ''; ?>
            <?= ($m['menu'] == "Super_Admin") ? "Super Admin" : ''; ?>
        </div>

        <!-- sub menu  -->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
                        FROM `user_sub_menu`
                        JOIN `user_menu` ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                       WHERE `user_sub_menu`.`menu_id` = $menuId
                    AND `user_sub_menu`.`is_active` = 1
                 ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>
        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active animate__animated animate__flash">
                <?php else : ?>
                <li class="nav-item ">
                <?php endif; ?>

                <a class="nav-link " href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon'] ?>"></i>
                    <span class="tooltips"><?= $sm['title'] ?></span>
                </a>

                </li>
            <?php endforeach ?>
            <!-- Divider -->
            <hr class="sidebar-divider">
        <?php endforeach; ?>

        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>Login/logout" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span class="tooltips">Keluar</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->

</ul>
<!-- End of Sidebar -->