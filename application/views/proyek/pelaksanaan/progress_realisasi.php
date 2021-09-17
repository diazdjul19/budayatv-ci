<?php if (count($spk)) { ?>

    <div class="col">
        <div class="card card-default">
            <div class="card-block">
                <h3>Realisasi Progress</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Detail</th>
                        <th width="160">Deadline</th>
                        <th width="120">Rencana</th>
                        <th width="160">Realisasi</th>
                        <th width="120">Deviasi</th>
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
                                <td><?php echo $p->detail_progress ?></td>
                                <td><?php echo tgl_indo($p->tgl_progress, 'x', 9) ?></td>
                                <td class="text-right"><?php echo number_format($pg,4, ',', '.') ?> %</td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" value="<?php if($p->real_progress != 0) echo $p->real_progress  ?>" class="form-control fpg" data-id="<?php echo $p->id_progress ?>" data-pg="<?php echo $pg ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="font-size: 13px">%</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="deviasi" data-id="<?php echo $p->id_progress ?>" ><?php if($p->real_progress != 0.0000) echo "$p->deviasi_progress %";  ?></td>
                            </tr>
                            <?php
                        } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
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
