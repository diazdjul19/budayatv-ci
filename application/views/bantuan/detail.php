<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
        <div class="inner">
            <h2 class="clearfix"><span class="icon-thumbnail text-white pull-left bg-danger">R</span>Revisi</h2>
            <ul class="breadcrumb">
                <li>
                    <a href="dashboard">Dashboard</a>
                </li>
                <li>
                    <a href="revisi">Revisi</a>
                </li>
                <li>
                    Detail
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg">
    <div class="row">
        <div class="col-sm-7">
            <div class="panel panel-transparent">
                <div class="panel-heading">
                    <div class="panel-title"><?php echo $rev->nama_menu; ?></div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="no-margin">Laporan : </h5>
                            <p class="no-margin bold"><?php echo $rev->nama_user; ?></p>
                        </div>
                        <div class="col-md-6 text-right p-t-5">
                            <?php
                            $status = [
                                1 => "<i class='fa fa-question-circle text-danger'></i> Menunggu",
                                2 => "<i class='fa fa-clock-o text-danger'></i> On Progress",
                                3 => "<i class='fa fa-check text-success'></i> Selesai"
                            ];
                            ?>

                            Status : <br>
                            <span class="bold"><?php echo $status[$rev->status_revisi]; ?></span>
                        </div>
                    </div>
                    <hr>
                    <?php echo $rev->isi_revisi; ?>


                    <?php if (count($jwb)) { ?>
                        <h5 class="m-t-60 bold text-center">Balasan</h5>

                        <?php foreach ($jwb as $j) { ?>
                            <hr>
                            <div class="text-right bold m-b-20">
                                <?php echo $j->nama_user; ?>
                            </div>
                            <?php echo $j->isi_revisi_jawab; ?>
                        <?php } ?>

                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="post" action="revisi/jawab" role="form" class="myform" autocomplete="off" novalidate>
                        <input type="hidden" name="revisi_id" value="<?php echo $rev->id_revisi; ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group required">
                                    <label>Balasan</label>
                                    <textarea name="isi_revisi_jawab" cols="30" rows="10"
                                              class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <?php if (get_staff_user_id() == '6bmgy') { ?>
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

