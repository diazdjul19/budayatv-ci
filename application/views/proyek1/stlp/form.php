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
                        <?php echo render_input('no_dokumen_proyek', 'NO STLP', $value, 'text', 'form-group-default', 'required', ['tabindex' => 1]); ?>
                    </div>
                </div>


                <?php if (isset($data)) {
                    $value = $data->nama_proyek;
                } else {
                    $value = '';
                }; ?>
                <?php echo render_input('nama_proyek', 'Nama Pekerjaan', $value, 'text', 'form-group-default required', 'required', ['tabindex' => 1]); ?>


                <?php if (isset($data)) {
                    $value = $data->klien_id_proyek;
                } else {
                    $value = '';
                }; ?>
                <div class="form-group form-group-default ">
                    <label>Pemberi Kerja</label>
                    <select name="klien_id_proyek" class="selectpicker form-control" data-live-search="true" data-size="5">
                        <option value="">Semua Klien</option>
                        <?php foreach($list_klien as $lc){ ?>
                            <option value="<?php echo $lc->id_klien ?>" <?php if($lc->id_klien == $value){ echo " selected";}?>><?php echo $lc->nama_klien; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <?php if (isset($data)) {
                    $value = $data->tipe_proyek;
                } else {
                    $value = '';
                }; ?>
                <div class="form-group form-group-default ">
                    <label>Tipe Pekerjaan</label>
                    <select name="tipe_proyek" class="form-control">
                        <option value="1" <?php if($value == 1) echo " selected ";?>>Tender</option>
                        <option value="2" <?php if($value == 2) echo " selected ";?>>Penunjukan Langsung</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col p-0">
                        <?php if (isset($data)) {
                            $value = $data->no_spk_proyek;
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('no_spk_proyek', 'NO SPK', $value, 'text', 'form-group-default required', 'required', ['tabindex' => 1]); ?>

                    </div>
                    <div class="col p-0">
                        <?php if (isset($data)) {
                            $value = tgl_indo($data->tgl_spk_proyek, 'x', 9);
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('tgl_spk_proyek', 'Tanggal SPK', $value, 'text', 'form-group-default required', 'datep', ['tabindex' => 1]); ?>

                    </div>
                </div>

                <?php if (isset($data)) {
                    if ($data->tgl_proyek != '1970-01-01') {
                        $value = tgl_indo($data->tgl_proyek);
                    } else {
                        $value = '';
                    }
                } else {
                    $value = '';
                }; ?>

                <?php echo render_input('tgl_proyek', 'Tanggal Mulai Pekerjaan', $value, 'text', 'form-group-default required', 'datep', ['tabindex' => 10]); ?>

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

                <div class="row">
                    <div class="col p-0">
                        <?php if (isset($data)) {
                            $value = $data->retensi_proyek;
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('retensi_proyek', 'Masa Retensi', $value, 'text', 'form-group-default', '', ['tabindex' => 10]); ?>
                    </div>
                    <div class="col p-0">
                        <?php if (isset($data)) {
                            if($data->tgl_retensi_proyek != '0000-00-00'){
                                $value = tgl_indo($data->tgl_retensi_proyek, 'x', 9);
                            }else{
                                $value = '';
                            }
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('u_tgl_retensi_proyek', 'Tanggal Akhir Masa Retensi', $value, 'text', 'form-group-default', 'text-primary', ['readonly' => true]); ?>
                    </div>
                </div>

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

                <?php if (isset($data)) {
                    $value = $data->ppn_proyek;
                } else {
                    $value = '';
                }; ?>
                <?php echo render_input('ppn_proyek', 'PPn 10%', $value, 'text', 'form-group-default', 'inputmask text-primary', ['readonly' => true]); ?>

                <?php if (isset($data)) {
                    $value = $data->in_ppn_proyek;
                } else {
                    $value = '';
                }; ?>
                <?php echo render_input('in_ppn_proyek', 'Nilai dikurangi PPn', $value, 'text', 'form-group-default', 'inputmask text-primary', ['readonly' => true]); ?>

                <?php if (isset($data)) {
                    $value = $data->pph_proyek;
                } else {
                    $value = '';
                }; ?>
                <?php echo render_input('pph_proyek', 'PPh Psl 4(2)(3% dari nilai proyek dikurangi PPn)', $value, 'text', 'form-group-default', 'inputmask text-primary', ['readonly' => true]); ?>

                <?php if (isset($data)) {
                    $value = $data->net_proyek;
                } else {
                    $value = '';
                }; ?>
                <?php echo render_input('net_proyek', 'Nilai Proyek (NET)', $value, 'text', 'form-group-default', 'inputmask text-primary', ['readonly' => true]); ?>


                <div class="row">
                    <div class="col p-0">
                        <?php if (isset($data)) {
                            $value = $data->group_bisnis_proyek;
                        } else {
                            $value = '';
                        }; ?>
                        <div class="form-group form-group-default ">
                            <label>Group Bisnis</label>
                            <select name="group_bisnis_proyek" class="form-control">
                                <?php foreach($list_gb as $gb){ ?>
                                <option value="<?php echo $gb->id_group_bisnis ?>" <?php if($value == $gb->id_group_bisnis) echo " selected ";?>><?php echo $gb->nama_group_bisnis ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col p-0">
                        <?php if (isset($data)) {
                            $value = $data->cabang_bisnis_proyek;
                        } else {
                            $value = '';
                        }; ?>
                        <div class="form-group form-group-default ">
                            <label>Cabang</label>
                            <select name="cabang_bisnis_proyek" class="form-control">
                                <?php foreach($list_lokasi as $l){ ?>
                                    <option value="<?php echo $l->id_lokasi ?>" <?php if($value == $l->id_lokasi) echo " selected ";?>><?php echo $l->nama_lokasi ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <br>
                <button class="btn btn-success" type="submit"> BQ <i class="fa fa-chevron-right ml-2"></i></button>
            </form>
        </div>
    </div>
</div>

