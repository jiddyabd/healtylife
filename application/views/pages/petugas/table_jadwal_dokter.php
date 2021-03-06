<div class="row">
    <div class="col-md-12">
        <div class="card-container">
            <div class="card">
                <div class="card-header">
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Daftar Jadwal Kerja Dokter</b>
                        <div>
                            <button data-toggle="modal" data-target="#tambah_jadwal_dokter_modal" class="btn btn-primary">Tambah Jadwal Dokter</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Waktu Mulai</th>
                            <th scope="col">Waktu Selesai</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($list_jadwal_dokter) <= 0){ ?>
                            <tr>
                                <td class="text-center" colspan="5">Dokter ini belum memiliki jadwal kerja.</td>
                            </tr>
                            <?php }else{ ?>
                            <?php $table_number = ++$curr_page?>
                            <?php foreach($list_jadwal_dokter as $jadwal_dokter){?>
                            <tr>
                                <th scope="row"><?= $table_number++ ?></th>
                                <td><?= $jadwal_dokter->hari?></td>
                                <td><?= $jadwal_dokter->waktu_mulai?></td>
                                <td><?= $jadwal_dokter->waktu_selesai?></td>
                                <td>
                                    <button data-toggle="modal" data-target="#edit_jadwal_dokter_modal_<?= $jadwal_dokter->jadwal_id ?>" class="btn btn-primary">Edit</button>
                                    <button data-toggle="modal" data-target="#hapus_jadwal_dokter_modal_<?= $jadwal_dokter->jadwal_id ?>" class="btn btn-danger">Hapus</button>
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

<!-- Modal Tambah Jadwal Dokter -->
<div class="modal fade" id="tambah_jadwal_dokter_modal" tabindex="-1" role="dialog" aria-labelledby="tambah_jadwal_dokter_modal_Title" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah_jadwal_dokter_modal_Title">Tambah Data Dokter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url('petugas/tambah_jadwal')?>">
        <div class="modal-body">
            <div class="form-group">
                <label for="inputEmail4">Hari</label>
                <select name="hari" id="inputState" class="form-control">
                    <option value="" disabled selected>Pilih Hari</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputPassword4">Waktu Masuk</label>
                <input name="waktu_mulai" type="time" placeholder="Masukan Jam Masuk dengan format (hh:mm)" class="form-control" id="inputPassword4">
            </div>
            <div class="form-group">
                <label for="inputPassword4">Waktu Keluar</label>
                <input name="waktu_selesai" type="time" class="form-control" id="inputAddress" placeholder="Masukan Jam Keluar dengan format (hh:mm)">
            </div>
          </div>
          <input type="hidden" value="<?= $dokter_id?>" name="dokter_id"/>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit Dokter -->
<?php foreach($list_jadwal_dokter as $jadwal_dokter) { ?>

<div class="modal fade" id="edit_jadwal_dokter_modal_<?= $jadwal_dokter->jadwal_id ?>" tabindex="-1" role="dialog" aria-labelledby="edit_jadwal_dokter_modal_Title" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_jadwal_dokter_modal_Title">Edit Data Dokter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form method="post" action="<?=base_url('petugas/update_jadwal/'.$jadwal_dokter->jadwal_id.'/'.$dokter_id)?>">
        <div class="modal-body">
            <div class="form-group">
                <label for="inputEmail4">Hari</label>
                <select name="hari" value="<?= $jadwal_dokter->hari ?>" id="inputState" class="form-control">
                    <option disabled>Pilih Hari</option>
                    <option  value="Monday">Monday</option>
                    <option  value="Tuesday">Tuesday</option>
                    <option  value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option  value="Friday">Friday</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputPassword4">Waktu Masuk</label>
                <input name="waktu_mulai" type="time" value="<?= $jadwal_dokter->waktu_mulai ?>" placeholder="Masukan Jam Masuk dengan format (hh:mm)" class="form-control" id="inputPassword4">
            </div>
            <div class="form-group">
                <label for="inputPassword4">Waktu Keluar</label>
                <input name="waktu_selesai" type="time" value="<?= $jadwal_dokter->waktu_selesai ?>" class="form-control" id="inputAddress" placeholder="Masukan Jam Keluar dengan format (hh:mm)">
            </div>
            <input type="hidden" value="<?= $dokter_id?>" name="dokter_id"/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Hapus Dokter (Dialog) -->
<div class="modal fade" id="hapus_jadwal_dokter_modal_<?= $jadwal_dokter->jadwal_id ?>" tabindex="-1" role="dialog" aria-labelledby="hapus_dokter_modal_Title" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data Jadwal Dokter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus jadwal dokter ini ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <a href="<?=base_url('petugas/hapus_jadwal/'.$jadwal_dokter->jadwal_id.'/'.$dokter_id)?>" class="btn btn-primary">Ya</a>
      </div>
    </div>
  </div>
</div>

<?php }; ?>