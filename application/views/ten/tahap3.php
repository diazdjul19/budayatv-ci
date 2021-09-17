<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="tender">Tender</a></li>
                <li class="breadcrumb-item active"><?php echo $judul; ?></li>
            </ol>
            <div class="row">
                <div class="col">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <div class="row">
                                <div class="col">
                                    <h2 class="bold m-b-0"><?php echo $data->nama_tender ?></h2>
                                    <h3 class="m-t-0">Rp. <?php echo number_format($data->nominal_tender, 0, '.','.')?></h3>
                                    <h3><?php echo $judul; ?> - Tahap 3</h3>
                                    <p>Pendaftaran setiap undangan tender yang ada.</p>
                                </div>
                                <div class="col">
                                    <?php
                                    if (isset($data)) {
                                        if($data->tgl_tender != '0000-00-00' && $data->tgl_tender != '1970-01-01'){
                                            $has_permission = has_permission('tender', 'del');
                                            if ($has_permission) {
                                                ?>
                                                <a href="" class="btn btn-danger pull-right but-del" data-id="<?php echo $data->id_tender ?>">
                                                    <i class="fa fa-times m-r-10"></i>
                                                    Hapus Tender
                                                </a>
                                            <?php }}} ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-default">
                <div class="card-header row">
                    <div class="card-title col p-l-20"><?php echo $judul; ?></div>
                    <div class="col text-right">Tahap 2</div>
                </div>
                <div class="card-block">
                    <form method="post" action="" role="form" class="myform" autocomplete="off" novalidate>
                        <div class="row">
                            <div class="col-md-12">
                                <?php if ($data->penawaran_tender != 0) {
                                    $value = $data->penawaran_tender;
                                } else {
                                    $value = '';
                                }; ?>
                                <?php echo render_input('penawaran_tender', 'Penawaran Tender', $value, 'text', 'form-group-default required', 'inputmask', ['tabindex' => 3]); ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <p class="m-t-10">Tender</p>
                            </div>
                        </div>
                        <div class="form-group-attached">
                            <div class="row">
                                <div class="col-sm-4">
                                    <?php
                                    if( $data->tgl_tender == '0000-00-00' || $data->tgl_tender == '1970-01-01'){
                                        $value = '';
                                    }else{
                                        $value = tgl_indo($data->tgl_tender);
                                    }?>
                                    <?php echo render_input('tgl_tender', 'Tanggal', $value, 'text', 'form-group-default required', 'datep', ['tabindex' => 4]); ?>
                                </div>
                                <div class="col-sm-4">
                                    <?php
                                    if($data->jam_tender != '00:00:00'){
                                        $value = $data->jam_tender;
                                    }else{
                                        $value = '';
                                    }
                                    ?>
                                    <?php echo render_input('jam_tender', 'Jam', $value, 'text', 'form-group-default', 'jam', ['tabindex' => 5]); ?>
                                </div>
                                <div class="col-sm-4">
                                    <?php echo render_input('tempat_tender', 'Tempat', $data->tempat_tender, 'text', 'form-group-default',  '', ['tabindex' => 6]); ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Simpan</button>
                        <a href="tender/detail/<?php echo $data->id_tender ?>" class="btn btn-default"> Batal <i class="fa fa-times"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

