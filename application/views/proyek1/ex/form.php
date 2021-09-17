<div class="col">
    <div class="card card-primary">
        <div class="bg-primary-lighter">
            <h1 class="m-0 text-center bold">STLP</h1>
            <p class="text-center">Status & Time Line Project</p>
        </div>
        <p class="bg-primary-darker text-white"><i class="fa fa-caret-right ml-5 mr-2"></i> SPK</p>


        <div class="card-block">
            <form method="post" action="" role="form" class="myform mt-2" autocomplete="off" novalidate>
                <div class="row">
                    <div class="col p-0">
                        <?php if (isset($data)) {
                            $value = $data->no_proyek;
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('no_proyek', 'NO Proyek', $value, 'text', 'form-group-default', 'required', ['tabindex' => 1]); ?>
                    </div>
                    <div class="col p-0">
                        <?php if (isset($data)) {
                            $value = $data->no_dokumen_proyek;
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('no_dokumen_proyek', 'NO Dokumen', $value, 'text', 'form-group-default', 'required', ['tabindex' => 1]); ?>
                    </div>
                </div>


                <?php if (isset($data)) {
                    $value = $data->nama_proyek;
                } else {
                    $value = '';
                }; ?>
                <?php echo render_input('nama_proyek', 'Nama Pekerjaan', $value, 'text', 'form-group-default required', 'required', ['tabindex' => 1]); ?>

                <div class="form-group form-group-default ">
                    <label>Pemberi Kerja</label>
                    <select name="klien_id_proyek" class="form-control">
                        <option value="">Semua Klien</option>
                        <?php foreach($list_klien as $lc){ ?>
                            <option value="<?php echo $lc->id_klien ?>"><?php echo $lc->nama_klien; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group form-group-default ">
                    <label>Tipe Pekerjaan</label>
                    <select name="tipe_proyek" class="form-control">
                        <option value="1">Tender</option>
                        <option value="2">Penunjukan Langsung</option>
                    </select>
                </div>

                <?php if (isset($data)) {
                    $value = $data->no_spk_proyek;
                } else {
                    $value = '';
                }; ?>
                <?php echo render_input('no_spk_proyek', 'NO SPK', $value, 'text', 'form-group-default required', 'required', ['tabindex' => 1]); ?>


                <?php if (isset($data)) {
                    if ($data->tgl_proyek != '1970-01-01') {
                        $value = tgl_indo($data->tgl_proyek);
                    } else {
                        $value = '';
                    }
                } else {
                    $value = '';
                }; ?>
                <?php echo render_input('tgl_proyek', 'Tanggal SPK', $value, 'text', 'form-group-default required', 'datep', ['tabindex' => 10]); ?>

                <?php if (isset($data)) {
                    if ($data->tgl_proyek != '1970-01-01') {
                        $value = tgl_indo($data->selesai_proyek);
                    } else {
                        $value = '';
                    }
                } else {
                    $value = '';
                }; ?>
                <?php echo render_input('selesai_proyek', 'Tanggal Rencana Penyelesaian', $value, 'text', 'form-group-default required', 'datep', ['tabindex' => 10]); ?>

                <?php if (isset($data)) {
                    $value = $data->retensi_proyek;
                } else {
                    $value = '';
                }; ?>
                <?php echo render_input('retensi_proyek', 'Masa Retensi', $value, 'text', 'form-group-default', '', ['tabindex' => 10]); ?>

                <?php if (isset($data)) {
                    $value = $data->pic_proyek;
                } else {
                    $value = '';
                }; ?>
                <?php echo render_input('pic_proyek', 'PIC', $value, 'text', 'form-group-default', '', ['tabindex' => 10]); ?>

                <?php if (isset($data)) {
                    $value = $data->nilai_proyek;
                } else {
                    $value = '';
                }; ?>
                <?php echo render_input('nilai_proyek', 'Nilai Proyek', $value, 'text', 'form-group-default', 'inputmask', ['tabindex' => 10]); ?>


                <br>
                <button class="btn btn-success" type="submit"> BQ <i class="fa fa-chevron-right ml-2"></i></button>
            </form>
        </div>
    </div>
</div>

