<table class="table mb-5">
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
        <td class="bold">Rp <?php echo number_format($data->nilai_proyek, 2, ',', '.') ?></td>
    </tr>
    <tr>
        <td>No SPK</td>
        <td><?php echo $data->no_spk_proyek; ?></td>
        <td>Tanggal SPK</td>
        <td><?php echo tgl_indo($data->mulai_proyek, 'x', 9) ?></td>
    </tr>
</table>

<h1 class="text-center">Penarikan Uang Muka Proyek</h1>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th width="17%">keterangan</th>
            <th width="15%">Tanggal</th>
            <th width="15%">Rencana Pertanggung Jawaban</th>
            <th>Rencana Nominal</th>
            <th>Tarik Nominal</th>
            <th>Sisa</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        foreach ($list as $l) {
            ?>
            <tr>
                <td>
                    <?php if (has_permission('uang_muka', 'add')) { ?>
                    <a href="uang_muka/form/<?php echo $data->id_proyek ?>/<?php echo $l->id_uang_muka ?>"
                       class="btn btn-primary mr-1" rel='tooltip' data-original-title='Tarik Uang Muka'><i
                                class="fa fa-plus"></i></a>
                    <?php } ?>
                    Uang Muka <?php echo $no; ?>
                </td>
                <td>
                    <?php echo tgl_indo($l->tgl_uang_muka, 'x', 9) ?>
                </td>
                <td>
                    <?php echo tgl_indo($l->jawab_uang_muka, 'x', 9) ?>
                </td>
                <td class="text-right">
                    Rp <?php echo number_format($l->nominal_uang_muka, 2, ',', '.') ?>
                </td>
                <td class="text-right">
                    Rp <?php echo number_format($l->tarik_uang_muka, 2, ',', '.') ?>
                </td>
                <td class="text-right">
                    Rp <?php echo number_format(($l->nominal_uang_muka - $l->tarik_uang_muka), '2', ',', '.'); ?>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <?php
                    $tarik = $this->db
                        ->where('uang_muka_id_tarik', $l->id_uang_muka)
                        ->order_by('tgl_uang_muka_tarik', 'asc')
                        ->get('uang_muka_tarik')
                        ->result();

                    if (count($tarik)) {
                        ?>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Kepada</th>
                                <th>Nominal</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($tarik as $t){ ?>
                                <tr>
                                    <td>
                                        <?php if (has_permission('uang_muka', 'edit')) { ?>
                                            <a href="uang_muka/form/<?php echo $data->id_proyek ?>/<?php echo $l->id_uang_muka ?>/<?php echo $t->id_uang_muka_tarik ?>"
                                               class="btn btn-primary mr-1" rel='tooltip' data-original-title='Edit Tarik Uang Muka'><i
                                                        class="fa fa-pencil"></i></a>
                                        <?php } ?>
                                        <?php if (has_permission('uang_muka', 'delete')) { ?>
                                            <a href="uang_muka/hapus/<?php echo $data->id_proyek ?>/<?php echo $l->id_uang_muka ?>/<?php echo $t->id_uang_muka_tarik ?>"
                                               class="btn btn-danger mr-1" rel='tooltip' data-original-title='Hapus Tarik Uang Muka'><i
                                                        class="fa fa-times"></i></a>
                                        <?php } ?>
                                        <?php echo tgl_indo($t->tgl_uang_muka_tarik, 'x', 9) ?>
                                    </td>
                                    <td><?php echo $t->kepada_uang_muka_tarik ?></td>
                                    <td class="text-right">Rp <?php echo number_format($t->nominal_uang_muka_tarik, 0, ',', '.')?></td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>

                    <?php } ?>
                </td>
            </tr>


        <?php $no++; } ?>
        </tbody>
    </table>
</div>