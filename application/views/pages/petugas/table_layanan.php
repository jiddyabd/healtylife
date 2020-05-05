<div class="row">
    <div class="col-md-12">
        <div class="card-container">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Daftar Layanan</b>
                        <div>
                            <button data-toggle="modal" data-target="#tambah_layanan_modal" class="btn btn-primary">Tambah Layanan</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Jenis Layanan</th>
                            <th scope="col">Grup</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $table_number = ++$curr_page?>
                            <?php foreach($list_layanan as $layanan){?>
                            <tr>
                                <th scope="row"><?= $table_number++ ?></th>
                                <td><?= $layanan->jenis_layanan?></td>
                                <td><?= $layanan->grup?></td>
                                <td>
                                    <button data-toggle="modal" data-target="#edit_layanan_modal_<?= $layanan->layanan_id ?>" class="btn btn-primary">Edit</button>
                                    <button data-toggle="modal" data-target="#hapus_layanan_modal_<?= $layanan->layanan_id ?>" class="btn btn-danger">Hapus</button>
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

<!-- Modal Tambah layanan -->
<div class="modal fade" id="tambah_layanan_modal" tabindex="-1" role="dialog" aria-labelledby="edit_layanan_modal_Title" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_layanan_modal_Title">Tambah Data layanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url('petugas/tambah_layanan')?>">
        <div class="modal-body">
              <div class="form-group">
                  <label for="inputEmail4">Jenis Layanan</label>
                  <input name="jenis_layanan" type="text" class="form-control" id="inputEmail4">
              </div>
              <div class="form-group">
                  <label for="inputPassword4">Grup Layanan</label>
                  <input name="grup" type="text" class="form-control" id="inputPassword4">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>`
      </form>
    </div>
  </div>
</div>
<!-- Modal Edit layanan -->
<?php foreach($list_layanan as $layanan) { ?>

<div class="modal fade" id="edit_layanan_modal_<?= $layanan->layanan_id ?>" tabindex="-1" role="dialog" aria-labelledby="edit_layanan_modal_Title" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_layanan_modal_Title">Edit Data layanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url('petugas/edit_layanan/'.$layanan->layanan_id)?>">
        <div class="modal-body">
              <div class="form-group">
                  <label for="inputEmail4">Jenis Layanan</label>
                  <input value="<?=$layanan->jenis_layanan?>" name="jenis_layanan" type="text" class="form-control" id="inputEmail4">
              </div>
              <div class="form-group">
                  <label for="inputPassword4">Grup Layanan</label>
                  <input value="<?=$layanan->grup?>"name="grup" type="text" class="form-control" id="inputPassword4">
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

<!-- Modal Hapus layanan (Dialog) -->
<div class="modal fade" id="hapus_layanan_modal_<?= $layanan->layanan_id ?>" tabindex="-1" role="dialog" aria-labelledby="hapus_layanan_modal_Title" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data layanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus data layanan ini ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <a href="<?=base_url('petugas/hapus_layanan/'.$layanan->layanan_id)?>" class="btn btn-primary">Ya</a>
      </div>
    </div>
  </div>
</div>

<?php }; ?>