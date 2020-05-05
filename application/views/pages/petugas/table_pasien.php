<div class="row">
    <div class="col-md-12">
        <div class="card-container">
            <div class="card">
                <div class="card-header">
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Daftar Data Pasien</b>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Jenis Kelamin</th>
                            <!-- <th scope="col">Aksi</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $table_number = ++$curr_page?>
                            <?php foreach($list_pasien as $pasien){?>
                            <tr>
                                <th scope="row"><?= $table_number++ ?></th>
                                <td><?= $pasien->nama_pasien?></td>
                                <td><?= $pasien->tanggal_lahir?></td>
                                <td><?= $pasien->jenis_kelamin?></td>
                                <!-- <td>
                                    <button data-toggle="modal" data-target="#hapus_pasien_modal_<?= $pasien->pasien_id ?>" class="btn btn-danger">Hapus</button>
                                </td> -->
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

<!-- Modal Edit pasien -->
<?php foreach($list_pasien as $pasien) { ?>
<!-- Modal Hapus pasien (Dialog) -->
<div class="modal fade" id="hapus_pasien_modal_<?= $pasien->pasien_id ?>" tabindex="-1" role="dialog" aria-labelledby="hapus_pasien_modal_Title" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data pasien</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus data pasien ini ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="button" class="btn btn-primary">Ya</button>
      </div>
    </div>
  </div>
</div>

<?php }; ?>