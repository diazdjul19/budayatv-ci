<div class="container-fluid container-fixed-lg">
    <div class="row">
        <div class="col ">
            <h5 class="text-center">TOP 5 Gedung</h5>
            <?php
            $no = 1;
            foreach ($kantor as $k) { ?>
                <div class="deviasi-box <?php echo $warna[$no] ?>">
                    <div class="row no-gutters">
                        <div class="col-2">
                            <span class="angka"><?php echo $no ?></span>
                        </div>
                        <div class="col">
                            <div class="auto-overflow" style="height: 65px">
                            <a href="pelaksanaan/detail/<?php echo $k->proyek_id_spk ?>"
                               target="_blank"><?php echo $k->nama_spk ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Rp. <?php echo number_format($k->nilai_spk, 0, '.', '.') ?></p>
                        </div>
                        <div class="col-4">
                            <p class="bold"><?php echo $k->deviasi_spk ?> %</p>
                        </div>
                    </div>

                </div>
                <?php $no++;
            } ?>
        </div>
        <div class="col">
            <h5 class="text-center">TOP 5 Rumah</h5>
            <?php
            $no = 1;
            foreach ($rumah as $r) { ?>
                <div class="deviasi-box <?php echo $warna[$no] ?>">
                    <div class="row no-gutters">
                        <div class="col-2">
                            <span class="angka"><?php echo $no ?></span>
                        </div>
                        <div class="col">
                            <div class="auto-overflow" style="height: 65px">
                            <a href="pelaksanaan/detail/<?php echo $r->proyek_id_spk ?>"
                               target="_blank"><?php echo $r->nama_spk ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Rp. <?php echo number_format($r->nilai_spk, 0, '.', '.') ?></p>
                        </div>
                        <div class="col-4">
                            <p class="bold"><?php echo $r->deviasi_spk ?> %</p>
                        </div>
                    </div>

                </div>
                <?php $no++;
            } ?>
        </div>
        <div class="col">
            <h5 class="text-center">TOP 5 Lainnya</h5>
            <?php
            $no = 1;
            foreach ($blain as $b) { ?>
                <div class="deviasi-box <?php echo $warna[$no] ?>">
                    <div class="row no-gutters">
                        <div class="col-2">
                            <span class="angka"><?php echo $no ?></span>
                        </div>
                        <div class="col">
                            <div class="auto-overflow" style="height: 65px">
                            <a href="pelaksanaan/detail/<?php echo $b->proyek_id_spk ?>"
                               target="_blank"><?php echo $b->nama_spk ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Rp. <?php echo number_format($b->nilai_spk, 0, '.', '.') ?></p>
                        </div>
                        <div class="col-4">
                            <p class="bold"><?php echo $b->deviasi_spk ?> %</p>
                        </div>
                    </div>

                </div>
                <?php $no++;
            } ?>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <div class="card card-default">
                <div class="card-block">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card card-condensed no-border no-margin d-flex flex-column pt-2">
                <div id="chartInvestasi" class="full-width" style="height: 220px"></div>
            </div>
            <div class="card card-condensed no-border mt-4  d-flex flex-column pt-2">
                <div id="chartOperasional" class="full-width" style="height: 220px"></div>
            </div>
        </div>
    </div>
</div>