<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Anggaran</li>
            </ol>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="card card-transparent ">
        <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
            <li class="nav-item">
                <a href="anggaran" class="<?php if($submenu == 'anggaran'){ echo"active";}?>"><span>Anggaran Investasi</span></a>
            </li>
            <li class="nav-item">
                <a href="anggaran_operasional" class="<?php if($submenu == 'anggaran_operasional'){ echo"active";}?>"><span>Anggaran Operasional</span></a>
            </li>
        </ul>
    </div>

    <div class="card card-default">
        <div class="card-block">
            <div class="row mb-5">
                <div class="col">
                    <a href="<?php echo $link ?>/form" class="btn btn-primary pull-right">
                        <i class="fa fa-plus"></i>
                        <span class="m-l-10"><?php echo $button ?></span>
                    </a>
                </div>
            </div>

            <table class="table table-hover table-sm table-striped my-table" id="mytable" width="100%">
                <thead>
                <tr>
                    <th width="150">Tahun </th>
                    <th>PKAT</th>
                    <th>Realisasi</th>
                    <th width="150">Last Update</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $tgl = date('Y');
                if(count($data)){
                    foreach($data as $d){
                        ?>
                    <tr <?php if($tgl == $d->thn_anggaran){ echo "class='bold text-primary'";}?>>
                        <td>
                            <a href="<?php echo $link ?>/detail/<?php echo $d->id_anggaran ?>">
                                <?php echo $d->thn_anggaran ?>
                            </a>
                        </td>
                        <td>
                            Rp. <?php echo number_format($d->nominal_anggaran, '0', '.', '.') ?>
                        </td>
                        <td>
                            Rp. <?php echo number_format($d->real_anggaran, '0', '.', '.') ?>
                        </td>
                        <td><?php echo time_ago($d->ts_anggaran )?></td>
                    </tr>
                    <?php
                    }
                } else {
                    ?>
                <tr>
                    <td colspan="3" class="text-center">Tidak ada data</td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>