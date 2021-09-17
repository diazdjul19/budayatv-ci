<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Klien</li>
            </ol>
            <div class="row">
                <div class="col">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Klien</h3>
                            <p>Pencatatan semua data klien yang pernah mengundang klien.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <?php
                    $has_permission = has_permission('klien', 'add');
                    if ($has_permission) {
                        ?>
                        <a href="tender_klien/form" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"></i>
                            <span class="m-l-10">Klien Baru</span>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="card card-transparent ">
        <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
            <li class="nav-item">
                <a href="tender" ><span>Tender</span></a>
            </li>
            <li class="nav-item">
                <a href="klien" class="active"><span>Klien</span></a>
            </li>
            <li class="nav-item">
                <a href="group_bisnis/tender"><span>Group Bisnis</span></a>
            </li>
        </ul>
        <div class="tab-content">
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
                    <th>Nama </th>
                    <th>Undangan</th>
                    <th>Dalam Proses</th>
                    <th>Menang</th>
                    <th>Kalah</th>
                </tr>
                </thead>

            </table>
        </div>
    </div>
</div>