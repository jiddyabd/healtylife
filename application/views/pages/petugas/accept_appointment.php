<div class="row">
    <div class="col-md-12">
        <div class="card-container">
            <div class="card">
                <div class="card-header">
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Form Penerimaan Appointment</b>
                    </div>
                </div>
                <div class="card-body">
                  <form action="<?=base_url('petugas/submit_accept_appointment/').$appointment->appointment_id?>" method="post">
                  
                    <h6 class="card-title form-divide-title">JADWAL DAN LAYANAN</h6>
                    <p class="card-text">
                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal dan Waktu</label>
                            <input disabled value="<?= date('Y-m-d\TH:i:s', strtotime($appointment->tgl_waktu_permintaan))?>" name="tgl_waktu_permintaan" type="datetime-local" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="inputEmail4">Layanan</label>
                            <select disabled value="<?=$appointment->layanan_id?>" name="jenis_layanan" id="inputState" class="form-control">
                                <option disabled>Pilih Layanan</option>
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
                            <input disabled value="<?=$appointment->nama_pasien?>" name="nama_pasien" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Lahir</label>
                            <input disabled value="<?=$appointment->tanggal_lahir?>" name="tgl_lahir_pasien" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="inputEmail4">Jenis Kelamin</label>
                              <select disabled value="<?=$appointment->jenis_kelamin?>" name="jenis_kelamin_pasien" id="inputState" class="form-control">
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
                            <input disabled value="<?=$appointment->nama_wali?>" name="nama_wali" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                        </div>
                      </div>
                    </p>

                    <hr>
                    <h6 class="card-title form-divide-title">PILIH DOKTER</h6>
                    <p class="card-text">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Dokter Tersedia</label>
                            <select name="jadwal_dokter" name="jenis_layanan" id="inputState" class="form-control">
                                <option selected disabled>Pilih Dokter</option>
                                <?php foreach($list_available_dokter as $dokter){ ?>
                                  <option value="<?=$dokter->jadwal_id.' | '.$dokter->dokter_id?>"><?= $dokter->nama_dokter.' | Hari: '.$dokter->hari_on_id.' ('.$dokter->waktu_mulai.' - '.$dokter->waktu_selesai.')' ?></option>
                                <?php }?>
                            </select>
                        </div>
                        </div>
                    </div>
                    </p>
                    <button type="submit" class="btn btn-primary">Accept</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>