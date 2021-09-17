<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">BTV Chanel</li>
            </ol>
            <div class="row">
                <div class="col">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>BTV Chanel</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <?php
                    $has_permission = has_permission('BtvChanel', 'add');
                    if ($has_permission) {
                        ?>
                        <a href="BtvChanel/form" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"></i>
                            <span class="m-l-10">Chanel Baru</span>
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
                            <th>Nama Chanel</th>
                            <th>Icon Chanel</th>
                            <th>Sinopsis Chanel</th>
                            <th>Action</th>


                            <!-- <th width="100"></th> -->
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data as $d){ ?>
                        <tr class="text-center">
                            <td><?php echo $nomer_urut++; ?> </td>
                            <td><?php echo $d->name_chanel ?></td>
                            <td><?php echo $d->icon_chanel ?></td>
                            <td><?php echo $d->sinopsis_chanel ?></td>

                            <td>
                                <a href="BtvChanel/form/<?php echo $d->id_chanel ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
                                <a href="BtvChanel/hapus/<?php echo $d->id_chanel ?>" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> </a>
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