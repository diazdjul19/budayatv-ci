<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Proyek</li>
            </ol>
            <div class="row">
                <div class="col">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Proyek</h3>
                            <p>Pencatatan detail pengerjaan proyek .</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <?php
                    $has_permission = has_permission('proyek', 'add');
                    if ($has_permission) {
                        ?>
                        <a href="proyek/form" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"></i>
                            <span class="m-l-10">Proyek Baru</span>
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
                        <select name="" id="tahun" class="selectpicker" data-live-search="true" data-size="5">
                            <option value="">Semua Thn Anggaran</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018" selected>2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                        </select>
                    </div>

                </div>
                <div class="col-3">
                    <div class="form-group">
                        <select name="" id="tipe" class="selectpicker" data-live-search="true" data-size="5">
                            <option value="">Semua Tipe</option>
                            <?php foreach($tipe_proyek as $tp){ ?>
                            <option value="<?php echo $tp->id_proyek_t ?>"><?php echo $tp->nama_proyek_t ?></option>
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
                    <th width="150">Thn</th>
                    <th width="150">Tipe</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>