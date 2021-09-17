<h1 class="text-center mb-5">Pertanggung Jawaban Uang Muka Proyek</h1>

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
        <td class="bold">Rp <?php echo number_format($data->nilai_proyek, 2, ',', '.') ?></td>
    </tr>
    <tr>
        <td>No SPK</td>
        <td><?php echo $data->no_spk_proyek; ?></td>
        <td>Tanggal SPK</td>
        <td><?php echo tgl_indo($data->mulai_proyek, 'x', 9) ?></td>
    </tr>
</table>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th width="30%">keterangan</th>
            <th width="30%">Tanggal Pertanggung Jawaban</th>
            <th>Total Pertanggung Jawaban</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        foreach($list as $l){ ?>
            <tr>
                <td>
                    <?php if (has_permission('realisasi', 'add')) { ?>
                    <a href="realisasi/detail/<?php echo $l->proyek_id_uang_muka ?>/<?php echo $l->id_uang_muka ?>" class="btn btn-xs btn-primary"><i class="fa fa-long-arrow-right"></i> Detail</a>
                    Uang Muka <?php echo $no; ?>
                    <?php } ?>
                </td>
                <td><?php echo tgl_indo($l->jawab_uang_muka, 'x', 9) ?></td>
                <td class="text-right">
                    Rp <?php echo number_format($l->realiasi_total_uang_muka, 2, ',', '.') ?>
                </td>
            </tr>
        <?php $no++; } ?>
        </tbody>
    </table>
</div>