<h1 class="text-center mb-5">Progres Proyek (<?php echo $data->progres_proyek ?>%)</h1>

<table class="table mb-1">
    <tr>
        <td>No Dokumen</td>
        <td><?php echo $data->no_dokumen_proyek; ?></td>
        <td>Pemberi Kerja</td>
        <td><?php echo $data->nama_klien ?></td>
    </tr>
    <tr>
        <td>No Proyek</td>
        <td><?php echo $data->no_proyek; ?></td>
        <td>Nilai Proyek</td>
        <td class="bold">Rp <?php echo number_format($data->nilai_proyek, 0, ',', '.') ?></td>
    </tr>
    <tr>
        <td>No SPK</td>
        <td><?php echo $data->no_spk_proyek; ?></td>
        <td>Tanggal SPK</td>
        <td><?php echo tgl_indo($data->mulai_proyek, 'x', 9) ?></td>
    </tr>
</table>

<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th rowspan="2">Nama</th>
            <th colspan="2" width="20%" class="text-center">Progres(%)</th>
            <th colspan="2" width="25%" class="text-center">Tanggal</th>
            <th rowspan="2" width="15%"></th>
            <th rowspan="2"></th>
            <th rowspan="2" width="7%"></th>
        </tr>
        <tr>
            <th>Renc.</th>
            <th>Real</th>
            <th>Renc.</th>
            <th>Real</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $noy = 1;
        $nox = 1;
        $tgl = date('Y-m-d');
        foreach ($list as $l) {
            $cek = $progress_model->get_data($data->id_proyek, $l->id_penagihan);
            $max = count($progress_model->get_proyek($data->id_proyek));


            ?>
            <tr>
                <td>
                    <?php
                    if ($l->tipe_penagihan == 1) {
                        echo "Penagihan DP";
                    } elseif ($l->tipe_penagihan == 2) {
                        echo "Penagihan Prestasi $no";
                        $no++;
                    } elseif ($l->tipe_penagihan == 3) {
                        echo "Penagihan Final";
                    } else {
                        echo "Penagihan Retensi";
                    }
                    ?>
                </td>
                <td><?php if ($l->tipe_penagihan != 1) echo "$l->persen_penagihan %"; ?></td>

                <?php
                $ubah = '';
                if(has_permission('progress','edit')){
                    $ubah = 'ubah';
                }
                ?>

                <td data-id="<?php echo $l->id_penagihan ?>" class="<?php echo $ubah ?>
                <?php
                if ($cek) {
                    if ($l->persen_penagihan > $cek->persen_progress) {
                        echo "text-danger";
                    }
                }
                ?>
                    ">
                    <?php
                    if ($l->tipe_penagihan != 1) {
                        if ($cek) {
                            echo "$cek->persen_progress %";
                        }
                    }
                    ?>
                </td>
                <td><?php echo tgl_indo($l->tgl_penagihan, 'x', 9) ?></td>
                <td class="
                <?php
                if ($cek) {
                    if ($l->tgl_penagihan < $cek->tgl_progress) {
                        echo "text-danger";
                    }
                }
                ?>
                    ">
                    <?php
                    if ($cek) {
                        echo tgl_indo($cek->tgl_progress, 'x', 9);
                    }
                    ?>
                </td>
                <td></td>
                <td>
                    <?php
                    if ($cek) {
                        if ($cek->bast_progress == 1) {
                            $file = $uf_model->get_file('bast', $data->id_proyek, $l->id_penagihan);
                            ?>
                            <a href="progress/pdf/<?php echo $file->id_uf ?>" target="_blank"
                               onclick="window.open('progress/pdf/<?php echo $file->id_uf ?>','BAST <?php echo $data->nama_proyek ?>','height=550,width=650,top=0,left=0,status=no,addressbar=no,menubar=no,scrollbars=yes')"><?php echo $file->nama_uf ?></a>
                            <?php
                        }
                    } ?>
                </td>
                <td>
                    <?php
                    if ($cek) {
                        if ($max == 1) { ?>
                            <a href="progress/hapus/<?php echo $cek->id_progress ?>/<?php echo $data->id_proyek ?>"
                               class="btn btn-danger btn-md" disabled><i class="fa fa-times"></i></a>
                        <?php } else {
                            if ($noy == $max) {
                                ?>
                                <a href="progress/hapus/<?php echo $cek->id_progress ?>/<?php echo $data->id_proyek ?>"
                                   class="btn btn-danger btn-md" disabled><i class="fa fa-times"></i></a>
                            <?php }
                        } ?>
                    <?php } ?>
                </td>
            </tr>

            <?php
            $hide = 'hide';
            if (!$cek) {
                $hide = '';
            }
                ?>
                <form data-id="<?php echo $l->id_penagihan ?>" class="<?php echo $hide ?>" method="post" action="progress/save" enctype="multipart/form-data">
                    <input type="hidden" name="proyek_id_progress" value="<?php echo $data->id_proyek ?>">
                    <input type="hidden" name="penagihan_id_progress" value="<?php echo $l->id_penagihan ?>">
                    <tr data-id="<?php echo $l->id_penagihan ?>" class="<?php echo $hide ?>">

                        <td></td>
                        <td colspan="2">
                            <?php if ($l->tipe_penagihan != 1) { ?>
                                <div class="input-group">
                                    <input type="text" name="persen_progress" class="form-control inputmask"
                                           placeholder="progres(%)"
                                           value="<?php echo $l->persen_penagihan ?>" <?php if ($nox != 1) echo "disabled"; ?>>
                                    <span class="input-group-addon">%</span>
                                </div>
                            <?php } ?>
                        </td>
                        <td colspan="2">
                            <input type="text" name="tgl_progress" class="form-control datep" placeholder="Tanggal"
                                   value="<?php echo tgl_indo($tgl) ?>" <?php if ($nox != 1) echo "disabled"; ?>>
                        </td>
                        <td>
                            <?php if ($l->tipe_penagihan != 1){ ?>
                            <input type="checkbox" value="1" name="bast_progress" data-init-plugin="switchery"
                                   data-size="small" data-color="success" <?php if ($nox != 1) echo "disabled"; ?>>
                            <label class="m-l-10">BAST</label>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if ($l->tipe_penagihan != 1){ ?>

                                <input type="file" name="file" <?php if ($nox != 1) echo "disabled"; ?>>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if ($nox == 1) { ?>
                                <button type="submit" class="btn btn-primary btn-md"><i class="fa fa-check"></i>
                                </button>
                            <?php } else { ?>
                                <button type="submit" class="btn btn-primary btn-md" disabled><i
                                            class="fa fa-check"></i></button>
                            <?php } ?>
                        </td>
                    </tr>
                </form>
                <?php //$nox++;
            if ($cek) {
                $noy++;
            }
        } ?>
        </tbody>
    </table>
</div>