<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Tender</li>
            </ol>
            <div class="row">
                <div class="col">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Tender</h3>
                            <p>Pencatatan semua data tender yang pernah di ikuti dan status atas tender.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <?php
                    $has_permission = has_permission('tender', 'add');
                    if ($has_permission) {
                        ?>
                        <a href="tender/tahap1" class="btn btn-primary pull-right mb-3">
                            <i class="fa fa-plus"></i>
                            <span class="m-l-10">Undangan Tender Baru</span>
                        </a>
                        <br>
                        <a href="tender/all_in_one" class="btn btn-success pull-right">
                            <i class="fa fa-plus"></i>
                            <span class="m-l-10">All in One Entry</span>
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
                <a href="tender" class="active"><span>Tender</span></a>
            </li>
            <li class="nav-item">
                <a href="tender_klien"><span>Klien</span></a>
            </li>
            <li class="nav-item">
                <a href="group_bisnis/tender"><span>Group Bisnis</span></a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="row">
                <div class="col">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white" rel='tooltip'
                                  data-original-title='Status Tender'><span class="fa fa-bolt"></span></span>
                        </div>
                        <select id="tahap" class="selectpicker">
                            <option value="">Tampil Semua</option>
                            <option value="th-0">Tahap 1</option>
                            <option value="th-1">Tahap 2</option>
                            <option value="th-2">Tahap 3</option>
                            <option value="th-3">Tahap 4</option>
                            <option value="st-1">Menang</option>
                            <option value="st-2">Kalah</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white" rel='tooltip'
                                  data-original-title='Urutkan Data'><span class="fa fa-sort"></span></span>
                        </div>
                        <select id="urutan" class="selectpicker" data-live-search="true">
                            <optgroup label="Nama Pekerjaan">
                                <option value="nama_tender-a" data-icon="fa fa-sort-alpha-asc">Nama Pekerjaan</option>
                                <option value="nama_tender-z" data-icon="fa fa-sort-alpha-desc">Nama Pekerjaan</option>
                            </optgroup>
                            <optgroup label="User">
                                <option value="nama_klien-a" data-icon="fa fa-sort-alpha-asc">User</option>
                                <option value="nama_klien-z" data-icon="fa fa-sort-alpha-desc">User</option>
                            </optgroup>
                            <optgroup label="Nilai Pekerjaan">
                                <option value="nominal_tender-a" data-icon="fa fa-long-arrow-down">Nilai Pekerjaan
                                </option>
                                <option value="nominal_tender-z" data-icon="fa fa-long-arrow-up">Nilai Pekerjaan
                                </option>
                            </optgroup>
                            <optgroup label="Nilai Penawaran">
                                <option value="penawaran_tender-a" data-icon="fa fa-long-arrow-down">Nilai Penawaran
                                </option>
                                <option value="penawaran_tender-z" data-icon="fa fa-long-arrow-up">Nilai Penawaran
                                </option>
                            </optgroup>
                            <optgroup label="Nilai Pemenang">
                                <option value="menang_tender-a" data-icon="fa fa-long-arrow-down">Nilai Pemenang
                                </option>
                                <option value="menang_tender-z" data-icon="fa fa-long-arrow-up">Nilai Pemenang</option>
                            </optgroup>
                            <optgroup label="Tanggal Anwizjing">
                                <option value="aw_tgl_tender-a" data-icon="fa fa-long-arrow-down">Tanggal Anwizjing
                                </option>
                                <option value="aw_tgl_tender-z" data-icon="fa fa-long-arrow-up">Tanggal Anwizjing
                                </option>
                            </optgroup>
                            <optgroup label="Tanggal Penerimaan BAA">
                                <option value="pb_tgl_tender-a" data-icon="fa fa-long-arrow-down">Tanggal Penerimaan BAA
                                </option>
                                <option value="pb_tgl_tender-z" data-icon="fa fa-long-arrow-up">Tanggal Penerimaan BAA
                                </option>
                            </optgroup>
                            <optgroup label="Tanggal Tender">
                                <option value="tgl_tender-a" data-icon="fa fa-long-arrow-down">Tanggal Tender</option>
                                <option value="tgl_tender-z" data-icon="fa fa-long-arrow-down">Tanggal Tender</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
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
                    <th>Nama Pekerjaan</th>
                    <th>User</th>
                    <th>Nilai Proyek</th>
                    <th>Jadwal</th>
                </tr>
                </thead>

            </table>
        </div>
    </div>
</div>