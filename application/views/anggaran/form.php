<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="anggaran">Anggaran</a></li>
                <li class="breadcrumb-item active"><?php echo $title; ?></li>
            </ol>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg">

    <div class="card card-default">
        <div class="card-block">
            <form method="post" action="" role="form" class="myform" autocomplete="off" novalidate>
                <div class="row">
                    <div class="col">
                        <div class="card card-default">
                            <div class="card-header">
                                <div class="card-title"><?php echo $title; ?></div>
                            </div>
                            <div class="card-block">
                                <input type="hidden" name="tipe_anggaran" value="<?php echo $tipe ?>">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group form-group-default ">
                                            <label>Tahun</label>
                                            <select name="thn_anggaran" class="form-control">
                                                <?php
                                                if (isset($data)) {
                                                    $v_grup = $data->thn_anggaran;
                                                } else {
                                                    $v_grup = '';
                                                }
                                                ?>
                                                <option value="2014" <?php if ($v_grup == '2014') {
                                                    echo " selected";
                                                } ?>>2014
                                                </option>
                                                <option value="2015" <?php if ($v_grup == '2015') {
                                                    echo " selected";
                                                } ?>>2015
                                                </option>
                                                <option value="2016" <?php if ($v_grup == '2016') {
                                                    echo " selected";
                                                } ?>>2016
                                                </option>
                                                <option value="2017" <?php if ($v_grup == '2017') {
                                                    echo " selected";
                                                } ?>>2017
                                                </option>
                                                <option value="2018" <?php if ($v_grup == '2018') {
                                                    echo " selected";
                                                } ?>>2018
                                                </option>
                                                <option value="2019" <?php if ($v_grup == '2019') {
                                                    echo " selected";
                                                } ?>>2019
                                                </option>
                                                <option value="2020" <?php if ($v_grup == '2020') {
                                                    echo " selected";
                                                } ?>>2020
                                                </option>
                                            </select>
                                        </div>

                                        <?php if (isset($data)) {
                                            $value = $data->nominal_anggaran;
                                        } else {
                                            $value = '';
                                        }; ?>

                                        <div class="form-group form-group-default">
                                            <label for="">Total PKAT</label>
                                            <input type="text" name="nominal_anggaran"
                                                   class="form-control inputmask total"
                                                   value="<?php echo $value ?>" readonly
                                                   style="color: #002F63; font-weight: bold">
                                        </div>

                                        <?php if (isset($data)) {
                                            $value = $data->real_anggaran;
                                        } else {
                                            $value = '';
                                        }; ?>

                                        <div class="form-group form-group-default">
                                            <label for="">Total Realisasi</label>
                                            <input type="text" name="real_anggaran"
                                                   class="form-control inputmask total_real"
                                                   value="<?php echo $value ?>" readonly
                                                   style="color: #002F63; font-weight: bold">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Simpan
                                </button>
                                <?php if (isset($data)) { ?>
                                <?php if ($tipe == 1) { ?>
                                    <a href="anggaran/detail/<?php echo $data->id_anggaran ?>" class="btn btn-default">
                                        Batal <i class="fa fa-times"></i></a>
                                <?php } else { ?>
                                        <a href="anggaran_operasional/detail/<?php echo $data->id_anggaran ?>" class="btn btn-default">
                                            Batal <i class="fa fa-times"></i></a>
                                <?php }?>
                                <?php } else { ?>
                                    <?php if ($tipe == 1) { ?>
                                        <a href="anggaran" class="btn btn-default"> Batal <i
                                                    class="fa fa-times"></i></a>
                                    <?php } else { ?>
                                        <a href="anggaran_operasional" class="btn btn-default"> Batal <i
                                                    class="fa fa-times"></i></a>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-default">
                            <div class="card-block">
                                <h5>PKAT</h5>
                                <?php for ($x = 1; $x <= 12; $x++) { ?>
                                    <div class="form-group form-group-default mb-0">
                                        <?php if (isset($data)) {
                                            $this->db->where('anggaran_id_detail', $data->id_anggaran);
                                            $this->db->where('bulan_anggaran_detail', $x);
                                            $this->db->where('tipe_anggaran_detail', $tipe);
                                            $d = $this->db->get('anggaran_detail')->row();
                                            $value = $d->pkat_anggaran_detail;
                                        } else {
                                            $value = '';
                                        }; ?>
                                        <label for=""><?php echo $bln[$x] ?></label>
                                        <input type="text" name="detail[nama-<?php echo $x ?>]"
                                               class="form-control inputmask nominal" value="<?php echo $value ?>">
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-default">
                            <div class="card-block">
                                <h5>Realisasi</h5>
                                <?php for ($x = 1; $x <= 12; $x++) { ?>
                                    <div class="form-group form-group-default mb-0">
                                        <?php if (isset($data)) {
                                            $this->db->where('anggaran_id_detail', $data->id_anggaran);
                                            $this->db->where('bulan_anggaran_detail', $x);
                                            $this->db->where('tipe_anggaran_detail', $tipe);
                                            $d = $this->db->get('anggaran_detail')->row();
                                            $value = $d->real_anggaran_detail;
                                        } else {
                                            $value = '';
                                        }; ?>
                                        <label for=""><?php echo $bln[$x] ?></label>
                                        <input type="text" name="real[nama-<?php echo $x ?>]"
                                               class="form-control inputmask real" value="<?php echo $value ?>">
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>