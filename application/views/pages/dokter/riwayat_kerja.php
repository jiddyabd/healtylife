<div class="row">
    <div class="col-md-12">
        <div class="card-container">
            <div class="card">
                <div class="card-header">
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Riwayat Appointment</b>
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
                            <th scope="col">Waktu Kerja</th>
                            <th scope="col">Layanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($list_appointment) <= 0){ ?>
                            <tr>
                                    <td class="text-center" colspan="8">Anda belum memiliki riwayat kerja.</td>
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
                                    <?= $appointment->hari.', '.$appointment->waktu_mulai.' - '.$appointment->waktu_selesai?>
                                </td>
                                <td>
                                    <?= $appointment->grup.' - '.$appointment->jenis_layanan?>
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