<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="anggaran">Anggaran</a></li>
                <li class="breadcrumb-item active">Detail <?php echo $button; ?></li>
            </ol>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="card card-transparent">
        <div class="card-block">
            <div class="row">
                <div class="col">
                    <a href="<?php echo $link ?>" class="btn btn-default"><i class="fa fa-arrow-circle-left mr-2"></i> Kembali</a>
                    <h5 class="mb-0"><?php echo $button?> TA / <?php echo $data->thn_anggaran ?></h5>
                    <h1 class="mt-0"><small class="normal" style="width: 90px; display: inline-table">PKAT</small> Rp. <?php echo number_format($data->nominal_anggaran, 0,'.', '.') ?></h1>
                    <h1 class="mt-0"><small class="normal" style="width: 90px; display: inline-table">Real </small> Rp. <?php echo number_format($data->real_anggaran, 0,'.', '.') ?></h1>
                </div>
                <div class="col-3">
                    <div class="pull-right">
                        <a href="<?php echo $link ?>/form/<?php echo $data->id_anggaran ?>" class="btn btn-primary"><i class="fa fa-pencil mr-2"></i> Update</a>
                        <a href="<?php echo $link ?>/hapus/<?php echo $data->id_anggaran ?>" class="btn btn-danger"><i class="fa fa-times mr-2"></i> Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-default">
        <div class="card-block">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th width="120"></th>
                        <th width="150"><?php echo $bln[1] ?></th>
                        <th width="150"><?php echo $bln[2] ?></th>
                        <th width="150"><?php echo $bln[3] ?></th>
                        <th width="150"><?php echo $bln[4] ?></th>
                        <th width="150"><?php echo $bln[5] ?></th>
                        <th width="150"><?php echo $bln[6] ?></th>
                        <th width="150"><?php echo $bln[7] ?></th>
                        <th width="150"><?php echo $bln[8] ?></th>
                        <th width="150"><?php echo $bln[9] ?></th>
                        <th width="150"><?php echo $bln[10] ?></th>
                        <th width="150"><?php echo $bln[11] ?></th>
                        <th width="150"><?php echo $bln[12] ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="background: #ffe45c; font-weight: bold">PKAT</td>
                        <?php for($x = 1; $x <= 12; $x++){ ?>
                        <td class="text-right">
                            <?php
                            $q = $this->db
                                ->where([
                                    'anggaran_id_detail' => $data->id_anggaran,
                                    'bulan_anggaran_detail' => $x,
                                    'tipe_anggaran_detail' => $tipe
                                ])->get('anggaran_detail')->row();
                            echo number_format($q->pkat_anggaran_detail, 0, '.', '.');
                            ?>
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td style="background: #ffe45c; font-weight: bold">Realisasi</td>
                        <?php for($x = 1; $x <= 12; $x++){ ?>
                            <td class="text-right">
                                <?php
                                $q = $this->db->where(['anggaran_id_detail' => $data->id_anggaran, 'bulan_anggaran_detail' => $x ])->get('anggaran_detail')->row();
                                echo number_format($q->real_anggaran_detail, 0, '.', '.');
                                ?>
                            </td>
                        <?php } ?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>