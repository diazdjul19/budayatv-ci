<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="proyek">Proyek</a></li>
                <li class="breadcrumb-item active"><?php echo $title; ?></li>
            </ol>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg">
    <div class="row">
        <div class="col-7">
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title"><?php echo $title; ?></div>
                </div>
                <div class="card-block">
                    <form method="post" action="" role="form" class="myform" autocomplete="off" novalidate>
                        <div class="row">
                            <div class="col">
                                <div class="form-group form-group-default ">
                                    <label>Tahun Anggaran</label>
                                    <select name="thn_anggaran_proyek" class="form-control">
                                        <?php
                                        if (isset($data)) {
                                            $v_grup = $data->thn_anggaran_proyek;
                                        } else {
                                            $v_grup = date('Y');
                                        }
                                        ?>
                                        <option value="2014" <?php if ($v_grup == '2014') { echo " selected";  } ?>>2014</option>
                                        <option value="2015" <?php if ($v_grup == 2015) { echo " selected";  } ?>>2015</option>
                                        <option value="2016" <?php if ($v_grup == '2016') { echo " selected";  } ?>>2016</option>
                                        <option value="2017" <?php if ($v_grup == '2017') { echo " selected";  } ?>>2017</option>
                                        <option value="2018" <?php if ($v_grup == '2018') { echo " selected";  } ?>>2018</option>
                                        <option value="2019" <?php if ($v_grup == '2019') { echo " selected";  } ?>>2019</option>
                                        <option value="2020" <?php if ($v_grup == '2020') { echo " selected";  } ?>>2020</option>
                                    </select>
                                </div>
                                <div class="form-group form-group-default">
                                    <label for="">Tipe Proyek</label>
                                    <select name="tipe_proyek" class="form-control">
                                        <?php if (isset($data)) {
                                            $value = $data->tipe_proyek;
                                        } else {
                                            $value = '';
                                        }; ?>
                                        <?php foreach($tipe_proyek as $tp){ ?>
                                        <option value="<?php echo $tp->id_proyek_t ?>" <?php if($tp->id_proyek_t == $value )echo " selected";?>><?php echo $tp->nama_proyek_t ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <?php if (isset($data)) {
                                    $value = $data->nama_proyek;
                                } else {
                                    $value = '';
                                }; ?>
                                <?php echo render_input('nama_proyek', 'Nama', $value, 'text', 'form-group-default required', 'required'); ?>

                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Simpan</button>
                        <a href="proyek" class="btn btn-default"> Batal <i class="fa fa-times"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>