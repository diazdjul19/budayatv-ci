<?php if (count($spk)) { ?>

    <div class="col">
        <div class="card card-default">
            <div class="card-block">
                <h3>Pembayaran</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Detail</th>
                        <th width="110">(%)</th>
                        <th width="160">Tanggal</th>
                        <th width="160">Pembayaran</th>
                        <th>Dokumen</th>
                        <th width="80"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (count($progress)) {
                        $pg = 0;
                        foreach ($progress as $p) {
                            $pg += $p->persen_progress;
                            ?>
                            <tr>
                                <td class="padding-5"><?php echo $p->detail_progress ?></td>
                                <td>
                                    <?php if($p->status_progress == 1) { echo $p->real_progress."%";} ?>
                                </td>
                                <td>
                                    <?php if($p->status_progress == 1) {  ?>
                                        <?php echo tgl_indo($p->bayar_progress, 'x', 9)?> <br>
                                        <?php echo tgl_indo($p->approval_progress, 'x', 9)?>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if($p->status_progress == 1) {  ?>
                                        <?php echo number_format($p->nominal_bayar_progress, 2, '.','.')?> <br>
                                        <?php echo $p->rek_progress ?>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <?php if($p->status_progress == 1 && $p->file_progress != "") {  ?>
                                        <a href="pelaksanaan/download/<?php echo $p->id_progress ?>"><i class="fa fa-download mr-1"></i> Link</a>
                                    <?php } ?>
                                </td>
                                <td class="padding-5">
                                    <?php if($p->status_progress == 0) {?>
                                        <a href="" class="btn-xs btn btn-primary but-bayar" data-id="<?php echo $p->id_progress ?>"><i class="fa fa-chevron-right mr-1"></i> Bayar</a>
                                    <?php } else { ?>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php
                        } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="col">
        <h5>Tidak tercatat SPK</h5>
        <a href="pelaksanaan/spk/<?php echo $data->id_proyek ?>">Silahkan input SPK terlebih dahulu.</a>
    </div>

<?php } ?>
