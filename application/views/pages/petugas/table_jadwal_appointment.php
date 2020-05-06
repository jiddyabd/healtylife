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
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($list_appointment) <= 0){ ?>
                            <tr>
                                <td class="text-center" colspan="8">Immunihealth belum memiliki appointment.</td>
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
                                        <a href="<?=base_url('petugas/accept_appointment/').$appointment->appointment_id ?>" class="btn btn-primary">Terima</a>
                                        <button data-toggle="modal" data-target="#tolak_appointment_modal_<?= $appointment->appointment_id ?>" class="btn btn-warning">Tolak</button>
                                    <?php } ?>
                                    <a href="<?=base_url('petugas/view_detail_appointment/').$appointment->appointment_id ?>" class="btn btn-secondary">Detail</a>
                                    <button data-toggle="modal" data-target="#hapus_appointment_modal_<?= $appointment->appointment_id ?>" class="btn btn-danger">Hapus</button>
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

<?php foreach($list_appointment as $appointment) { ?>
<!-- Modal Denied appointment (Dialog) -->
<div class="modal fade" id="tolak_appointment_modal_<?= $appointment->appointment_id ?>" tabindex="-1" role="dialog" aria-labelledby="hapus_appointment_modal_Title" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tolak Jadwal Appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menolak jadwal appointment ini ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <a href="<?=base_url('petugas/deny_appointment/'.$appointment->appointment_id)?>" class="btn btn-primary">Ya</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal Hapus appointment (Dialog) -->
<div class="modal fade" id="hapus_appointment_modal_<?= $appointment->appointment_id ?>" tabindex="-1" role="dialog" aria-labelledby="hapus_appointment_modal_Title" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Jadwal Appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus jadwal appointment ini ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <a href="<?=base_url('petugas/hapus_appointment/'.$appointment->appointment_id)?>" class="btn btn-primary">Ya</a>
      </div>
    </div>
  </div>
</div>

<?php }; ?>