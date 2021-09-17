<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Event</li>
            </ol>
            <div class="row">
                <div class="col">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Events</h3>
                            <p>Pencatatan event atau kegiatan yang terjadi.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <?php
                    $has_permission = has_permission('events', 'add');
                    if ($has_permission) {
                        ?>
                        <a href="events/form" class="btn btn-primary pull-right">
                            <i class="fa fa-plus"></i>
                            <span class="m-l-10">Event Baru</span>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="row">
        <div class="col">
            <div class="card card-default">
                <div class="card-block">
                    <div class="row">
                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" rel='tooltip' data-original-title='Pencarian Nama Event'>
                                    <span class="fa fa-search"></span></span>
                                </div>
                                <input type="text" id="search-table" class="form-control pull-right" placeholder="Pencarian">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <select id="kategori" class="selectpicker" data-live-search="true" data-size="5">
                                    <option value="">Semua Kategori</option>
                                    <?php foreach ($list_kategori as $lc) { ?>
                                        <option value="<?php echo $lc->id_ke ?>"><?php echo $lc->nama_ke; ?></option>
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
                            <th>Nama</th>
                            <th width="150">Kategori</th>
                            <th>Tanggal</th>
                            <th width="150"></th>
                        </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
