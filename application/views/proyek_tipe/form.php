<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="proyek_tipe">Tipe Proyek</a></li>
                <li class="breadcrumb-item active"><?php echo $judul; ?></li>
            </ol>
            <div class="row">
                <div class="col-xl-5 col-lg-6 ">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Tipe Proyek</h3>
                            <p>Pencatatan semua data tipe proyek pada anggaran investasi.</p>
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
                            $value = $data->nama_proyek_t;
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('nama_proyek_t', 'Nama', $value, 'text', 'form-group-default required', 'required'); ?>

                        <br>
                        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Simpan</button>
                        <a href="proyek_tipe" class="btn btn-default"> Batal <i class="fa fa-times"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

