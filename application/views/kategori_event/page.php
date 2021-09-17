<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Kategori Event</li>
            </ol>
            <div class="row">
                <div class="col">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Kategori Event</h3>
                            <p>Pencatatan kategori event dan pewarnaan pada kalender.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <?php
                    $has_permission = has_permission('kategori_event', 'add');
                    if ($has_permission) {
                        ?>
                        <a href="kategori_event/form" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"></i>
                            <span class="m-l-10">Kategori Event Baru</span>
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
                            <th width="80"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(count($data)){
                        foreach($data as $d){ ?>
                            <tr>
                                <td>
                                    <span class="pull-left mr-2" style="width: 20px; height: 20px; background: <?php echo $d->warna_ke ?>"></span>
                                    <span class="pull-left"><?php echo $d->nama_ke ?></span>
                                </td>
                                <td>
                                    <a href="kategori_event/form/<?php echo $d->id_ke ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
                                    <a href="kategori_event/hapus/<?php echo $d->id_ke ?>" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> </a>
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
