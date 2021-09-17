<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Perpustakaan</li>
            </ol>
            <div class="row">
                <div class="col">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Perpustakaan</h3>
                            <p>Pustaka dokumen dan data.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <?php
                    $has_permission = has_permission('perpustakaan', 'add');
                    if ($has_permission) {
                        ?>
                        <a href="perpustakaan/form" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"></i>
                            <span class="m-l-10">Pustaka Baru</span>
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
            <p class="small">Pencarian</p>
            <div class="row">
                <div class="col">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" rel='tooltip' data-original-title='Pencarian Proyek'>
                            <span class="fa fa-search"></span></span>
                        </div>
                        <input type="text" id="search-table" class="form-control pull-right" placeholder="Pencarian">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <select name="" id="tipe" class="selectpicker w-100" data-live-search="true" data-size="5">
                            <option value="">Semua Tipe</option>
                            <?php foreach($tipe_perpustakaan as $tp){ ?>
                            <option value="<?php echo $tp->id_tpustaka ?>"><?php echo $tp->nama_tpustaka ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-default">
        <div class="card-block">
            <table class="table table-hover table-sm table-striped my-table" id="mytable" width="100%">
                <thead>
                <tr>
                    <th>Nama </th>
                    <th width="150">Tipe</th>
                    <th width="100"></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>