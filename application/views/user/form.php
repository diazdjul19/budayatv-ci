<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="users">Users</a></li>
                <li class="breadcrumb-item active"><?php echo $judul; ?></li>
            </ol>
            <div class="row">
                <div class="col-xl-5 col-lg-6 ">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Users</h3>
                            <p>Akses untuk login kepada staf, pegawai, karyawan atau pimpinan yang akan menggunakan aplikasi, perhatikan juga "Role" yang diberikan kepada user.</p>
                            <p class="small hint-text m-t-5">Anjuran Hak akses untuk modul User hanya untuk Manager atau Pimpinan.</p>
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
                                    $value = $data->email_user;
                                } else {
                                    $value = '';
                                }; ?>
                                <?php echo render_input('email_user', 'Email', $value, 'text', 'form-group-default required', 'required'); ?>

                                <?php if (isset($data)) {
                                    $value = $data->nama_user;
                                } else {
                                    $value = '';
                                }; ?>
                                <?php echo render_input('nama_user', 'Nama', $value, 'text', 'form-group-default required', 'required'); ?>

                                <?php if ($edit == 0) { ?>
                                    <?php echo render_input('pass_user', 'Password', '', 'password', 'form-group-default required', 'required'); ?>
                                    <?php echo render_input('pass1_user', 'Ulangi Password', '', 'password', 'form-group-default required', 'required'); ?>
                                <?php } ?>

                                <div class="form-group form-group-default ">
                                    <label>Role</label>
                                    <select name="role_user" class="form-control select2">
                                        <option value=""> -</option>
                                        <?php
                                        if (isset($data)) {
                                            $v_role = $data->role_user;
                                        } else {
                                            $v_role = '';
                                        }

                                        foreach ($role_list as $rl) {
                                            ?>
                                            <option value="<?php echo $rl->id_role ?>" <?php if ($v_role == $rl->id_role) {
                                                echo " selected";
                                            } ?>><?php echo mego_unlink($rl->nama_role); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <?php
                                $checked = '';
                                $admin_alert = 'hide';
                                if ($edit == 1) {
                                    if ($data->admin_user == 1) {
                                        $checked = 'checked';
                                        $admin_alert = '';
                                    }


                                }

                                ?>
                                <div class="form-group">
                                    <input type="checkbox" value="1" name="admin_user" data-init-plugin="switchery"
                                           data-size="small" data-color="success" <?php echo $checked; ?> />
                                    <label class="m-l-10">Administrator</label>

                                    <div id="admin_alert" class="alert alert-danger m-t-10 <?php echo $admin_alert; ?>">
                                        <strong>Bahaya : </strong> Hati-hati membuat status user sebagai administrator
                                        karena akan membuat user dapat melakukan apa saja tanpa batas.
                                    </div>
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

