<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Cabang</li>
            </ol>
            <div class="row">
                <div class="col">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Cabang</h3>
                            <p>Data Cabang yang terdapat dalam perusahaan</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <?php
                    $has_permission = has_permission('cabang', 'add');
                    if ($has_permission) {
                        ?>
                        <a href="cabang/form" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"></i>
                            <span class="m-l-10">Cabang Baru</span>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="card card-default">
        <div class="card-block">
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="fa fa-search"></span>
                        </span>
                        <input type="text" id="search-table" class="form-control pull-right" placeholder="Pencarian">
                    </div>
                </div>
            </div>
            <hr class="m-b-30">

            <table class="table table-hover my-table" id="mytable" width="100%">
                <thead>
                <tr>
                    <th>Nama Cabang</th>
                    <th>Kode Cabang</th>
                </tr>
                </thead>

            </table>
        </div>
    </div>
</div>