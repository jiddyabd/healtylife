<div class="row">
    <div class="col-md-12">
        <div class="card-container">
            <div class="card">
                <div class="card-header">
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Daftar appointment</b>
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
                            <th scope="col">Nama Dokter</th>
                            <th scope="col">Jadwal Dokter</th>
                            <th scope="col">Layanan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                            <?php if(count($list_appointment) <= 0){ ?>
                            <tr>
                                <td class="text-center" colspan="11">Anda belum memiliki daftar appointment mendatang.</td>
                            </tr>
                            <?php }else{ ?>
                            <?php $table_number = ++$curr_page?>
                            <?php foreach($list_appointment as $appointment){?>
                            <tr>
                                <th scope="row"><?= $table_number++ ?></th>
                                <td><?= $appointment->tgl_waktu_permintaan?></td>
                                <td><?= $appointment->nama_wali?></td>
                                <td><?= $appointment->nama_pasien?></td>
                                <td><?= $appointment->tanggal_lahir?></td>
                                <td><?= $appointment->jenis_kelamin?></td>
                                <td><?php if($appointment->is_acc) { echo $appointment->nama_dokter; }else { echo "-"; }?></td></td>
                                <td><?php if($appointment->is_acc) { echo $appointment->hari.', '.$appointment->waktu_mulai.' - '.$appointment->waktu_selesai; }else { echo "-"; }?></td></td>
                                <td><?= $appointment->grup.' - '.$appointment->jenis_layanan?></td></td>
                                <td>
                                    <?php
                                      $status_written = false;
                                      if(is_null($appointment->is_acc)){
                                          echo "Belum di ACC";
                                      }else{
                                          if($appointment->is_done){
                                              echo "Selesai";
                                              $status_written = true;
                                          }
                                          if($appointment->is_acc == true && !$status_written){
                                              echo "In Progress";
                                          }else if($appointment->is_acc == false && !$status_written){
                                              echo "Ditolak";
                                          }

                                      }
                                    ?>
                                </td>
                                <td>
                                    <?php if(is_null($appointment->is_acc)){ ?>
                                        <button data-toggle="modal" data-target="#ganti_jadwal_appointment_modal_<?= $appointment->appointment_id ?>" class="btn btn-warning">Ganti Jadwal</button>
                                    <?php }else if($appointment->is_acc){ ?>
                                    -
                                    <?php }; ?>
                                </td>
                            </tr>
                            <?php }; }; ?>
                        </tbody>
                    </table>
                    <?php echo $pagination; ?> 
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ganti Jadwal appointment -->
<?php foreach($list_appointment as $appointment) { ?>

<div class="modal fade" id="ganti_jadwal_appointment_modal_<?= $appointment->appointment_id ?>" tabindex="-1" role="dialog" aria-labelledby="ganti_jadwal_appointment_modal_Title" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ganti_jadwal_appointment_modal_Title">Ganti Jadwal Appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url('pasien/ganti_jadwal_appointment/'.$appointment->appointment_id)?>">
        <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Tanggal dan Waktu Sebelum</label>
              <input disabled value="<?= date('Y-m-d\TH:i:s', strtotime($appointment->tgl_waktu_permintaan))?>" type="datetime-local" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tanggal dan Waktu Setelah Diganti</label>
              <input value="<?= date('Y-m-d\TH:i:s', strtotime($appointment->tgl_waktu_permintaan))?>" type="datetime-local" name="tgl_waktu_permintaan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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

<?php }; ?>