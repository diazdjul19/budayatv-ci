<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="klien_group">Group Klien</a></li>
                <li class="breadcrumb-item active"><?php echo $judul; ?></li>
            </ol>
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
        <div class="col-sm-7">
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title"><?php echo $judul; ?></div>
                </div>
                <div class="card-block">
                    <form method="post" action="" role="form" class="myform" autocomplete="off" novalidate>
                        <div class="row">
                            <div class="col">
                                <?php if (isset($data)) {
                                    $value = $data->nama_group_klien;
                                } else {
                                    $value = '';
                                }; ?>
                                <?php echo render_input('nama_group_klien', 'Nama', $value, 'text', 'form-group-default required', 'required'); ?>

                                <?php if (isset($data)) {
                                    $value = $data->ket_group_klien;
                                } else {
                                    $value = '';
                                }; ?>
                                <?php echo render_input('ket_group_klien', 'Keterangan', $value, 'text', 'form-group-default'); ?>

                                <?php if (isset($data)) {
                                    $value = $data->ket_group_klien;
                                } else {
                                    $value = '0';
                                }; ?>
                                <div class="form-group-default">
                                    <label for="">Tipe</label>
                                    <select name="tipe_group_klien" class="form-control">
                                        <option value="0" <?php if($value == 0) echo "selected";?>>Mandiri</option>
                                        <option value="1" <?php if($value == 1) echo "selected";?>>Non Mandiri</option>
                                    </select>
                                </div>
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

