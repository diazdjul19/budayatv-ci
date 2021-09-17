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
                    <div class="col">
                        <?php if (isset($proyek)) {
                            $value = $proyek->no_proyek;
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('no_proyek', 'NO Proyek', $value, 'text', 'form-group-default required', 'required', ['tabindex' => 1]); ?>

                        <?php if (isset($proyek)) {
                            $value = $proyek->no_dokumen_proyek;
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('no_dokumen_proyek', 'NO Dokumen', $value, 'text', 'form-group-default required', 'required', ['tabindex' => 1]); ?>

                        <?php if (isset($proyek)) {
                            $value = $proyek->no_spk_proyek;
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('no_spk_proyek', 'NO SPK', $value, 'text', 'form-group-default required', 'required', ['tabindex' => 1]); ?>

                        <?php if (isset($proyek)) {
                            if ($proyek->tgl_proyek != '1970-01-01') {
                                $value = tgl_indo($proyek->tgl_proyek);
                            } else {
                                $value = '';
                            }
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('tgl_proyek', 'Tanggal SPK', $value, 'text', 'form-group-default required', 'datep', ['tabindex' => 10]); ?>

                        <?php if (isset($proyek)) {
                            if ($proyek->tgl_proyek != '1970-01-01') {
                                $value = tgl_indo($proyek->selesai_proyek);
                            } else {
                                $value = '';
                            }
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('selesai_proyek', 'Tanggal Penyelesaian', $value, 'text', 'form-group-default required', 'datep', ['tabindex' => 10]); ?>

                        <?php if (isset($proyek)) {
                            $value = $proyek->retensi_proyek;
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('retensi_proyek', 'Masa Retensi', $value, 'text', 'form-group-default', '', ['tabindex' => 10]); ?>

                        <?php if (isset($proyek)) {
                            $value = $proyek->pic_proyek;
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('pic_proyek', 'PIC', $value, 'text', 'form-group-default', '', ['tabindex' => 10]); ?>

                    </div>
                </div>


                <br>
                <button class="btn btn-success" type="submit"> BQ <i class="fa fa-chevron-right ml-2"></i></button>
            </form>
        </div>
    </div>
</div>

