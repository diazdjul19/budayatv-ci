<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Revisi Aplikasi</li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-transparent">
                        <div class="card-block no-padding">
                            <h2 class="clearfix">Revisi Aplikasi</h2>
                            <p>Jika ingin melaporkan kepada programmer jika terdapat <span class="bold">Error</span> atau <span class="bold">Revisi / Perubahan</span> pada modul yang tersedia silahkan laporkan pada modul ini.</p>
                            <p>Pilih Modul yang akan anda laporkan, selanjutnya deskripsikan error atau perubahan yang anda kehendaki pada kolom lapor revisi, selanjutnya tekan tombol kirim untuk mengirimkan kepada programmer atau tekan tombol batal untuk membatalkan dan kembali ke halaman utama revisi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid container-fixed-lg">
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <a href="revisi/form" class="btn btn-danger">
                        <i class="fa fa-plus"></i>
                        <span class="m-l-10">Revisi Baru</span>
                    </a>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-5">

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="fa fa-search"></span>
                        </span>
                        <input type="text" id="search_table" class="form-control" placeholder="Pencarian">
                    </div>
                </div>
                <div class="col-md-2">
                    <select id="status_jawab" class="form-control">
                        <option value="">All</option>
                        <option value="1">Belum dijawab</option>
                        <option value="2">On progress</option>
                        <option value="3">Selesai</option>
                    </select>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="card m-b-0 card-transparent">
                        <div class="card-body no-padding">
                            <p class="card-text padding-10 text-right">
                                <i class="fa fa-question-circle text-danger"></i> Menunggu tanggapan
                                <i class="m-l-20 fa fa-clock-o text-danger"></i> Sedang diproses
                                <i class="m-l-20 fa fa-check text-success"></i> Selesai
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-hover" id="mytable" width="100%">
                <thead>
                <tr>
                    <th class="bg-danger text-white">Modul</th>
                    <th class="bg-danger text-white">Revisi</th>
                    <th class="bg-danger text-white">Laporan</th>
                    <th class="bg-danger"></th>
                </tr>
                </thead>

            </table>

        </div>
    </div>
</div>