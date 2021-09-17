<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">BTV Set Daerah</li>
            </ol>
            <div class="row">
                <div class="col">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Setting Daerah</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <?php
                    $has_permission = has_permission('BtvSetDaerah', 'add');
                    if ($has_permission) {
                        ?>
                        <a href="BtvSetDaerah/form" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"></i>
                            <span class="m-l-10">Daerah Baru</span>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <div class="card card-default">
                <div class="card-block">
                    <table class="table table-hover table-sm table-striped my-table" id="mytable" width="100%">
                        <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Daerah</th>
                            <th>Provinsi</th>
                            <th>Icon Daerah</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data as $d){ ?>
                        <tr class="text-center">
                            <td><?php echo $nomer_urut++; ?> </td>
                            <td><?php echo $d->name_daerah ?></td>
                            <td><?php echo $d->id_provinsi_rel ?></td>
                            <td><img  width="50" height="50" controls style="border-radius:5%;" src="./upload/kategori_photo/<?= $d->icon_daerah ?>" alt=""></td>


                            <td>
                                <a href="BtvSetDaerah/form/<?php echo $d->id_set_daerah ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
                                <a href="BtvSetDaerah/hapus/<?php echo $d->id_set_daerah ?>" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> </a>
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
