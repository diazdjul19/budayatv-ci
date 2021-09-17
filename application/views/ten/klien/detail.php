<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <div class="row">
                <div class="col">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="klien">Klien</a></li>
                        <li class="breadcrumb-item active"><?php echo $judul; ?></li>
                    </ol>
                </div>
                <div class="col">
                    <a href="klien" class="btn btn-primary pull-right m-t-20"><i class="fa fa-chevron-circle-left m-r-10"></i>
                        Kembali</a>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-5 col-lg-6 ">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Klien</h3>
                            <p>Pencatatan semua data perolehan dari proyek yang dikerjakan.</p>
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
                                <a href="tender_klien/form/<?php echo $data->id_klien ?>" class="btn btn-primary">Edit</a>

                                <?php if(!count($sejarah)){ ?>
                                    <a href="" class="btn btn-danger but-del" data-id="<?php echo $data->id_klien?>">Hapus</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-block">
                    <table class="table table-striped w-100">
                        <tr>
                            <td>Nama</td>
                            <td><?php echo $data->nama_klien ?></td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td><?php echo $data->telp_klien ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?php echo $data->alamat_klien ?></td>
                        </tr>
                        <tr>
                            <td>Group</td>
                            <td><?php echo $group ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-default">
                <div class="card-block">
                    <h5 class="text-right"><i class="fa fa-history m-r-10"></i> Sejarah</h5>

                    <div class="row m-t-20">
                        <div class="col">
                            <h5><a href="klien/detail/<?php echo $data->id_klien ?>" class="bold">TOTAL </br> TENDER</a>
                            </h5>
                            <h3><?php echo count($sejarah); ?></h3>
                        </div>
                        <div class="col">
                            <h5><a href="klien/detail_proses/<?php echo $data->id_klien ?>"
                                   class="text-primary">TOTAL </br> PROSES</a></h5>
                            <h3><?php echo count($progress); ?></h3>
                        </div>
                        <div class="col">
                            <h5><a href="klien/detail_menang/<?php echo $data->id_klien ?>"
                                   class="text-success">TOTAL </br> MENANG</a></h5>
                            <h3><?php echo count($menang); ?></h3>
                        </div>
                        <div class="col">
                            <h5><a href="klien/detail_kalah/<?php echo $data->id_klien ?>"
                                   class="text-danger">TOTAL </br> KALAH</a></h5>
                            <h3><?php echo count($kalah); ?></h3>
                        </div>
                    </div>

                    <div class="card card-default bg-master-lightest m-t-50">
                        <div class="card-block">
                            <div class="row">
                                <div class="col text-center">
                                    <i class='fa fa-refresh text-primary m-r-10'></i> Dalam Proses
                                </div>
                                <div class="col text-center">
                                    <i class='fa fa-check text-success m-r-10'></i> Menang
                                </div>
                                <div class="col text-center">
                                    <i class='fa fa-times text-danger m-r-10'></i> Kalah
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Proyek</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($sejarah as $s) {
                            ?>
                            <tr>
                                <td>
                                    <a href="" class="but-detail text-primary"
                                       data-id="<?php echo $s->id_tender ?>"><?php echo $s->nama_tender ?></a>
                                    <div class="row">
                                        <div class="col">
                                            <small><?php if ($s->tgl_tender != '1970-01-01') echo tgl_indo($s->tgl_tender, 'x', 9) ?></small>
                                        </div>
                                        <?php if ($s->status_tender == 2) { ?>
                                            <div class="col text-right text-danger">
                                                <?php echo $s->nama_pemenang; ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <?php
                                    if ($s->status_tender == 0) {
                                        echo "<i class='fa fa-refresh text-primary' rel='tooltip' data-original-title='Dalam Proses'></i>";
                                    } elseif ($s->status_tender == 1) {
                                        echo "<i class='fa fa-check text-success'  rel='tooltip' data-original-title='Menang'></i>";
                                    } else {
                                        echo "<i class='fa fa-times text-danger'  rel='tooltip' data-original-title='Kalah'></i>";
                                    }
                                    ?>

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

