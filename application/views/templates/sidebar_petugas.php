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
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>dokter/view_appointment">
                    <i class="fa fa-columns" style="min-width: 2rem"></i>
                    <span>
                        Dashboard
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>petugas/view_appointment">
                    <i class="fa fa-calendar" style="min-width: 2rem"></i>
                    <span>
                        Appointment
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>petugas/view_dokter">
            
                <i class="fa fa-user-md" style="min-width: 2rem"></i>
                    <span>
                        Dokter
                    </span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>petugas/view_user">
                    <i class="fa fa-user" style="min-width: 2rem"></i>
                    <span>
                        User
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>petugas/view_pasien">
                
                    <i class="fa fa-user-times" style="min-width: 2rem"></i>
                    <span>
                        Pasien
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>petugas/view_layanan">
            
                
                
                    <i class="fa fa-stethoscope" style="min-width: 2rem"></i>
                    <span>
                        Layanan
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>petugas/view_petugas">
            
                
                
                
                <i class="fa fa-id-badge" style="min-width: 2rem"></i>
                <span>
                    Petugas
                </span>
            </a>
            </li>
        </ul>
    </div>
</nav>