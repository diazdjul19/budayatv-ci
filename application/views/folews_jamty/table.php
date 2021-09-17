<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Jam Tayang</li>
            </ol>
            <div class="row">
                <div class="col">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Jam Tayang</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <?php
                    $has_permission = has_permission('BtvJamty', 'add');
                    if ($has_permission) {
                        ?>
                        <a href="BtvJamty/form" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"></i>
                            <span class="m-l-10">Jam Tayang Baru</span>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="row d-flex justify-content-center">
        <div class="col-10 ">
            <div class="card card-default ">
                <div class="card-block">
                    <table class="table table-hover table-sm table-striped my-table" id="mytable" width="100%">
                        <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Hari</th>
                            <th>TimeZone</th>
                            <th>Tempat Tayang</th>
                            <th>Time</th>
                            <th>Day</th>
                            <th>Action</th>


                            <!-- <th width="100"></th> -->
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data as $d){ ?>
                        <tr class="text-center">
                            <td><?php echo $nomer_urut++; ?> </td>
                            
                            <!-- I THINK THIS CODE NOT EFEKTIF, COBA TANYA BANG MEGO OKE.. -->
                            <?php if ($d->hari_int == '1'): ?>
                                <td>Senin</td>
                            <?php elseif ($d->hari_int == '2'): ?>
                                <td>Selasa</td>
                            <?php elseif ($d->hari_int == '3'): ?>
                                <td>Rabu</td>
                            <?php elseif ($d->hari_int == '4'): ?>
                                <td>Kamis</td>
                            <?php elseif ($d->hari_int == '5'): ?>
                                <td>Jum'at</td>
                            <?php elseif ($d->hari_int == '6'): ?>
                                <td>Sabtu</td>
                            <?php elseif ($d->hari_int == '7'): ?>
                                <td>Minggu</td>
                            <?php else: ?>
                                <td>-</td>
                            <?php endif; ?>

                            <td><?php echo $d->id_timezone_rel; ?> <span>~Relasi~</span></td>
                            <td><?php echo $d->id_set_daerah_rel; ?> <span>~Relasi~</span></td>
                            <td><?php echo date("H:i A", strtotime($d->dari_waktu)) ?> ~ <?php echo date("H:i A", strtotime($d->sampai_waktu)) ?></td>
                            <td><?php echo date("d M Y", strtotime($d->dari_tanggal)) ?> ~ <?php echo date("d M Y", strtotime($d->sampai_tanggal)) ?></td>
                            
                            <td>
                                <a href="BtvJamty/form/<?php echo $d->id_jamty ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
                                <a href="BtvJamty/hapus/<?php echo $d->id_jamty ?>" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> </a>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>