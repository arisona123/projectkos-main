<!-- Menu -->
<div class="menu">
    <ul class="list">
        <li class="header">MAIN PEMILIK KOS</li>
        <li class="active">
            <a href="<?php echo base_url() ?>Main_Back_Owner/dashboard">
                <i class="material-icons">dashboard</i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url() ?>Main_Back_Owner/view_request">
                <i class="material-icons">add</i>
                <span>Request Kos</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url('Main_Back_Owner/data_kos/' . $this->session->userdata('id_user')) ?>">
                <i class="material-icons">home</i>
                <span>Kos Anda</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url('Main_Back_Owner/data_owner/' . $this->session->userdata('id_user')) ?>">
                <i class="material-icons">face</i>
                <span>Data Profile</span>
            </a>
        </li>
    </ul>
</div>
<!-- #Menu -->