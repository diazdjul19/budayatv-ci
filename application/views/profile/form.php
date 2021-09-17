<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active"><?php echo $judul; ?></li>
            </ol>
            <div class="row">
                <div class="col-xl-5 col-lg-6 ">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Ubah Profile</h3>
                            <p>Halaman untuk mengubah foto profile dan password untuk memasuki aplikasi</p>
                            <p class="small hint-text m-t-5">Anjuran foto memiliki panjang dan lebar yang sama (kotak) dan password disarankan minimal 6 karakter dengan tambahan huruf kapiltal, angka, dan simbol</p>
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

                    <?php if($this->session->flashdata('message-danger')){ ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('message-danger') ?>
                        </div>
                    <?php }elseif ($this->session->flashdata('message-success')){ ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('message-success') ?>
                        </div>
                    <?php } ?>

                    <form enctype="multipart/form-data" method="post" action="profile/ubah_gambar_n_pass" role="form" class="myform" autocomplete="off" novalidate>
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo render_input('foto_user', 'foto', '','file', 'form-group-default ', ''); ?>

                                <div class="form-group form-group-default ">
                                    <label>Ubah password?</label>
                                    <select name="ganti_pass" class="form-control">
                                        <option value="0">Tidak</option>
                                        <option value="1">Ya</option>
                                    </select>
                                </div>

                                <div id="panel-pass">
                                    <?php echo render_input('pass_lama', 'Password Lama', '', 'password', 'form-group-default required', 'required'); ?>

                                    <?php echo render_input('pass_user', 'Password Baru', '', 'password', 'form-group-default required', 'required'); ?>
                                    <?php echo render_input('pass1_user', 'Ulangi Password', '', 'password', 'form-group-default required', 'required'); ?>
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

