<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="proyek_tipe">Btv Kategori</a></li>
                <li class="breadcrumb-item active"><?php echo $judul; ?></li>
            </ol>
            <div class="row">
                <div class="col-xl-5 col-lg-6 ">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Kategori</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
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
                    <form method="post" action="" role="form" class="myform" autocomplete="off" novalidate enctype="multipart/form-data">

                        <?php if (isset($data)) {
                            $value = $data->name_kategori;
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('name_kategori', 'Nama Kategori', $value, 'text', 'form-group-default required', 'required'); ?>

                        <div class="form-group form-group-default">
                            <label>Foto Kategori</label>
                            <div class="input-group">
                                <?php if (isset($data)) {
                                    $value = $data->foto_kategori;
                                } else {
                                    $value = '';
                                }; ?>
                                
                                <input type="file" name="foto_kategori" id="" class="pt-4 pb-4 pr-4">
                            </div>
                        </div>

                        <br>
                        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Simpan</button>
                        <a href="BtvKategori" class="btn btn-default"> Batal <i class="fa fa-times"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

