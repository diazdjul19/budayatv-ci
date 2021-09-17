<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="perpustakaan">Perpustakaan</a></li>
                <li class="breadcrumb-item active"><?php echo $title; ?></li>
            </ol>
            <div class="row">
                <div class="col-xl-5 col-lg-6 ">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Pustaka</h3>
                            <p>Pustaka dokumen dan data.</p>
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
                    <div class="card-title"><?php echo $title; ?></div>
                </div>
                <div class="card-block">
                    <form method="post" action="" role="form" class="myform" enctype="multipart/form-data" autocomplete="off" novalidate>

                        <?php if (isset($data)) {
                            $value = $data->nama_pustaka;
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('nama_pustaka', 'Nama', $value, 'text', 'form-group-default required', 'required'); ?>
                        <?php echo render_input('file', 'File', $value, 'file', 'form-group-default required'); ?>

                        <div class="form-group form-group-default">
                            <label for="">Tipe</label>
                            <select name="tipe_pustaka" class="form-control">
                                <?php if (isset($data)) {
                                    $value = $data->tipe_pustaka;
                                } else {
                                    $value = '';
                                }; ?>
                                <?php foreach ($tipe_perpustakaan as $tp){ ?>
                                <option value="<?php echo $tp->id_tpustaka ?>" <?php if($tp->id_tpustaka == $value) echo " selected"; ?>><?php echo $tp->nama_tpustaka ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group form-group-default">
                            <label for="">Keterangan</label>
                            <textarea name="ket_pustaka" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <br>
                        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Simpan</button>
                        <a href="perpustakaan" class="btn btn-default"> Batal <i class="fa fa-times"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

