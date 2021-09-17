<?php if (count($spk)) { ?>

    <div class="col">
        <div class="card card-default mt-4">
            <div class="card-block">
                <h3>Progress</h3>

                <form action="" method="post">
                    <input type="hidden" name="spk_id_progress" value="<?php echo $s->id_spk ?>">
                    <input type="hidden" name="tipe_progress" value="3">
                    <div class="form-group form-group-default">
                        <?php
                        if (isset($edit)) {
                            $val = $edit->detail_progress;
                        } else {
                            $val = '';
                        }
                        ?>
                        <label for="">Detail</label>
                        <input type="text" name="detail_progress" class="form-control" value="<?php echo $val ?>">
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group form-group-default">
                                <?php
                                if (isset($edit)) {
                                    $val = $edit->persen_progress;
                                } else {
                                    $val = '';
                                }
                                ?>
                                <label for="">Persentase</label>
                                <input type="text" name="persen_progress" class="form-control"
                                       value="<?php echo $val ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group form-group-default">
                                <?php
                                if (isset($edit)) {
                                    $val = tgl_indo($edit->tgl_progress, 'angka', 9);
                                } else {
                                    $val = '';
                                }
                                ?>
                                <label for="">Deadline</label>
                                <input type="text" name="tgl_progress" class="form-control datep"
                                       value="<?php echo $val ?>">
                            </div>
                        </div>
                    </div>
                    <?php if (isset($edit)) { ?>
                        <a href="pelaksanaan/progress/<?php echo $data->id_proyek ?>" class="btn btn-default"><i
                                    class="fa fa-chevron-left mr-2"></i> Batal</a>
                    <?php } ?>

                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-check mr-2"></i>
                        Simpan
                    </button>
                </form>
            </div>
        </div>

        <div class="card card-default">
            <div class="card-block">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Detail</th>
                        <th width="120">Progress</th>
                        <th width="200">Deadline</th>
                        <th width="100"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (count($progress)) {
                        $pg = 0;
                        foreach ($progress as $p) {
                            ?>
                            <tr>
                                <td><?php echo $p->detail_progress ?></td>
                                <td class="text-right"><?php echo $p->persen_progress ?>%</td>
                                <td><?php echo tgl_indo($p->tgl_progress, 'x', 9) ?></td>
                                <td>
                                    <a href="pelaksanaan/progress/<?php echo $data->id_proyek ?>/<?php echo $p->id_progress ?>"
                                       class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> </a>
                                    <a href="pelaksanaan/progress_del/<?php echo $p->id_progress ?>/<?php echo $data->id_proyek ?>"
                                       class="btn btn-warning btn-xs"><i class="fa fa-times"></i> </a>
                                </td>
                            </tr>
                            <?php $pg += $p->persen_progress;
                        } ?>
                        <tr>
                            <td class="text-right bold">Total :</td>
                            <td class="text-right bold"><?php echo $pg ?>%</td>
                            <td></td>
                            <td></td>
                        </tr>
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
