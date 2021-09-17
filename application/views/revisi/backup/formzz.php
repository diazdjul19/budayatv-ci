<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
        <div class="inner">
            <h2 class="clearfix"><span class="icon-thumbnail text-white pull-left bg-danger">R</span>Revisi Aplikasi</h2>
            <ul class="breadcrumb">
                <li>
                    <a href="dashboard">Dashboard</a>
                </li>
                <li>
                    <a href="revisi">Revisi Aplikasi</a>
                </li>
                <li>
                    <?php echo $judul; ?>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg">
    <div class="row">
        <div class="col-sm-5">
            <div class="panel panel-transparent">
                <div class="panel-heading">
                    <div class="panel-title"><?php echo $judul; ?></div>
                </div>
                <div class="panel-body">
                    <h3>Revisi Aplikasi.</h3>
                    <p>Jika ingin melaporkan kepada programmer jika terdapat <span class="bold">Error</span> atau <span class="bold">Revisi / Perubahan</span> pada modul yang tersedia silahkan laporkan pada modul ini.</p>
                    <p>Pilih Modul yang akan anda laporkan, selanjutnya deskripsikan error atau perubahan yang anda kehendaki pada kolom lapor revisi, selanjutnya tekan tombol kirim untuk mengirimkan kepada programmer atau tekan tombol batal untuk membatalkan dan kembali ke halaman utama revisi.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="post" action="" role="form" class="myform" autocomplete="off" novalidate>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default required">
                                    <label>Modul</label>
                                    <input type="text" name="modul_id" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group required">
                                    <label>Lapor Revisi</label>
                                    <textarea name="isi_revisi" cols="30" rows="10" class="form-control summernote"></textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-danger" type="submit"><i class="fa fa-check"></i> Kirim</button>
                        <a href="revisi" class="btn btn-default"> Batal <i class="fa fa-times"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

