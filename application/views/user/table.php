<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
            <div class="row">
                <div class="col">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Users</h3>
                            <p>Akses untuk login kepada staf, pegawai, karyawan atau pimpinan yang akan menggunakan
                                aplikasi, perhatikan juga "Role" yang diberikan kepada user.</p>
                            <p class="small hint-text m-t-5">Anjuran Hak akses untuk modul User hanya untuk Manager atau
                                Pimpinan.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <?php
                    $has_permission = has_permission('user', 'add');
                    if ($has_permission) {
                        ?>
                        <a href="user/form" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"></i>
                            <span class="m-l-10">User Baru</span>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg">
    <div class="card card-info">
        <div class="card-block">
            <div class="row mb-3">
                <div class="col"></div>
                <div class="col">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white" rel='tooltip'
                                  data-original-title='Filter berdasarkan group bisnis'><span
                                        class="fa fa-search"></span></span>
                        </div>
                        <input type="text" id="search-table" class="form-control pull-right" placeholder="Pencarian">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-default">
        <div class="card-block">
            <table class="table table-hover my-table" id="mytable" width="100%">
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Last Active</th>
                    <th></th>
                </tr>
                </thead>

            </table>

        </div>
    </div>
</div>