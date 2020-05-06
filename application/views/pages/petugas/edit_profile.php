<div class="row">
    <!-- Edit Profile -->
    <div class="col-md-8">
        <div class="card-container">
            <form action="<?=base_url('petugas/submit_edit_profile')?>" method="post">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Edit Profile</b>
                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="card-title form-divide-title">USER INFORMATION</h6>
                    <p class="card-text">
                      <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputEmail4">Id</label>
                                <input disabled type="text" value="<?=$_user_id?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputEmail4">Nama</label>
                                <input name="user_name"  type="text" value="<?=$_user_name?>" class="form-control">
                            </div>
                        </div>
                      </div>
                    </p>

                    <hr>

                    <h6 class="card-title form-divide-title">GANTI PASSWORD</h6>
                    <p class="card-text">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputPassword4">Password</label>
                                <input type="password" placeholder="Masukan Password (min 8 karakter)" class="form-control" name="cpassword">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputPassword4">Confirm Password</label>
                                <input type="password" placeholder="Masukan Password (min 8 karakter)" class="form-control" name="password">
                            </div>
                        </div>
                      </div>
                    </p>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>