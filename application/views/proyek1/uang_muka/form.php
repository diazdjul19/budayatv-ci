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
            <h5>Rp <?php echo number_format($uang_muka->nominal_uang_muka, 2, ',', '.')?></h5>
        </td>
        <td>Tanggal</td>
        <td><?php echo tgl_indo($uang_muka->tgl_uang_muka, 'x', 9)?></td>
    </tr>
    <tr>
        <td>Tanggal Pertanggung Jawaban</td>
        <td><?php echo tgl_indo($uang_muka->jawab_uang_muka, 'x', 9)?></td>
    </tr>
    <tr>
        <td><h5>Sisa Uang Muka</h5></td>
        <td colspan="2">
            <h5 class="text-green bold">Rp <?php echo number_format(($uang_muka->nominal_uang_muka - $uang_muka->tarik_uang_muka), 2, ',', '.')?></h5>
        </td>
        <td></td>
    </tr>
</table>

<div class="card card-default">
    <div class="card-block">
        <form method="post" action="" role="form" class="myform" autocomplete="off" novalidate>
            <div class="row">
                <div class="col">
                    <h3 class="mb-5"><?php echo $judul ?></h3>
                    <?php if (isset($edit)) {
                        $value = tgl_indo($edit->tgl_uang_muka_tarik, 'angka', 9);
                    } else {
                        $value = tgl_indo($uang_muka->tgl_uang_muka, 'angka', 9);
                    }; ?>
                    <?php echo render_input('tgl_uang_muka_tarik', 'Tanggal', $value, 'text', 'form-group-default', 'datep'); ?>

                    <?php if (isset($edit)) {
                        $value = $edit->kepada_uang_muka_tarik;
                    } else {
                        $value = '';
                    }; ?>
                    <?php echo render_input('kepada_uang_muka_tarik', 'Kepada', $value, 'text', 'form-group-default', ''); ?>

                    <?php if (isset($edit)) {
                        $value = $edit->nominal_uang_muka_tarik;
                    } else {
                        $value = '';
                    }; ?>
                    <?php echo render_input('nominal_uang_muka_tarik', 'Nominal', $value, 'text', 'form-group-default', 'inputmask'); ?>

                    <?php if (isset($edit)) {
                        $value = $edit->ket_uang_muka_tarik;
                    } else {
                        $value = '';
                    }; ?>
                    <?php echo render_input('ket_uang_muka_tarik', 'Keterangan', $value, 'text', 'form-group-default', ''); ?>

                </div>
            </div>
            <br>
            <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Simpan</button>
            <a href="<?php if(isset($_SERVER['HTTP_REFERER'])) echo $_SERVER['HTTP_REFERER']; else echo"proyek"; ?>" class="btn btn-default"> Batal <i class="fa fa-times"></i></a>
        </form>
    </div>
</div>