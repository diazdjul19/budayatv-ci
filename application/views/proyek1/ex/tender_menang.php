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
                            <h3>Tender Menang</h3>
                            <p>Daftar tender yang sudah dimenangkan tetapi belum memngisi STLP.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="card card-transparent ">
        <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
            <li class="nav-item">
                <a href="proyek"><span>Proyek Berjalan</span></a>
            </li>
            <li class="nav-item">
                <a href="proyek/tender_menang" class="active"><span>Tender Menang</span></a>
            </li>
        </ul>
    </div>
    <div class="card card-default">
        <div class="card-block">
            <div class="row">
                <div class="col">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white" rel='tooltip' data-original-title='Status Tender'><span class="fa fa-bolt"></span></span>
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
                        <span class="input-group-addon">
                            <span class="fa fa-search"></span>
                        </span>
                        <input type="text" id="search-table" class="form-control pull-right" placeholder="Pencarian">
                    </div>
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
                <th>Nama Pekerjaan</th>
                <th>User</th>
                <th>Nilai Proyek</th>
                <th>Tgl Tender</th>
            </tr>
            </thead>

        </table>
    </div>
</div>
