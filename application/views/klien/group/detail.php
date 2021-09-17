<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <div class="row">
                <div class="col">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="klien_group">Group Klien</a></li>
                        <li class="breadcrumb-item active"><?php echo $judul; ?></li>
                    </ol>
                </div>
                <div class="col">
                    <a href="klien_group" class="btn btn-primary pull-right m-t-20"><i class="fa fa-chevron-circle-left m-r-10"></i>
                        Kembali</a>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-5 col-lg-6 ">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Group Klien</h3>
                            <p>Pencatatan semua data Group perusahaan yang menjadi klien.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg">
    <div class="row">
        <div class="col">
            <div class="card card-default">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <div class="card-title"><?php echo $judul; ?></div>
                        </div>
                        <div class="col">
                            <div class="pull-right">
                                <a href="klien_group/form/<?php echo $data->id_group_klien ?>" class="btn btn-primary">Edit</a>

                                <?php if(!count($group)){ ?>
                                    <a href="" class="btn btn-danger but-del" data-id="<?php echo $data->id_group_klien?>">Hapus</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-block">
                    <table class="table table-striped w-100">
                        <tr>
                            <td>Nama</td>
                            <td><?php echo $data->nama_group_klien ?></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td><?php echo $data->ket_group_klien ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-default">
                <div class="card-block">
                    <h5 class="text-right"><i class="fa fa-building mr-2"></i> Daftar Perusahaan</h5>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Nama</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(count($group)){
                        foreach ($group as $s) {
                            ?>
                            <tr>
                                <td>
                                    <a href="" class="but-detail text-primary" data-id="<?php echo $s->id_klien ?>"><?php echo $s->nama_klien ?></a>
                                </td>
                            </tr>
                        <?php } }else{ ?>
                        <tr>
                            <td>Tidak ada perusahaan</td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

