<div style="padding: 35px; background-color: #f8fbf9; min-height: calc(100vh - 145px);">
    <div class="row">
        <div class="col-md-7">
            <div id="carouselExampleSlidesOnly" class="carousel slide login-img" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= base_url('assets/img/login_1.svg')?>" class="img-fluid">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/img/login_3.svg')?>" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5" style="padding-left: 50px;">
            <div  style="margin-right: 15%; margin-top: 10%">
                <h3>Register to <span style="color: #008037">Immunihealth</span></h3>
                <p>Ensure your future now. Fill the form below and start healthy life.</p>
                <form method="post" action="<?=base_url('login/submit_sign_up')?>"style="margin-top: 30px; margin-bottom: 15px">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your private information with anyone else.</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">No. Telp</label>
                            <input type="text" name="no_telp" class="form-control" id="exampleInputPassword1">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Confirm Passowrd</label>
                            <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1">
                        </div>
                    </div>
                    <button class="login-btn" type="submit" class="btn btn-primary">Register Now</button>
                </form>
            </div>
            <label id="lbl-register">Sudah punya akun? <a href="<?= base_url() ?>login/sign_in">Login disini.</a></label>
        </div>
    </div>
</div>