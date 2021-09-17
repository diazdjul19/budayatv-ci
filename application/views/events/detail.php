<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="events">Event</a></li>
                <li class="breadcrumb-item active"><?php echo $judul; ?></li>
            </ol>
            <div class="row">
                <div class="col-xl-5 col-lg-6 ">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Event</h3>
                            <p>Pencatatan event atau kegiatan yang terjadi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg">
    <div class="row">
        <div class="col-sm-7">
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title"><?php echo $judul; ?></div>
                </div>
                <div class="card-block">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <span class="bold">Nama Event</span>
                                <p><?php echo $data->nama_event ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="bold">Tanggal</span>
                                <p><?php echo tgl_indo($data->mulai_event, 'x', 9) ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="bold">Keterangan</span>
                                <p><?php echo $data->ket_event ?></p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="events" class="btn btn-default mt-5"><i class="fa fa-chevron-left mr-2"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

