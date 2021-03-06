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
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($list_appointment) <= 0){ ?>
                            <tr>
                                <td class="text-center" colspan="9">Anda belum memiliki daftar riwayat appointment.</td>
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
                                <td><?= $appointment->nama_dokter?></td></td>
                                <td><?= $appointment->hari.', '.$appointment->waktu_mulai.' - '.$appointment->waktu_selesai?></td></td>
                                <td><?= $appointment->grup.' - '.$appointment->jenis_layanan?></td></td>
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

<!-- Modal Tambah appointment -->
<div class="modal fade" id="tambah_appointment_modal" tabindex="-1" role="dialog" aria-labelledby="edit_appointment_modal_Title" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_appointment_modal_Title">Tambah Data appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Id</label>
                    <input type="text" placeholder="Masukan Id Username (min. 6 karakter)" class="form-control" id="inputEmail4">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="text" placeholder="Masukan Password (min 8 karakter)" class="form-control" id="inputPassword4">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Nama appointment</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Masukan nama appointment">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Tambah</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Edit appointment -->
<?php foreach($list_appointment as $appointment) { ?>

<div class="modal fade" id="edit_appointment_modal_<?= $appointment->appointment_id ?>" tabindex="-1" role="dialog" aria-labelledby="edit_appointment_modal_Title" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_appointment_modal_Title">Edit Data appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Id</label>
                    <input disabled type="text" class="form-control" value="<?= $appointment->appointment_id ?>" id="inputEmail4">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input disabled type="text" value="Password hanya bisa diganti oleh appointment." class="form-control" id="inputPassword4">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Nama appointment</label>
                <input type="text" class="form-control" id="inputAddress" value="<?= $appointment->nama_appointment ?>" placeholder="Masukan nama appointment">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Hapus appointment (Dialog) -->
<div class="modal fade" id="hapus_appointment_modal_<?= $appointment->appointment_id ?>" tabindex="-1" role="dialog" aria-labelledby="hapus_appointment_modal_Title" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus data appointment ini ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="button" class="btn btn-primary">Ya</button>
      </div>
    </div>
  </div>
</div>

<?php }; ?>