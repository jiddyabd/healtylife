<div style="background-image: url(<?php echo base_url('assets/gambar/bg_overlay.jpg'); ?>); width: 100%; height: 100%; position: fixed; background-repeat: no-repeat; background-size: cover;">

    <!-- Header Navbar -->
    <nav class="navbar navbar-expand-sm bg-info navbar-info justify-content-center fixed-top " style="background-color: #262828 !important">
        <!-- Logo -->
        <a class="navbar-brand" href="<?= base_url()?>index/utama" style="centered;">
            <img src="<?= base_url() ?>assets/gambar/logo.png" alt="logo" style="width: 200px; display: block; background-position: 50%!important; background-size: 100px 33px!important;">
        </a>
    </nav>
    <div aria-live="polite" aria-atomic="true">
        <div data-delay="10000" class="toast" style="position: absolute; top: 150px; right: 50px;">
            <div class="toast-header">
            <img src="..." class="rounded mr-2" alt="...">
            <strong class="mr-auto">Bootstrap</strong>
            <small>11 mins ago</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="toast-body">
            Hello, world! This is a toast message.
            </div>
        </div>
    </div>

    <div style="width: 350px; background: white; margin: 170px auto; padding: 30px 20px; border-radius: 6px; fixed">
        <h2 style="text-align: center; font-style: bold;">Login Form</h2>
        <h5 style="text-align: center; margin-bottom: 20px;">Pasien</h5>

        <?php if ($this->session->flashdata('success')) : ?>
        <div class="row">
            <div class="col">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <?php elseif($this->session->flashdata('newregister')) : ?>
        <div class="row">
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('newregister'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <form action="<?=base_url()?>pasien/do_login" method="POST">
            <div class="form-group">
                <label>Username</label><br/>
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required><br/>

                <label>Password</label><br/>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required><br/>

                <input type="submit" value="MASUK">

                <br/>
                <br/>
                <left>
                    <label id="lbl-register">Belum punya akun? <a href="<?= base_url() ?>pasien/register_pasien">Daftar</a></label>
                </left>
            </div>
        </form>
    </div>
    <br/>
</div> 

<script>

</script>