<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Tipe Pustaka</li>
            </ol>
            <div class="row">
                <div class="col">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Tipe Pustaka</h3>
                            <p>Pencatatan semua data tipe pustaka pada perpustakaan atau pada proyek
                                .</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <?php
                    $has_permission = has_permission('tipe_pustaka', 'add');
                    if ($has_permission) {
                        ?>
                        <a href="tipe_pustaka/form" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"></i>
                            <span class="m-l-10">Tipe Pustaka Baru</span>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="row">
        <div class="col-5">
            <div class="card card-default">
                <div class="card-block">
                    <table class="table table-hover table-sm table-striped my-table" id="mytable" width="100%">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th width="100"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(count($data)){
                        foreach($data as $d){ ?>
                        <tr>
                            <td><?php echo $d->nama_tpustaka ?></td>
                            <td>
                                <a href="tipe_pustaka/form/<?php echo $d->id_tpustaka ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
                                <a href="tipe_pustaka/hapus/<?php echo $d->id_tpustaka ?>" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> </a>
                            </td>
                        </tr>
                        <?php }}else{ ?>
                            <tr>
                                <td colspan="2" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
