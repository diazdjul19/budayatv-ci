<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="role">Role</a></li>
                <li class="breadcrumb-item active"><?php echo $judul; ?></li>
            </ol>
            <div class="row">
                <div class="col-xl-5 col-lg-6 ">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Role</h3>
                            <p>Untuk mengatur hak akses lihat, tambah, ubah atau hapus user atau group user terhadap modul yang ada.</p>
                            <p class="small hint-text m-t-5">Anjuran Hak akses untuk modul role hanya untuk Manager atau Pimpinan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg">
    <div class="row">
        <div class="col">
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title"><?php echo $judul ?></div>
                </div>
                <div class="card-block">
                    <form id="myform" method="post" action="" role="form" class="myform" autocomplete="off" novalidate>
                        <div class="row">
                            <div class="col-md-12">
                                <?php if (isset($data)) {
                                    $value = $data->nama_role;
                                } else {
                                    $value = '';
                                }; ?>
                                <?php echo render_input('nama_role', 'Nama', $value, 'text', 'form-group-default required', 'required'); ?>

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Role</th>
                                        <th width="150">View</th>
                                        <th width="150">Add</th>
                                        <th width="150">Edit</th>
                                        <th width="150">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $c_view = '';
                                    $c_add = '';
                                    $c_edit = '';
                                    $c_del = '';

                                    if($edit == 1) {
                                        foreach ($role_permission as $rp) {
                                            if ('anggaran' == $rp->menu_rolep) {
                                                if($rp->view_rolep == 1)
                                                    $c_view = 'checked';

                                                if($rp->add_rolep == 1)
                                                    $c_add = 'checked';

                                                if($rp->edit_rolep == 1)
                                                    $c_edit = 'checked';

                                                if($rp->del_rolep == 1)
                                                    $c_del = 'checked';
                                            }
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td>Anggaran</td>
                                        <td><input type="checkbox"  name="pmission[anggaran-view]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_view; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[anggaran-add]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_add; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[anggaran-edit]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_edit; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[anggaran-del]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_del; ?> /></td>
                                    </tr>
                                    <?php
                                    $c_view = '';
                                    $c_add = '';
                                    $c_edit = '';
                                    $c_del = '';

                                    if($edit == 1) {
                                        foreach ($role_permission as $rp) {
                                            if ('proyek' == $rp->menu_rolep) {
                                                if($rp->view_rolep == 1)
                                                    $c_view = 'checked';

                                                if($rp->add_rolep == 1)
                                                    $c_add = 'checked';

                                                if($rp->edit_rolep == 1)
                                                    $c_edit = 'checked';

                                                if($rp->del_rolep == 1)
                                                    $c_del = 'checked';
                                            }
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td>Proyek</td>
                                        <td><input type="checkbox"  name="pmission[proyek-view]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_view; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[proyek-add]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_add; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[proyek-edit]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_edit; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[proyek-del]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_del; ?> /></td>
                                    </tr>
                                    <?php
                                    $c_view = '';
                                    $c_add = '';
                                    $c_edit = '';
                                    $c_del = '';

                                    if($edit == 1) {
                                        foreach ($role_permission as $rp) {
                                            if ('perpustakaan' == $rp->menu_rolep) {
                                                if($rp->view_rolep == 1)
                                                    $c_view = 'checked';

                                                if($rp->add_rolep == 1)
                                                    $c_add = 'checked';

                                                if($rp->edit_rolep == 1)
                                                    $c_edit = 'checked';

                                                if($rp->del_rolep == 1)
                                                    $c_del = 'checked';
                                            }
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td>Perpustakaan</td>
                                        <td><input type="checkbox"  name="pmission[perpustakaan-view]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_view; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[perpustakaan-add]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_add; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[perpustakaan-edit]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_edit; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[perpustakaan-del]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_del; ?> /></td>
                                    </tr>

                                    <?php
                                    $c_view = '';
                                    $c_add = '';
                                    $c_edit = '';
                                    $c_del = '';

                                    if($edit == 1) {
                                        foreach ($role_permission as $rp) {
                                            if ('about_us' == $rp->menu_rolep) {
                                                if($rp->view_rolep == 1)
                                                    $c_view = 'checked';

                                                if($rp->add_rolep == 1)
                                                    $c_add = 'checked';

                                                if($rp->edit_rolep == 1)
                                                    $c_edit = 'checked';

                                                if($rp->del_rolep == 1)
                                                    $c_del = 'checked';
                                            }
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td>About Us</td>
                                        <td><input type="checkbox"  name="pmission[about_us-view]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_view; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[about_us-add]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_add; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[about_us-edit]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_edit; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[about_us-del]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_del; ?> /></td>
                                    </tr>

                                    <?php
                                    $c_view = '';
                                    $c_add = '';
                                    $c_edit = '';
                                    $c_del = '';

                                    if($edit == 1) {
                                        foreach ($role_permission as $rp) {
                                            if ('events' == $rp->menu_rolep) {
                                                if($rp->view_rolep == 1)
                                                    $c_view = 'checked';

                                                if($rp->add_rolep == 1)
                                                    $c_add = 'checked';

                                                if($rp->edit_rolep == 1)
                                                    $c_edit = 'checked';

                                                if($rp->del_rolep == 1)
                                                    $c_del = 'checked';
                                            }
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td>Events</td>
                                        <td><input type="checkbox"  name="pmission[events-view]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_view; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[events-add]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_add; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[events-edit]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_edit; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[events-del]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_del; ?> /></td>
                                    </tr>

                                    <?php
                                    $c_view = '';
                                    $c_add = '';
                                    $c_edit = '';
                                    $c_del = '';

                                    if($edit == 1) {
                                        foreach ($role_permission as $rp) {
                                            if ('user' == $rp->menu_rolep) {
                                                if($rp->view_rolep == 1)
                                                    $c_view = 'checked';

                                                if($rp->add_rolep == 1)
                                                    $c_add = 'checked';

                                                if($rp->edit_rolep == 1)
                                                    $c_edit = 'checked';

                                                if($rp->del_rolep == 1)
                                                    $c_del = 'checked';
                                            }
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="5" class="bold">Pengaturan</td>
                                    </tr>
                                    <tr>
                                        <td class="p-l-40">User</td>
                                        <td><input type="checkbox"  name="pmission[user-view]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_view; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[user-add]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_add; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[user-edit]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_edit; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[user-del]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_del; ?> /></td>
                                    </tr>
                                    <?php
                                    $c_view = '';
                                    $c_add = '';
                                    $c_edit = '';
                                    $c_del = '';

                                    if($edit == 1) {
                                        foreach ($role_permission as $rp) {
                                            if ('role' == $rp->menu_rolep) {
                                                if($rp->view_rolep == 1)
                                                    $c_view = 'checked';

                                                if($rp->add_rolep == 1)
                                                    $c_add = 'checked';

                                                if($rp->edit_rolep == 1)
                                                    $c_edit = 'checked';

                                                if($rp->del_rolep == 1)
                                                    $c_del = 'checked';
                                            }
                                        }
                                    }
                                    ?>

                                    <tr>
                                        <td class="p-l-40">Role</td>
                                        <td><input type="checkbox"  name="pmission[role-view]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_view; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[role-add]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_add; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[role-edit]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_edit; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[role-del]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_del; ?> /></td>
                                    </tr>
                                    <?php
                                    $c_view = '';
                                    $c_add = '';
                                    $c_edit = '';
                                    $c_del = '';

                                    if($edit == 1) {
                                        foreach ($role_permission as $rp) {
                                            if ('tipe_proyek' == $rp->menu_rolep) {
                                                if($rp->view_rolep == 1)
                                                    $c_view = 'checked';

                                                if($rp->add_rolep == 1)
                                                    $c_add = 'checked';

                                                if($rp->edit_rolep == 1)
                                                    $c_edit = 'checked';

                                                if($rp->del_rolep == 1)
                                                    $c_del = 'checked';
                                            }
                                        }
                                    }
                                    ?>

                                    <tr>
                                        <td class="p-l-40">Tipe Proyek</td>
                                        <td><input type="checkbox"  name="pmission[tipe_proyek-view]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_view; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[tipe_proyek-add]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_add; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[tipe_proyek-edit]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_edit; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[tipe_proyek-del]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_del; ?> /></td>
                                    </tr>
                                    <?php
                                    $c_view = '';
                                    $c_add = '';
                                    $c_edit = '';
                                    $c_del = '';

                                    if($edit == 1) {
                                        foreach ($role_permission as $rp) {
                                            if ('tipe_pustaka' == $rp->menu_rolep) {
                                                if($rp->view_rolep == 1)
                                                    $c_view = 'checked';

                                                if($rp->add_rolep == 1)
                                                    $c_add = 'checked';

                                                if($rp->edit_rolep == 1)
                                                    $c_edit = 'checked';

                                                if($rp->del_rolep == 1)
                                                    $c_del = 'checked';
                                            }
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td class="p-l-40">Tipe Pustaka</td>
                                        <td><input type="checkbox"  name="pmission[tipe_pustaka-view]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_view; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[tipe_pustaka-add]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_add; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[tipe_pustaka-edit]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_edit; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[tipe_pustaka-del]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_del; ?> /></td>
                                    </tr>
                                    <?php
                                    $c_view = '';
                                    $c_add = '';
                                    $c_edit = '';
                                    $c_del = '';

                                    if($edit == 1) {
                                        foreach ($role_permission as $rp) {
                                            if ('kategori_event' == $rp->menu_rolep) {
                                                if($rp->view_rolep == 1)
                                                    $c_view = 'checked';

                                                if($rp->add_rolep == 1)
                                                    $c_add = 'checked';

                                                if($rp->edit_rolep == 1)
                                                    $c_edit = 'checked';

                                                if($rp->del_rolep == 1)
                                                    $c_del = 'checked';
                                            }
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td class="p-l-40">Kategori Event</td>
                                        <td><input type="checkbox"  name="pmission[kategori_event-view]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_view; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[kategori_event-add]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_add; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[kategori_event-edit]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_edit; ?> /></td>
                                        <td><input type="checkbox"  name="pmission[kategori_event-del]" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $c_del; ?> /></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Simpan</button>
                        <a href="role" class="btn btn-default"> Batal <i class="fa fa-times"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

