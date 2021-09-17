<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="kategori_event">Kategori Event</a></li>
                <li class="breadcrumb-item active"><?php echo $judul; ?></li>
            </ol>
            <div class="row">
                <div class="col-xl-5 col-lg-6 ">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Kategori Event</h3>
                            <p>Pencatatan kategori event dan pewarnaan pada kalender.</p>
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

                        <?php if (isset($data)) {
                            $value = $data->nama_ke;
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('nama_ke', 'Nama', $value, 'text', 'form-group-default required', 'required'); ?>

                        <?php if (isset($data)) {
                            $value = $data->warna_ke;
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('warna_ke', 'Warna', $value, 'color', 'form-group-default required', 'required'); ?>

                        <br>
                        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Simpan</button>
                        <a href="kategori_event" class="btn btn-default"> Batal <i class="fa fa-times"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

