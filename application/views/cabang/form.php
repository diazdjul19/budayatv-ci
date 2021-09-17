<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="cabang">Cabang</a></li>
                <li class="breadcrumb-item active"><?php echo $judul; ?></li>
            </ol>
            <div class="row">
                <div class="col-xl-5 col-lg-6 ">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Cabang</h3>
                            <p>Data Cabang yang terdapat dalam perusahaan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg">
    <div class="row">
        <div class="col-sm-7">
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title"><?php echo $judul; ?></div>
                </div>
                <div class="card-block">
                    <form method="post" action="" role="form" class="myform" autocomplete="off" novalidate>
                        <div class="row">
                            <div class="col-md-12">
                                <?php if (isset($data)) {
                                    $value = $data->nama_lokasi;
                                } else {
                                    $value = '';
                                }; ?>
                                <?php echo render_input('nama_lokasi', 'Nama Cabang', $value, 'text', 'form-group-default required', 'required'); ?>

                                <?php if (isset($data)) {
                                    $value = $data->kode_lokasi;
                                } else {
                                    $value = '';
                                }; ?>
                                <?php echo render_input('kode_lokasi', 'Kode Cabang', $value, 'text', 'form-group-default required', 'required'); ?>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Simpan</button>
                        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-default"> Batal <i class="fa fa-times"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

