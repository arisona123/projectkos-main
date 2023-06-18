<style>
    .header_toggle {
        color: #19A347;
    }

    .nav-icon-5 {
        width: 35px;
        height: 30px;
        margin: 10px 10px;
        position: relative;
        cursor: pointer;
        display: inline-block;
    }

    .nav-icon-5 span {
        background-color: #1cc88a;
        position: absolute;
        border-radius: 2px;
        transition: .3s cubic-bezier(.8, .5, .2, 1.4);
        width: 100%;
        height: 4px;
        transition-duration: 500ms
    }

    .nav-icon-5 span:nth-child(1) {
        top: 0px;
        left: 0px;
    }

    .nav-icon-5 span:nth-child(2) {
        top: 13px;
        left: 0px;
        opacity: 1;
    }

    .nav-icon-5 span:nth-child(3) {
        bottom: 0px;
        left: 0px;
    }

    .nav-icon-5:not(.open):hover span:nth-child(1) {
        transform: rotate(-6deg) scaleY(1.1);
    }

    .nav-icon-5:not(.open):hover span:nth-child(2) {
        transform: rotate(6deg) scaleY(1.1);
    }

    .nav-icon-5:not(.open):hover span:nth-child(3) {
        transform: rotate(-7deg) scaleY(1.1);
    }

    .nav-icon-5.open span:nth-child(1) {
        transform: rotate(45deg);
        top: 13px;
    }

    .nav-icon-5.open span:nth-child(2) {
        opacity: 0;
    }

    .nav-icon-5.open span:nth-child(3) {
        transform: rotate(-45deg);
        top: 13px;
    }
</style>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <header class="header" id="header">
                <div class="icon nav-icon-5" id="sidebarToggleTop">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

            </header>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="<?php echo base_url() ?>User" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small text-uppercase" aria-haspopup="true" aria-expanded="false"><strong><?= $user['username'] ?></strong></span>

                        <img class="img-profile rounded-circle" src="<?php echo base_url() ?>assets/images/profile/<?= $user['foto'] ?>" />

                    </a>

                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?php echo base_url() ?>User">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profil
                        </a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Keluar
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <script>
            const icons = document.querySelectorAll('.icon');
            icons.forEach(icon => {
                icon.addEventListener('click', (event) => {
                    icon.classList.toggle("open");
                });
            });
        </script>
        <!-- End of Topbar -->