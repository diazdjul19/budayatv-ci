<div class="card card-default">
    <div class="card-block">
        <div class="input-group">
            <span class="input-group-addon">Proyek</span>
            <select id="proyek" class="selectpicker" data-live-search="true" data-size="5">
                <option value="">Pilih Proyek</option>
                <?php foreach ($list_proyek as $lp) { ?>
                    <option value="<?php echo $lp->id_proyek ?>"
                            data-subtext="<?php echo $lp->no_proyek ?>"><?php echo $lp->nama_proyek ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>

<div class="tab-content">
    <div id="tampil"></div>
</div>
