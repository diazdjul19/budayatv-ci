<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="tender">Tender</a></li>
                <li class="breadcrumb-item active"><?php echo $judul; ?></li>
            </ol>
            <div class="row">
                <div class="col-xl-5 col-lg-6 ">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Undangan Proyek Baru</h3>
                            <p>Pendaftaran setiap undangan tender yang ada.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title"><?php echo $judul; ?></div>
                </div>
                <div class="card-block">
                    <form method="post" action="" role="form" class="myform" autocomplete="off" novalidate>
                        <div class="row">
                            <div class="col-md-12">
                                <?php if (isset($data)) {
                                    $value = $data->nama_tender;
                                } else {
                                    $value = '';
                                }; ?>
                                <?php echo render_input('nama_tender', 'Nama Pekerjaan', $value, 'text', 'form-group-default required', 'required', ['tabindex' => 1]); ?>


                                <div class="form-group form-group-default ">
                                    <label>Klien</label>
                                    <select name="klien_id_tender" class="form-control select-klien full-width" tabindex="2">
                                        <option value=""> -</option>
                                        <?php
                                        if (isset($data)) {
                                            $v_klien = $data->klien_id_tender;
                                        } else {
                                            $v_klien = '';
                                        }

                                        foreach ($klien_list as $rl) {
                                            ?>
                                            <option value="<?php echo $rl->id_klien ?>" <?php if ($v_klien == $rl->id_klien) {
                                                echo " selected";
                                            } ?>><?php echo $rl->nama_klien; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group form-group-default ">
                                    <?php
                                    if (isset($data)) {
                                        $v_al = $data->alamat_tender;
                                    } else {
                                        $v_al = '';
                                    }
                                    ?>
                                    <label>Alamat Tender</label>
                                    <textarea class="form-control" name="alamat_tender"><?php echo $v_al; ?></textarea>
                                </div>

                                <div class="form-group form-group-default ">
                                    <label>Group Bisnis</label>
                                    <select name="group_bisnis_tender" class="form-control select-perolehan full-width" tabindex="2">
                                        <?php
                                        if (isset($data)) {
                                            $v_group = $data->group_bisnis_tender;
                                        } else {
                                            $v_group = '';
                                        }

                                        foreach ($group_list as $gp) {
                                            ?>
                                            <option value="<?php echo $gp->id_group_bisnis ?>" <?php if ($v_group == $gp->id_group_bisnis) {
                                                echo " selected";
                                            } ?>><?php echo $gp->nama_group_bisnis; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group form-group-default ">
                                    <label>Cabang</label>
                                    <select name="perolehan_tender" class="form-control select-perolehan full-width" tabindex="2">
                                        <?php
                                        if (isset($data)) {
                                            $v_perolehan = $data->perolehan_tender;
                                        } else {
                                            $v_perolehan = '';
                                        }

                                        foreach ($lokasi_list as $ll) {
                                            ?>
                                            <option value="<?php echo $ll->id_lokasi ?>" <?php if ($v_klien == $ll->id_lokasi) {
                                                echo " selected";
                                            } ?>><?php echo $ll->nama_lokasi; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>


                                <?php if (isset($data)) {
                                    $value = $data->nominal_tender;
                                } else {
                                    $value = '';
                                }; ?>
                                <?php echo render_input('nominal_tender', 'Nominal Tender', $value, 'text', 'form-group-default', 'inputmask', ['tabindex' => 3]); ?>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-4">
                                <p class="m-t-10 text-center">ANWIZJING</p>
                            </div>
                            <div class="col-sm-4">
                                <p class="m-t-10 text-center">Penerimaan BAA</p>
                            </div>
                            <div class="col-sm-4">
                                <p class="m-t-10 text-center">Tender</p>
                            </div>
                        </div>
                        <div class="form-group-attached">
                            <div class="row">
                                <div class="col-sm-4">
                                    <?php if (isset($data)) {
                                        if($data->aw_tgl_tender != '1970-01-01'){
                                            $value = tgl_indo($data->aw_tgl_tender);
                                        }else{
                                            $value = '';
                                        }
                                    } else {
                                        $value = '';
                                    }; ?>
                                    <?php echo render_input('aw_tgl_tender', 'Tanggal', $value, 'text', 'form-group-default', 'datep', ['tabindex' => 4]); ?>
                                </div>
                                <div class="col-sm-4">
                                    <?php if (isset($data)) {
                                        if($data->pb_tgl_tender != '1970-01-01'){
                                            $value = tgl_indo($data->pb_tgl_tender);
                                        }else{
                                            $value = '';
                                        }
                                    } else {
                                        $value = '';
                                    }; ?>
                                    <?php echo render_input('pb_tgl_tender', 'Tanggal', $value, 'text', 'form-group-default', 'datep', ['tabindex' => 7]); ?>
                                </div>
                                <div class="col-sm-4">
                                    <?php if (isset($data)) {
                                        if($data->tgl_tender != '1970-01-01'){
                                            $value = tgl_indo($data->tgl_tender);
                                        }else{
                                            $value = '';
                                        }
                                    } else {
                                        $value = '';
                                    }; ?>
                                    <?php echo render_input('tgl_tender', 'Tanggal', $value, 'text', 'form-group-default', 'datep', ['tabindex' => 10]); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <?php if (isset($data)) {
                                        if($data->aw_jam_tender != '00:00:00'){
                                            $value = $data->aw_jam_tender;
                                        }else{
                                            $value = '';
                                        }
                                    } else {
                                        $value = '';
                                    }; ?>
                                    <?php echo render_input('aw_jam_tender', 'Jam', $value, 'text', 'form-group-default', 'jam', ['tabindex' => 5]); ?>
                                </div>
                                <div class="col-sm-4">
                                    <?php if (isset($data)) {
                                        if($data->pb_jam_tender != '00:00:00'){
                                            $value = $data->pb_jam_tender;
                                        }else{
                                            $value = '';
                                        }
                                    } else {
                                        $value = '';
                                    }; ?>
                                    <?php echo render_input('pb_jam_tender', 'Jam', $value, 'text', 'form-group-default', 'jam', ['tabindex' => 8]); ?>
                                </div>
                                <div class="col-sm-4">
                                    <?php if (isset($data)) {
                                        $value = $data->jam_tender;
                                        if($data->jam_tender != '00:00:00'){
                                            $value = $data->jam_tender;
                                        }else{
                                            $value = '';
                                        }
                                    } else {
                                        $value = '';
                                    }; ?>
                                    <?php echo render_input('jam_tender', 'Jam', $value, 'text', 'form-group-default', 'jam', ['tabindex' => 11]); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <?php if (isset($data)) {
                                        $value = $data->aw_tempat_tender;
                                    } else {
                                        $value = '';
                                    }; ?>
                                    <?php echo render_input('aw_tempat_tender', 'Tempat', $value, 'text', 'form-group-default',  '', ['tabindex' => 6]); ?>
                                </div>
                                <div class="col-sm-4">
                                    <?php if (isset($data)) {
                                        $value = $data->pb_tempat_tender;
                                    } else {
                                        $value = '';
                                    }; ?>
                                    <?php echo render_input('pb_tempat_tender', 'Tempat', $value, 'text', 'form-group-default', '' , ['tabindex' => 9]); ?>
                                </div>
                                <div class="col-sm-4">
                                    <?php if (isset($data)) {
                                        $value = $data->tempat_tender;
                                    } else {
                                        $value = '';
                                    }; ?>
                                    <?php echo render_input('tempat_tender', 'Tempat', $value, 'text', 'form-group-default', '' , ['tabindex' => 12]); ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Simpan</button>
                        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-default"> Batal <i
                                    class="fa fa-times"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

