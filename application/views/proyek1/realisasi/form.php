<h1 class="text-center mb-5"><?php echo $judul ?></h1>

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
        <td>Rp <?php echo number_format($data->nilai_proyek, 2, ',', '.') ?></td>
    </tr>
    <tr>
        <td>No SPK</td>
        <td><?php echo $data->no_spk_proyek; ?></td>
        <td>Tanggal SPK</td>
        <td><?php echo tgl_indo($data->mulai_proyek, 'x', 9) ?></td>
    </tr>
    <tr>
        <td rowspan="2"><h5>Uang Muka</h5></td>
        <td rowspan="2">
            <h5>Rp <?php echo number_format($uang_muka->nominal_uang_muka, 2, ',', '.') ?></h5>
        </td>
        <td>Tanggal</td>
        <td><?php echo tgl_indo($uang_muka->tgl_uang_muka, 'x', 9) ?></td>
    </tr>
    <tr>
        <td>Tanggal Pertanggung Jawaban</td>
        <td><?php echo tgl_indo($uang_muka->jawab_uang_muka, 'x', 9) ?></td>
    </tr>
    <tr>
        <td colspan="2"><h5>Penarikan Uang Muka</h5></td>
        <td colspan="2">
            <h5 class="text-green bold">Rp <?php echo number_format(($uang_muka->tarik_uang_muka), 2, ',', '.') ?></h5>
        </td>
    </tr>
</table>

<div class="card card-default">
    <div class="card-block">
        <table class="table table-striped">
            <thead>
            <tr>
                <th width="20%">Tanggal</th>
                <th>Keterangan</th>
                <th width="30%">Nominal</th>
            </tr>
            </thead>
            <tbody>
            <form method="post" action="" role="form" class="myform" autocomplete="off" novalidate>
                <tr>
                    <td class="p-0">
                        <input type="text" class="form-control datep" name="tgl_realisasi" placeholder="Tanggal" value="<?php echo tgl_indo($uang_muka->jawab_uang_muka, 'angka', 9) ?>">
                    </td>
                    <td class="p-0">
                        <input type="text" class="form-control" name="ket_realisasi" placeholder="Keterangan">
                    </td>
                    <td class="p-0">
                        <input type="text" class="form-control inputmask" name="nominal_realisasi"
                               placeholder="Nominal">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="p-0"></td>
                    <td class="p-0">
                        <button class="btn btn-success btn-xs pull-right" type="submit"><i class="fa fa-check"></i>
                            Simpan
                        </button>
                    </td>
                </tr>
            </form>
            <?php
            if (count($list)) {
                foreach ($list as $l) {
                    ?>
                    <tr>
                        <td class="edit pl-1">
                            <a href="realisasi/hapus/<?php echo "$data->id_proyek/$uang_muka->id_uang_muka/$l->id_realisasi"; ?>" class="btn btn-danger btn-xs mr-2"><i class="fa fa-times"></i> </a>
                            <span><?php echo tgl_indo($l->tgl_realisasi,'x', 9); ?></span>
                            <input type="text" class="edit--date form-control hide" data-id="<?php echo $l->id_realisasi ?>" data-jenis="1" value="<?php echo tgl_indo($l->tgl_realisasi, 'angka', 0) ?>">
                        </td>
                        <td class="edit">
                            <span><?php echo $l->ket_realisasi; ?></span>
                            <input type="text" class="edit--input form-control hide" data-id="<?php echo $l->id_realisasi ?>" data-jenis="2" value="<?php echo $l->ket_realisasi ?>">
                        </td>
                        <td class="text-right edit">
                            <span>Rp <?php echo number_format(($l->nominal_realisasi), 2, ',', '.'); ?></span>
                            <input type="text" class="edit--input form-control inputmask hide" data-id="<?php echo $l->id_realisasi ?>" data-jenis="3" value="<?php echo number_format($l->nominal_realisasi, 0, ',', '.') ?>">
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2" class="text-right bg-yellow pt-0 pb-0"><h5>Total</h5></td>
                    <td class="bg-yellow pt-0 pb-0"><h5 class="bold text-right">Rp <?php echo number_format(($uang_muka->realiasi_total_uang_muka), 2, ',', '.') ?></h5></td>
                </tr>
            <?php } else { ?>
                <tr>
                    <td colspan="3">Tidak Ada Data</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <br>
        <a href="<?php echo "realisasi/proyek/$data->id_proyek"; ?>" class="btn btn-primary"><i class="fa fa-chevron-left mr-2"></i> Selesai </a>
    </div>
</div>