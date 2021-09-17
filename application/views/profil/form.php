<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
        <div class="inner">
            <h2 class="clearfix"><span class="icon-thumbnail text-white pull-left">DP</span>Detail Profil</h2>
            <ul class="breadcrumb">
                <li>
                    <a href="admin/dashboard">Dashboard</a>
                </li>
                <li>
                    Detail Profil
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
                    <div class="panel-title">Detail Profil</div>
                </div>
                <div class="panel-body">
                    <div class="form-group-attached">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default input-group m-t-10">
                                    <label>Nama Perusahaan</label>
                                    <p id="n_nama" class="p-l-10 p-r-10"><?php echo $detail->nama_profil; ?></p>
                                    <span class="input-group-addon">
                                        <?php
                                        $has_permission = has_permission('profil', 'add');
                                        if ($has_permission) {
                                            ?>
                                            <a href="" class="btn btn-primary btn-xs but-nama"><i class="fa fa-pencil"></i> </a>
                                        <?php } ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default input-group">
                                    <label>Slogan</label>
                                    <p id="n_slogan" class="p-l-10 p-r-10"><?php echo $detail->slogan_profil; ?></p>
                                    <span class="input-group-addon">
                                        <?php
                                        $has_permission = has_permission('profil', 'add');
                                        if ($has_permission) {
                                            ?>
                                            <a href="" class="btn btn-primary btn-xs but-slogan"><i class="fa fa-pencil"></i> </a>
                                        <?php } ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default input-group">
                                    <label>Visi</label>
                                    <div id="n_visi" class="p-l-10 p-r-10"><?php echo $detail->visi_profil; ?></div>
                                    <span class="input-group-addon">
                                        <?php
                                        $has_permission = has_permission('profil', 'add');
                                        if ($has_permission) {
                                            ?>
                                            <a href="" class="btn btn-primary btn-xs but-visi"><i class="fa fa-pencil"></i> </a>
                                        <?php } ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default input-group">
                                    <label>Misi</label>
                                    <div id="n_misi" class="p-l-10 p-r-10"><?php echo $detail->misi_profil; ?></div>
                                    <span class="input-group-addon">
                                        <?php
                                        $has_permission = has_permission('profil', 'add');
                                        if ($has_permission) {
                                            ?>
                                            <a href="" class="btn btn-primary btn-xs but-misi"><i class="fa fa-pencil"></i> </a>
                                        <?php } ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default input-group">
                                    <label>Tentang Kami</label>
                                    <div id="n_detail" class="p-l-10 p-r-10"><?php echo $detail->detail_profil; ?></div>
                                    <span class="input-group-addon">
                                        <?php
                                        $has_permission = has_permission('profil', 'add');
                                        if ($has_permission) {
                                            ?>
                                            <a href="" class="btn btn-primary btn-xs but-detail"><i class="fa fa-pencil"></i> </a>
                                        <?php } ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default input-group">
                                    <label>Sejarah Perusahaan</label>
                                    <div id="n_sejarah" class="p-l-10 p-r-10"><?php echo $detail->sejarah_profil; ?></div>
                                    <span class="input-group-addon">
                                        <?php
                                        $has_permission = has_permission('profil', 'add');
                                        if ($has_permission) {
                                            ?>
                                            <a href="" class="btn btn-primary btn-xs but-sejarah"><i class="fa fa-pencil"></i> </a>
                                        <?php } ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default input-group">
                                    <label>Kelebihan Dan Keunggulan</label>
                                    <div id="n_kelebihan" class="p-l-10 p-r-10"><?php echo $detail->kelebihan_profil; ?></div>
                                    <span class="input-group-addon">
                                        <?php
                                        $has_permission = has_permission('profil', 'add');
                                        if ($has_permission) {
                                            ?>
                                            <a href="" class="btn btn-primary btn-xs but-kelebihan"><i class="fa fa-pencil"></i> </a>
                                        <?php } ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="panel panel-transparent">
                <div class="panel-heading clearfix">
                    <div class="panel-title pull-left">Alamat</div>
                    <?php
                    $has_permission = has_permission('profil', 'add');
                    if ($has_permission) {
                    ?>
                    <a href="" class="btn btn-primary btn-xs pull-right but-add-alamat"><i class="fa fa-plus"></i> </a>
                   <?php } ?>

                </div>
                <div id="list-alamat" class="panel-body">


                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade slide-up disable-scroll" id="modal-nama" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="pg-close fs-14"></i>
                    </button>
                    <h5>Edit <span class="semi-bold"> Nama Perusahaan</span></h5>
                </div>
                <div class="modal-body m-t-20">
                    <form id="namaform" role="form">
                        <div class="form-group-attached">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Nama Perusahaan</label>
                                        <input id="isi" type="text" name="nama_profil" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-sm-6 m-t-10 sm-m-t-10">
                            <button type="submit" form="namaform" class="btn btn-primary btn-block m-t-5">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade slide-up disable-scroll" id="modal-text" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="pg-close fs-14"></i>
                    </button>
                    <h5>Edit <span class="semi-bold"> Nama Perusahaan</span></h5>
                </div>
                <div class="modal-body m-t-20">
                    <form id="form-text" role="form">
                        <div class="form-group-attached">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea id='nmisi' class="form-control summernote"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-sm-6 m-t-10 sm-m-t-10">
                            <button type="submit" form="form-text" class="btn btn-primary btn-block m-t-5">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade slide-up disable-scroll" id="modal-alamat" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="pg-close fs-14"></i>
                    </button>
                    <h5>Tambah <span class="semi-bold"> Alamat</span></h5>
                </div>
                <div class="modal-body m-t-20">
                    <form id="alamatform" role="form">
                        <input type="hidden" name="id_alamat">
                        <div class="form-group-attached">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Nama</label>
                                        <input type="text" name="nama_alamat" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Alamat</label>
                                        <input type="text" name="detail_alamat" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Alamat 2</label>
                                        <input type="text" name="detail2_alamat" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default">
                                        <label>Kota</label>
                                        <input type="text" name="kota_alamat" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default">
                                        <label>Provinsi</label>
                                        <input type="text" name="provinsi_alamat" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Telp</label>
                                        <input type="text" name="telp_alamat" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default">
                                        <label>Fax</label>
                                        <input type="text" name="fax_alamat" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default">
                                        <label>Email</label>
                                        <input type="text" name="email_alamat" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-sm-6 m-t-10 sm-m-t-10">
                            <button type="submit" form="alamatform" class="btn btn-primary btn-block m-t-5">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade slide-up disable-scroll" id="modal-del" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-body text-center m-t-20">
                    <p class="no-margin p-b-10 fs-16">Anda yakin menghapus data ini?</p>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <a href="" class="btn btn-danger but-hapus" data-id="">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>


