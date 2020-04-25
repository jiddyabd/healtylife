<div class="row">
    <div class="col-md-12">
        <div class="card-container">
            <div class="card">
                <div class="card-header">
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Daftar Dokter</b>
                        <div>
                            <button data-toggle="modal" data-target="#tambah_dokter_modal" class="btn btn-primary">Tambah Dokter</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jadwal</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $table_number = ++$curr_page?>
                            <?php foreach($list_dokter as $dokter){?>
                            <tr>
                                <th scope="row"><?= $table_number++ ?></th>
                                <td><?= $dokter->dokter_id?></td>
                                <td><?= $dokter->nama_dokter?></td>
                                <td>
                                    <a class="btn btn-dark" href="<?=base_url('petugas/jadwal_dokter/'.$dokter->dokter_id)?>">Lihat Jadwal</a>
                                </td>
                                <td>
                                    <button data-toggle="modal" data-target="#edit_dokter_modal_<?= $dokter->dokter_id ?>" class="btn btn-primary">Edit</button>
                                    <button data-toggle="modal" data-target="#hapus_dokter_modal_<?= $dokter->dokter_id ?>" class="btn btn-danger">Hapus</button>
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

<!-- Modal Tambah Dokter -->
<div class="modal fade" id="tambah_dokter_modal" tabindex="-1" role="dialog" aria-labelledby="edit_dokter_modal_Title" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_dokter_modal_Title">Tambah Data Dokter</h5>
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
                <label for="inputAddress">Nama Dokter</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Masukan nama dokter">
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
<!-- Modal Edit Dokter -->
<?php foreach($list_dokter as $dokter) { ?>

<div class="modal fade" id="edit_dokter_modal_<?= $dokter->dokter_id ?>" tabindex="-1" role="dialog" aria-labelledby="edit_dokter_modal_Title" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_dokter_modal_Title">Edit Data Dokter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Id</label>
                    <input disabled type="text" class="form-control" value="<?= $dokter->dokter_id ?>" id="inputEmail4">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input disabled type="text" value="Password hanya bisa diganti oleh dokter." class="form-control" id="inputPassword4">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Nama Dokter</label>
                <input type="text" class="form-control" id="inputAddress" value="<?= $dokter->nama_dokter ?>" placeholder="Masukan nama dokter">
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

<!-- Modal Hapus Dokter (Dialog) -->
<div class="modal fade" id="hapus_dokter_modal_<?= $dokter->dokter_id ?>" tabindex="-1" role="dialog" aria-labelledby="hapus_dokter_modal_Title" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data Dokter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus data dokter ini ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="button" class="btn btn-primary">Ya</button>
      </div>
    </div>
  </div>
</div>

<?php }; ?>