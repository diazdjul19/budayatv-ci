<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Role</li>
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
    <div class="card card-default">
        <div class="card-header">
            <div class="card-title">
                <?php
                $has_permission = has_permission('role', 'add');
                if ($has_permission) {
                ?>
                <a href="role/form" class="btn btn-primary">
                    <i class="fa fa-plus"></i>
                    <span class="m-l-10">Role Baru</span>
                </a>
                <?php } ?>
            </div>
            <div class="pull-right">
                <div class="col-xs-12">
                    <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="card-block">
            <table class="table table-hover my-table" id="mytable" width="100%">
                <thead>
                <tr>
                    <th>Nama</th>
                </tr>
                </thead>

            </table>
        </div>
    </div>
</div>