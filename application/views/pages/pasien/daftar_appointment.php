<div class="row">
    <div class="col-md-12">
        <div class="card-container">
            <div class="card">
                <div class="card-header">
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Form Registrasi Appointment</b>
                    </div>
                </div>
                <div class="card-body">
                  <form action="<?=base_url('pasien/submit_appointment')?>" method="post">
                  
                    <h6 class="card-title form-divide-title">PILIH JADWAL DAN LAYANAN</h6>
                    <p class="card-text">
                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Tanggal dan Waktu</label>
                              <input name="tgl_waktu_permintaan" type="datetime-local" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="inputEmail4">Layanan</label>
                            <select name="jenis_layanan" id="inputState" class="form-control">
                                <option selected disabled>Pilih Layanan</option>
                                <?php foreach($list_layanan as $layanan){ ?>
                                  <option value="<?=$layanan->layanan_id?>"><?= $layanan->grup.'-'.$layanan->jenis_layanan ?></option>
                                <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </p>
                    <hr>
                    
                    <h6 class="card-title form-divide-title">DATA PASIEN</h6>
                    <p class="card-text">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pasiem</label>
                            <input name="nama_pasien" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Lahir</label>
                            <input name="tgl_lahir_pasien" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="inputEmail4">Jenis Kelamin</label>
                              <select name="jenis_kelamin_pasien" id="inputState" class="form-control">
                                  <option selected disabled>Pilih Jenis Kelamin</option>
                                  <option value="Laki-laki">Laki-laki</option>
                                  <option value="Perempuan">Perempuan</option>
                              </select>
                            </div>
                          </div>
                      </div>
                    </p>

                    <hr>
                    <h6 class="card-title form-divide-title">DATA WALI</h6>
                    <p class="card-text">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama Wali</label>
                            <input name="nama_wali" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                        </div>
                      </div>
                    </p>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>