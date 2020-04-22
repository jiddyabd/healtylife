<?php
    $data_user = $this->session->userdata("datauser");
    $nama = $data_user["nama_pasien"];
?>

<nav class="navbar navbar-expand-lg bg-red fixed-top" style="background-color : #262828">
    <a class="navbar-brand" href="<?= base_url();?>pasien/home"><img src="<?= assets_url().'gambar/logo2.png'?>" style="width:100px"></a>
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button> -->

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto">
            <li class="nav-item" >
                <a class="nav-link" href="<?php echo base_url('pasien/home'); ?>" style="color:white">Beranda</a>
            </li>
            <li class="nav-item">
            <span class="nav-link">|</span>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="<?php echo base_url('pasien/PilihJadwalPeriksa'); ?>" style="color:white">Daftar Appointment</a>
            </li>
            <li class="nav-item">
                <span class="nav-link">|</span>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="<?php echo base_url('pasien/LihatJadwalPraktekDokter'); ?>" style="color:white">Edit Appointment</a>
            </li>
        </ul>
        <ul class="navbar-nav" style="margin-right:80px">
            <li class="navbar-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="color:white">
                    Akun
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"><?php echo $nama?></a>
                    <a class="dropdown-item" href="<?= base_url()?>pasien/profil">Profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url("pasien/logout"); ?>" onclick="return confirm('Apakah anda yakin untuk keluar ?');">Logout</a>
                </div>
            </li>  
        </ul>
    </div>
</nav>