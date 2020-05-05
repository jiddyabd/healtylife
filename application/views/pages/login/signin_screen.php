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
                <h3>Welcome to <span style="color: #008037">Immunihealth</span></h3>
                <p>Keeping your healthy behaviour is just a single step away. With a single sign-in you can keep your future healtier than ever. 💊</p>
                <form method="post" action="<?=base_url('login/submit_sign_in')?>" style="margin-top: 50px; margin-bottom: 15px">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your private information with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button class="login-btn" type="submit" class="btn btn-primary">Submit</button>
                </form>
                <label id="lbl-register">Belum punya akun? <a href="<?= base_url() ?>login/sign_up">Daftar disini.</a></label>
            </div>
        </div>
    </div>
</div>