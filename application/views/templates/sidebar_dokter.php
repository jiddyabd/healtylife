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
                <a class="nav-link" href="<?= base_url() ?>dokter/home">Home</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>dokter/view_appointment">
                    <i class="fa fa-calendar"style="min-width: 2rem"></i>
                    <span>
                        Appointment
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>dokter/riwayat_kerja">
                
                <i class="fa fa-history"style="min-width: 2rem"></i>
                    <span>
                    Riwayat Kerja
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>dokter/view_jadwal">
                
                <i class="fa fa-calendar"style="min-width: 2rem"></i>
                    <span>
                    Jadwal
                    </span></a>
            </li>
        </ul>
    </div>
</nav>