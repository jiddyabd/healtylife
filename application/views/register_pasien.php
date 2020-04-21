<div>
<!-- Header Navbar -->
<nav class="navbar navbar-expand-sm bg-info navbar-info justify-content-center fixed-top" style="background-color: #262828 !important">
        <!-- Logo -->
        <a class="navbar-brand" href="<?= base_url()?>index/utama" style="centered">
            <img src="<?= base_url() ?>assets/gambar/logo.png" alt="logo" style="width: 100px; display: block; background-position: 50%!important; background-size: 100px 33px!important;">
        </a>
    </nav>
    </div>
<div style="background-image: url(<?php echo base_url('assets/gambar/bg_overlay.jpg'); ?>); width: 100%; height: 100%; position: fixed; top:0; background-size:cover;">
</div>
    <div style="width: 450px; background: white; margin: 90px auto; padding: 10px 20px 20px; border-radius: 6px; position: relative; position : relative">
        <h2 style="text-align: center; font-style: bold;">Telkomedika</h4>
        <h5 style="text-align: center; margin-bottom: 20px;">Register Form - Pasien</h5>

        <?php
            if ($this->session->flashdata('flashregister')){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php
            echo $this->session->flashdata('flashregister');
        ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
            }
        ?>
        <form action="<?=base_url()?>pasien/register_pasien" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="nama_pasien">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" id="ttl" placeholder="Tanggal Lahir" name="tanggal_lahir">
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="L" checked>Laki - Laki
                 </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="P">Perempuan
                </label>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="Email" name="email_pasien">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username_pasien">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password_pasien">
            </div>
            <div class="form-group">
                <textarea name="alamat_pasien" id="alamat" class="form-control" placeholder="Alamat"></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="notelepon" placeholder="No Telepon" name="notelepon_pasien">
            </div>
            <button type="submit" class="btn btn-block">DAFTAR</button>
        </form>
        <div class="" id="footer" style="background-color: lightgray;padding: 10px; margin-top: 7px; text-align:center; border-radius: 6px;">
            <p class="text-center" style="font-size:15px;color:black;">Sudah punya akun?</p>
            <a href="<?=base_url()?>pasien/landing_pasien" class="text-dark"><h3 class="text-bold text-center" style="font-size:15px; color: #003142;">Login ke akun sekarang.</h3></a> 
        </div>
    </div>
    <br/>
