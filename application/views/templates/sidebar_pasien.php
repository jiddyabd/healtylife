    <!-- Sidebar -->
<nav class="navbar navbar-vertical" id="sidebar">
    <div class="sidebar-wrapper">
        <div class="sidebar-header">
            <a href="<?= base_url()?>" class="navbar-brand">
                <img src="<?=base_url('assets/').'img/logo_xs.png'?>">
                Immunihealth
            </a>
        </div>
    
        <ul class="nav flex-column">
            <!-- <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>petugas/dashboard">Dashboard</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>pasien/daftar_appointment">
                
                    <i class="fa fa-calendar" style="min-width: 2rem"></i>
                    <span>
                        Daftar Appointment
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>pasien/appointment_mendatang">
                
                    <i class="fa fa-calendar" style="min-width: 2rem"></i>
                    <span>
                        Appointment Mendatang
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>pasien/riwayat_appointment">
                
                <i class="fa fa-calendar" style="min-width: 2rem"></i>
                    <span>
                        Riwayat Appointment
                    </span></a>
            </li>
        </ul>
    </div>
</nav>