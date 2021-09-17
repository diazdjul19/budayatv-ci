<div class="container-fluid container-fixed-lg">
    <div class="card card-default m-t-20">
        <div class="card-block">
            <div class="inner">
                <div class="row">
                    <div class="col">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="tender">Tender</a></li>
                            <li class="breadcrumb-item active">Detail Tender</li>
                        </ol>
                    </div>

                    <div class="col">
                        <a href="tender" class="btn btn-primary pull-right"><i
                                class="fa fa-chevron-circle-left m-r-10"></i> Kembali</a>
                    </div>
                </div>

            </div>

            <h3 class="text-uppercase"><?php echo $data->nama_tender ?></h3>
        </div>
    </div>

    <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" role="tablist"
        data-init-reponsive-tabs="dropdownfx">
        <li class="nav-item">
            <a class="active" href="tender/detail/<?php echo $data->id_tender ?>"><i class="fa fa-bars tab-icon"></i>
                <span> Detail Tender</span></a>
        </li>
        <li class="nav-item">
            <a class="text-success" href="tender/tahap1/<?php echo $data->id_tender ?>"><i
                    class="fa fa-check tab-icon"></i> <span>Tahap 1</span></a>
        </li>
        <li class="nav-item">
            <a class="<?php if ($data->tahap_tender > 0) echo "text-success"; ?>"
               href="tender/tahap2/<?php echo $data->id_tender ?>"><i
                    class="fa <?php if ($data->tahap_tender > 0) echo "fa-check"; else echo "fa-credit-card"; ?>  tab-icon"></i>
                <span>Tahap 2</span></a>
        </li>
        <li class="nav-item">
            <a class="<?php if($data->tahap_tender > 1) echo "text-success"; ?>"
               href="<?php if ($data->tahap_tender > 0) echo "tender/tahap3/$data->id_tender "; else echo "tender/detail/$data->id_tender "; ?>"><i
                    class="fa <?php if ($data->tahap_tender > 1) echo "fa-check"; else echo "fa-credit-card"; ?> tab-icon"></i>
                <span>Tahap 3</span></a>
        </li>
        <li class="nav-item">
            <a class="<?php if($data->tahap_tender > 2) echo "text-success"; ?>"
               href="<?php if ($data->tahap_tender > 1) echo "tender/tahap4/$data->id_tender "; else echo "tender/detail/$data->id_tender "; ?>"><i
                        class="fa <?php if ($data->tahap_tender > 2) echo "fa-check"; else echo "fa-credit-card"; ?> tab-icon"></i>
                <span>Tahap 4</span></a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="row">
            <div class="col border-right border-light-info">
                <div class="row">
                    <div class="col"><h5><i class="fa fa-bars m-r-10"></i> Detail</h5></div>
                    <div class="col"><h5 class="text-right">
                            <span class="<?php
                            if ($data->status_tender == 0)
                                echo "bg-primary";
                            elseif ($data->status_tender == 1)
                                echo "bg-success";
                            else
                                echo "bg-danger";
                            ?> text-white p-t-5 p-b-5 p-l-10 p-r-10">
                            <i class="fa
                            <?php if ($data->status_tender == 0)
                                echo "fa-refresh ";
                            elseif ($data->status_tender == 1)
                                echo "fa-check ";
                            else
                                echo "fa-times ";
                            ?>
                             m-r-10"></i>
                                <?php if ($data->status_tender == 0)
                                    echo "Dalam Proses ";
                                elseif ($data->status_tender == 1)
                                    echo "Menang ";
                                else
                                    echo "Kalah ";
                                ?>
                            </span>
                        </h5></div>
                </div>

                <table class="table w-100">
                    <tr>
                        <td>Nama Tender</td>
                        <td><?php echo $data->nama_tender ?></td>
                    </tr>
                    <tr>
                        <td>Klien</td>
                        <td><?php echo $data->nama_klien ?></td>
                    </tr>
                    <tr>
                        <td>Perolehan</td>
                        <td><?php echo $data->nama_lokasi ?></td>
                    </tr>
                    <tr>
                        <td>Nilai Proyek</td>
                        <td class="text-right"><?php if ($data->nominal_tender != 0) echo "Rp " . number_format($data->nominal_tender, '0', ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td>Nilai Penawaran</td>
                        <td class="text-right"><?php if ($data->penawaran_tender != 0) echo "Rp " . number_format($data->penawaran_tender, '0', ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td>Nilai Pemenang</td>
                        <td class="text-right"><?php if ($data->menang_tender != 0) echo "Rp " . number_format($data->menang_tender, '0', ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td rowspan="2">ANWIZJING</td>
                        <td><?php if ($data->aw_tgl_tender != '1970-01-01') echo tgl_indo($data->aw_tgl_tender, 'x', 9) . " ( $data->aw_jam_tender )" ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $data->aw_tempat_tender ?></td>
                    </tr>
                    <tr>
                        <td rowspan="2">Penerimaan BAA</td>
                        <td><?php if ($data->pb_tgl_tender != '1970-01-01') echo tgl_indo($data->pb_tgl_tender, 'x', 9) . " ( $data->pb_jam_tender )" ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $data->pb_tempat_tender ?></td>
                    </tr>
                    <tr>
                        <td rowspan="2">Tender</td>
                        <td><?php if ($data->tgl_tender != '1970-01-01') echo tgl_indo($data->tgl_tender, 'x', 9) . " ( $data->jam_tender )" ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $data->tempat_tender ?></td>
                    </tr>
                </table>
            </div>
            <div class="col">

                <h3 class="m-b-50 text-center">KEPUTUSAN TENDER</h3>

                <div class="row">
                    <div class="col">
                        <a href="tender/pemenang/<?php echo $data->id_tender; ?>" class="btn btn-lg btn-success btn-block"><i class="fa fa-check m-r-10"></i> MENANG</a>
                    </div>
                    <div class="col">
                        <form action="" method="post" class="myform">
                            <button type="submit" class="btn btn-lg btn-danger btn-block">KALAH<i class="fa fa-times m-l-10"></i> </button>

                            <div class="form-group form-group-default required">
                                <label>Nama Pemenang</label>
                                <select name="pemenang_tender" class="form-control select-klien full-width" tabindex="2">
                                    <?php
                                    if ($data->pemenang_tender != 0) {
                                        $v_pemenang = $data->pemenang_tender;
                                    } else {
                                        $v_pemenang = '';
                                    }

                                    foreach ($list_menang as $rl) {
                                        ?>
                                        <option value="<?php echo $rl->id_pemenang ?>" <?php if ($v_pemenang == $rl->id_pemenang) {
                                            echo " selected";
                                        } ?>><?php echo $rl->nama_pemenang; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <?php echo render_input('menang_tender', 'Nominal Pemenang', '', 'text', 'form-group-default required', 'inputmask', ['tabindex' => 3]); ?>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>