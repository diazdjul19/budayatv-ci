<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">BTV Program Acara</li>
            </ol>
            <div class="row">
                <div class="col">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Program Acara</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <?php
                    $has_permission = has_permission('BtvProgramacara', 'add');
                    if ($has_permission) {
                        ?>
                        <a href="BtvProgramacara/form" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"></i>
                            <span class="m-l-10">Program Acara Baru</span>
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
                            <th>Nama Acara</th>
                            <th>Sinopsis</th>
                            <th>Cuplikan Video</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data as $d){ ?>
                        <tr class="text-center">
                            <td><?php echo $nomer_urut++; ?> </td>
                            <td><?php echo $d->name_acara ?></td>
                            <td><?php echo $d->sinopsis_acara ?></td>
                            <td>
                            <video width="70" height="50" controls style="border-radius:5%;">
                                <source src="<?php echo $d->cuplikan_video ?>" type="video/mp4">
                            </video>
                            </td>
                            <td><?php echo $d->id_kategori_rel ?></td>


                            <td>
                                <a href="BtvProgramacara/form/<?php echo $d->id_program_acara ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
                                <a href="BtvProgramacara/hapus/<?php echo $d->id_program_acara ?>" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> </a>
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
