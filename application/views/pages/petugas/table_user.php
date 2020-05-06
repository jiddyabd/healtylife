<div class="row">
    <div class="col-md-12">
        <div class="card-container">
            <div class="card">
                <div class="card-header">
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Daftar Data User</b>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Id</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($list_user) <= 0){ ?>
                            <tr>
                                <td class="text-center" colspan="6">Immunihealth belum memiliki user.</td>
                            </tr>
                            <?php }else{ ?>
                            <?php $table_number = ++$curr_page?>
                            <?php foreach($list_user as $user){?>
                            <tr>
                                <th scope="row"><?= $table_number++ ?></th>
                                <td><?= $user->user_id?></td>
                                <td><?= $user->nama_user?></td>
                                <td><?= $user->email?></td>
                                <td><?= $user->no_telp?></td>
                                <td>
                                    <button data-toggle="modal" data-target="#hapus_user_modal_<?= $user->user_id ?>" class="btn btn-danger">Hapus</button>
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

<!-- Modal Edit user -->
<?php foreach($list_user as $user) { ?>
<!-- Modal Hapus user (Dialog) -->
<div class="modal fade" id="hapus_user_modal_<?= $user->user_id ?>" tabindex="-1" role="dialog" aria-labelledby="hapus_user_modal_Title" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus data user ini ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="button" class="btn btn-primary">Ya</button>
      </div>
    </div>
  </div>
</div>

<?php }; ?>