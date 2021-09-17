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
                            <p>Monitoring kegiatan Proyek</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <a href="proyek/stlp1" class="btn btn-primary pull-right"><i class="fa fa-plus mr-2"></i> Tambah Proyek</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="card card-transparent ">
        <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
            <li class="nav-item">
                <a href="proyek" class="active"><span>Proyek Berjalan</span></a>
            </li>
            <li class="nav-item">
                <a href="proyek/selesai"><span>Proyek Selesai</span></a>
            </li>
        </ul>
    </div>
    <div class="card card-default">
        <div class="card-block">
            <div class="row">
                <div class="col">

                </div>
                <div class="col">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" rel='tooltip' data-original-title='Status Tender'>
                                <span class="fa fa-search"></span></span>
                        </div>
                        <input type="text" id="search-table" class="form-control pull-right" placeholder="Pencarian">
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <div class="input-group">
                        <select id="tahap" class="selectpicker" data-live-search="true" data-size="5">
                            <option value="">Semua Cabang</option>
                            <?php foreach($list_cabang as $lc){ ?>
                            <option value="<?php echo $lc->id_lokasi ?>"><?php echo $lc->nama_lokasi; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        <select id="tahap" class="selectpicker" data-live-search="true" data-size="5">
                            <option value="">Semua Klien</option>
                            <?php foreach($list_klien as $lc){ ?>
                                <option value="<?php echo $lc->id_klien ?>"><?php echo $lc->nama_klien; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-default">
        <div class="card-block">
            <table class="table table-hover table-striped my-table" id="mytable" width="100%">
                <thead>
                <tr>
                    <th>Nama Pekerjaan</th>
                    <th>Nilai Proyek</th>
                    <th>Nomor Proyek</th>
                </tr>
                </thead>

            </table>
        </div>
    </div>
</div>