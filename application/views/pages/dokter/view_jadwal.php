<div class="row">
    <div class="col-md-12">
        <div class="card-container">
            <div class="card">
                <div class="card-header">
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Daftar Jadwal Kerja Dokter</b>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($list_jadwal_dokter) <= 0){ ?>
                            <tr>
                                <td class="text-center" colspan="4">Anda belum memiliki jadwal kerja.</td>
                            </tr>
                            <?php }else{ ?>
                            <?php $table_number = ++$curr_page?>
                            <?php foreach($list_jadwal_dokter as $jadwal_dokter){?>
                            <tr>
                                <th scope="row"><?= $table_number++ ?></th>
                                <td><?= $jadwal_dokter->hari?></td>
                                <td><?= $jadwal_dokter->waktu_mulai?></td>
                                <td><?= $jadwal_dokter->waktu_selesai?></td>
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