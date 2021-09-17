<div class="card card-default">
    <div class="card-block">
        <div class="row">
            <div class="col">
                <div class="input-group">
                    <span class="input-group-addon">Status</span>
                    <select id="status_selesai" class="selectpicker" data-live-search="true" data-size="5">
                        <option value="">Semua Proyek</option>
                        <option value="2">Proyek Selesai</option>
                        <option value="1">Proyek Belum Selesai</option>
                    </select>
                </div>

                <div class="input-group mt-2">
                    <span class="input-group-addon">Klien</span>
                    <select id="klien" class="selectpicker" data-live-search="true" data-size="5">
                        <option value="">Semua Klien</option>
                        <?php foreach ($list_klien as $lk) { ?>
                            <option value="<?php echo $lk->id_klien ?>"><?php echo $lk->nama_klien ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="input-group">
                            <span class="input-group-addon">Dari</span>
                            <input type="text" id="mulai" class="form-control datep"
                                   value="<?php echo "01-01-" . date('Y'); ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <span class="input-group-addon">Hingga</span>
                            <input type="text" id="selesai" class="form-control datep"
                                   value="<?php echo "31-12-" . date('Y'); ?>">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" id="cari" name="cari" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tab-content">
    <h1 class="text-center">Penagihan</h1>
    <p class="text-center mb-5">Periode <span id="p-mulai">01-01-<?php echo date('Y') ?> </span> s/d <span
            id="p-selesai">31-12-<?php echo date('Y') ?></span>
    </p>

    <table id="mytable" class="table table-striped">
        <thead>
        <tr>
            <th width="5%">No</th>
            <th width="30%">Proyek</th>
            <th width="15%">Nilai Proyek</th>
            <th width="13%">Nilai BQ</th>
            <th width="14%">Real Biaya</th>
            <th width="12%">Pg. Fisik</th>
            <th width="12%">Pg. Biaya</th>
        </tr>
        </thead>

        <tfoot>
        <tr>
            <th class="text-right" colspan="2">Total</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </tfoot>
    </table>
</div>
