<div class="row">
    <div class="col-md-12">
        <div class="card-container">
            <div class="card">
                <div class="card-header">
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <b>In Progress Appointment</b>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal Waktu Permintaan</th>
                            <th scope="col">Nama Wali</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $table_number = ++$curr_page?>
                            <?php foreach($list_appointment as $appointment){?>
                            <tr>
                                <th scope="row"><?= $table_number++ ?></th>
                                <td><?= $appointment->tgl_waktu_permintaan?></td>
                                <td><?= $appointment->nama_wali?></td>
                                <td><?= $appointment->nama_pasien?></td>
                                <td><?= $appointment->tanggal_lahir?></td>
                                <td><?= $appointment->jenis_kelamin?></td>
                                <td>
                                    <?= $appointment->waktu_mulai.' - '.$appointment->waktu_selesai?>
                                </td>
                                <td>
                                    <button data-toggle="modal" data-target="#finish_appointment_modal_<?= $appointment->appointment_id ?>" class="btn btn-info">Selesai</button>
                                </td>
                            </tr>
                            <?php }; ?>
                        </tbody>
                    </table>
                    <?php echo $pagination; ?> 
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal finish appointment -->
<?php foreach($list_appointment as $appointment) { ?>

<div class="modal fade" id="finish_appointment_modal_<?= $appointment->appointment_id ?>" tabindex="-1" role="dialog" aria-labelledby="finish_appointment_modal_Title" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="finish_appointment_modal_Title">Finish Appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url('dokter/submit_finish_appointment/').$appointment->appointment_id?>">
      <div class="modal-body">
          <h4>Detail</h4>
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">Nama Pasien</label>
                <input disabled value="<?=$appointment->nama_pasien?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Tanggal dan Waktu</label>
                <input disabled value="<?= date('Y-m-d\TH:i:s', strtotime($appointment->tgl_waktu_permintaan))?>" name="tgl_waktu_permintaan" type="datetime-local" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Layanan</label>
              <select disabled value="<?=$appointment->layanan_id?>" id="inputState" class="form-control">
                  <option disabled>Pilih Layanan</option>
                  <?php foreach($list_layanan as $layanan){ ?>
                    <option value="<?=$layanan->layanan_id?>"><?= $layanan->grup.' - '.$layanan->jenis_layanan ?></option>
                  <?php }?>
              </select>
          </div>
          <hr>
          <div class="form-group">
              <label for="inputAddress">Resume</label>
              <textarea name="resume" rows="8" class="form-control" id="inputAddress" placeholder="Tuliskan Resumt Appointment"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>