<div class="row">
    <div class="col-md-12">
        <div class="card-container">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Daftar Petugas</b>
                        <div>
                            <button data-toggle="modal" data-target="#tambah_petugas_modal" class="btn btn-primary">Tambah Petugas</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Id</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($list_petugas) <= 0){ ?>
                            <tr>
                                <td class="text-center" colspan="4">Immunihealth belum memiliki petugas.</td>
                            </tr>
                            <?php }else{ ?>
                            <?php $table_number = ++$curr_page?>
                            <?php foreach($list_petugas as $petugas){?>
                            <tr>
                                <th scope="row"><?= $table_number++ ?></th>
                                <td><?= $petugas->petugas_id?></td>
                                <td><?= $petugas->nama_petugas?></td>
                                <td>
                                    <button data-toggle="modal" data-target="#edit_petugas_modal_<?= $petugas->petugas_id ?>" class="btn btn-primary">Edit</button>
                                    <button data-toggle="modal" data-target="#hapus_petugas_modal_<?= $petugas->petugas_id ?>" class="btn btn-danger">Hapus</button>
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

<!-- Modal Tambah petugas -->
<div class="modal fade" id="tambah_petugas_modal" tabindex="-1" role="dialog" aria-labelledby="edit_petugas_modal_Title" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_petugas_modal_Title">Tambah Data petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url('petugas/tambah_petugas')?>">
        <div class="modal-body">
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="inputEmail4">Id</label>
                      <input type="text" placeholder="Masukan Id Username (min. 6 karakter)" class="form-control" name="petugas_id">
                  </div>
                  <div class="form-group col-md-6">
                      <label for="inputPassword4">Password</label>
                      <input type="password" placeholder="Masukan Password (min 8 karakter)" class="form-control" name="password">
                  </div>
                  <div class="form-group col-md-6">
                      <label for="inputPassword4">Confirm Password</label>
                      <input type="password" placeholder="Masukan Password (min 8 karakter)" class="form-control" name="cpassword">
                  </div>
              </div>
            <div class="form-group">
                <label for="inputAddress">Nama Petugas</label>
                <input type="text" class="form-control" name="nama_petugas" placeholder="Masukan nama Petugas">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal Edit petugas -->
<?php foreach($list_petugas as $petugas) { ?>

<div class="modal fade" id="edit_petugas_modal_<?= $petugas->petugas_id ?>" tabindex="-1" role="dialog" aria-labelledby="edit_petugas_modal_Title" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_petugas_modal_Title">Edit Data petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url('petugas/edit_petugas/'.$petugas->petugas_id)?>">
        <div class="modal-body">
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="inputEmail4">Id</label>
                      <input disabled value="<?= $petugas->petugas_id?>" type="text" placeholder="Masukan Id Username (min. 6 karakter)" class="form-control" name="petugas_id">
                  </div>
                  <div class="form-group col-md-6">
                      <label for="inputPassword4">Password</label>
                      <input type="password" disabled placeholder="Password hanya bisa diganti oleh petugas itu sendiri." class="form-control" name="password">
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputAddress">Nama Petugas</label>
                  <input value="<?= $petugas->nama_petugas?>" type="text" class="form-control" name="nama_petugas" placeholder="Masukan nama Petugas">
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

<!-- Modal Hapus petugas (Dialog) -->
<div class="modal fade" id="hapus_petugas_modal_<?= $petugas->petugas_id ?>" tabindex="-1" role="dialog" aria-labelledby="hapus_petugas_modal_Title" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus data petugas ini ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <a href="<?=base_url('petugas/hapus_petugas/'.$petugas->petugas_id)?>" class="btn btn-primary">Ya</a>
      </div>
    </div>
  </div>
</div>

<?php }; ?>