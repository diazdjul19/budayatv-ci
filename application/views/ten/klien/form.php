<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="klien">Klien</a></li>
                <li class="breadcrumb-item active"><?php echo $judul; ?></li>
            </ol>
            <div class="row">
                <div class="col-xl-5 col-lg-6 ">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Klien</h3>
                            <p>Pencatatan semua data perolehan dari proyek yang dikerjakan.</p>
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

                                <div class="form-group form-group-default ">
                                    <label>Grup</label>
                                    <select name="group_klien_id" class="select-group-klien full-width">
                                        <option value="" ></option>
                                        <?php
                                        if (isset($data)) {
                                            $v_grup = $data->group_klien_id;
                                        } else {
                                            $v_grup = '';
                                        }

                                        foreach ($group_list as $gl) {
                                            ?>
                                            <option value="<?php echo $gl->id_group_klien ?>" <?php if ($v_grup == $gl->id_group_klien) {
                                                echo " selected";
                                            } ?>><?php echo $gl->nama_group_klien; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <?php if (isset($data)) {
                                    $value = $data->nama_klien;
                                } else {
                                    $value = '';
                                }; ?>
                                <?php echo render_input('nama_klien', 'Nama', $value, 'text', 'form-group-default required', 'required'); ?>

                                <?php if (isset($data)) {
                                    $value = $data->telp_klien;
                                } else {
                                    $value = '';
                                }; ?>
                                <?php echo render_input('telp_klien', 'Telepon', $value, 'text', 'form-group-default'); ?>

                                <?php if (isset($data)) {
                                    $value = $data->alamat_klien;
                                } else {
                                    $value = '';
                                }; ?>
                                <?php echo render_input('alamat_klien', 'alamat', $value, 'text', 'form-group-default'); ?>
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

