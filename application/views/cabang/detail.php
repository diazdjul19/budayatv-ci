<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <div class="row">
                <div class="col">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="group_bisnis">Group Bisnis</a></li>
                        <li class="breadcrumb-item active"><?php echo $judul; ?></li>
                    </ol>
                </div>
                <div class="col">
                    <a href="group_bisnis" class="btn btn-primary pull-right m-t-20"><i class="fa fa-chevron-circle-left m-r-10"></i>
                        Kembali</a>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-5 col-lg-6 ">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Group Bisnis</h3>
                            <p>Data Group Bisnis yang terdapat dalam perusahaan</p>
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
                                <a href="group_bisnis/form/<?php echo $data->id_group_bisnis ?>" class="btn btn-primary">Edit</a>

                                <?php if($data->user_group_bisnis == 0){ ?>
                                    <a href="" class="btn btn-danger but-del" data-id="<?php echo $data->id_group_bisnis ?>">Hapus</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-block">
                    <table class="table table-striped w-100">
                        <tr>
                            <td>Nama</td>
                            <td><?php echo $data->nama_group_bisnis ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Keterangan</td>
                        </tr>
                        <tr>
                            <td colspan="2"><?php echo $data->ket_group_bisnis ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-default">
                <div class="card-block">
                    <h5 class="text-right"><i class="fa fa-user m-r-10"></i> Users</h5>

                    <div class="row m-t-20">
                        <div class="col">
                            <h5>TOTAL </br> USER</a></h5>
                            <h3><?php echo $data->user_group_bisnis; ?></h3>
                        </div>
                    </div>

                    <div class="card card-default bg-master-lightest m-t-50">
                        <div class="card-block">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(count($user)){
                                foreach ($user as $s) {
                                    ?>
                                    <tr>
                                        <td>
                                            <a href="" class="but-detail text-primary"
                                               data-id="<?php echo $s->id_user ?>"><?php echo $s->nama_user ?></a>
                                        </td>
                                    </tr>
                                <?php }}else{ ?>
                                <tr>
                                    <td>Tidak ada user</td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>

