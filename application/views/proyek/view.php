<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="proyek">Proyek</a></li>
                <li class="breadcrumb-item active"><?php echo $data->nama_proyek; ?></li>
            </ol>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="card card-transparent">
        <div class="card-block">
            <div class="row">
                <div class="col">
                    <a href="proyek" class="btn btn-default"><i class="fa fa-arrow-circle-left mr-2"></i> Kembali</a>

                </div>
                <div class="col">
                    <div class="pull-right">
                        <a href="proyek/form/<?php echo $data->id_proyek ?>" class="btn btn-primary"><i
                                    class="fa fa-pencil mr-2"></i> Update</a>
                        <a href="proyek/hapus/<?php echo $data->id_proyek ?>" class="btn btn-danger"><i
                                    class="fa fa-times mr-2"></i> Hapus</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h5 class="mb-0"> TA / <?php echo $data->thn_anggaran_proyek ?></h5>
                    <h1 class="mt-0"><?php echo $data->nama_proyek ?></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-transparent mb-0">
        <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
            <li class="nav-item">
                <a href="proyek/detail/<?php echo $data->id_proyek ?>" class="<?php if ($submenu == 'perancangan') {
                    echo "active";
                } ?>"><span>Perancangan</span></a>
            </li>
            <li class="nav-item">
                <a href="proyek/pengawasan/<?php echo $data->id_proyek ?>" class="<?php if ($submenu == 'pengawasan') {
                    echo "active";
                } ?>"><span>Pengawasan</span></a>
            </li>
            <li class="nav-item">
                <a href="proyek/pelaksanaan/<?php echo $data->id_proyek ?>"
                   class="<?php if ($submenu == 'pelaksanaan') {
                       echo "active";
                   } ?>"><span>Pelaksanaan</span></a>
            </li>
        </ul>
    </div>
    <div class="card card-default">
        <div class="row">
            <div class="col-3">
                <div class="list-group">
                    <a href="proyek/detail/<?php echo $data->id_proyek ?>"
                       class="list-group-item list-group-item-action active">
                        Timeline Perencanaan
                    </a>
                    <a href="proyek/perencanaan_spk/<?php echo $data->id_proyek ?>"
                       class="list-group-item list-group-item-action">SPK</a>
                    <a href="proyek/perencanaan_progress/<?php echo $data->id_proyek ?>"
                       class="list-group-item list-group-item-action">Progress</a>
                </div>
            </div>
            <div class="col">
                <div class="card card-default mt-4">
                    <div class="card-block">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Target Pengiriman UseReq</td>
                                <td>
                                    <input type="text" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>Target Serah Terima</td>
                                <td>
                                    <input type="text" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>Target Deadline</td>
                                <td>
                                    <input type="text" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>Penerbitan Kontrak</td>
                                <td>
                                    <input type="text" class="form-control">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>