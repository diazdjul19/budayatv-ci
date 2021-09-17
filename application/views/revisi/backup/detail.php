<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="revisi">Revisi Aplikasi</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
            <div class="row">
                <div class="col-xl-5 col-lg-6 ">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Revisi Aplikasi</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg">
    <div class="row">
        <div class="col-sm-6">
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title"><?php echo $rev->modul_id; ?></div>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="no-margin">Laporan : <br>
                                <span class="bold"><?php echo $rev->nama_user; ?></span> ( <?php echo time_ago($rev->create_revisi); ?> )</p>
                        </div>
                        <div class="col-md-6 text-right p-t-5">
                            <?php
                            $status = [
                                1 => "<i class='fa fa-question-circle text-danger'></i> Menunggu",
                                2 => "<i class='fa fa-clock-o text-danger'></i> On Progress",
                                3 => "<i class='fa fa-check text-success'></i> Selesai"
                            ];
                            ?>

                            <p>Status : <br>
                            <span class="bold"><?php echo $status[$rev->status_revisi]; ?></span>
                            </p>
                        </div>
                    </div>
                    <hr>

                    <div class="isi-revisi">
                        <?php echo $rev->isi_revisi; ?>

                    </div>

                    <?php if (count($jwb)) { ?>
                        <div class="card card-default jawab">
                            <div class="card-header">
                                <div class="card-title text-primary">Balasan</div>
                            </div>
                            <div class="card-block">
                                <?php foreach ($jwb as $j) { ?>
                                    <div class="jawab--revisi">
                                        <div class="jawab--user">
                                            <i class="fa fa-user"></i> <?php echo $j->nama_user." ".time_ago($j->tgl_jawab_revisi); ?>
                                        </div>
                                        <?php echo $j->isi_revisi_jawab; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card card-default">
                <div class="card-block">
                    <form method="post" action="revisi/jawab" role="form" class="myform" autocomplete="off" novalidate>
                        <input type="hidden" name="revisi_id" value="<?php echo $rev->id_revisi; ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group required">
                                    <label>Balasan</label>
                                    <textarea name="isi_revisi_jawab" cols="30" rows="10"
                                              class="form-control summernote"></textarea>
                                </div>
                            </div>
                        </div>
                        <?php if (get_staff_user_id() == '6bmgy' || get_staff_user_id() == 'duji9') { ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group required">
                                        <label>Status</label>
                                        <select name="status_revisi" class="form-control">
                                            <option value=""></option>
                                            <option value="2">On Progress</option>
                                            <option value="3">Selesai</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <br>
                        <button class="btn btn-danger" type="submit"><i class="fa fa-check"></i> Kirim</button>
                        <a href="revisi" class="btn btn-default"> Tutup <i class="fa fa-times"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

