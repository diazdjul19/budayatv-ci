<div class="col">
    <div class="card card-default mt-4">
        <div class="card-block">
            <h4>Detail</h4>
            <h2>3. Pelaksanaan</h2>
            <?php if (count($spk) == 1) { ?>
                <div class="row">
                    <div class="col-4">Nama Kontrak</div>
                    <div class="col"><?php echo $s->nama_spk ?></div>
                </div>
                <div class="row">
                    <div class="col-4">Nama Rekanan</div>
                    <div class="col"><?php echo $s->rekanan_spk ?></div>
                </div>
                <div class="row">
                    <div class="col-4">NO. SP/SPK</div>
                    <div class="col"><?php echo $s->no_spk ?></div>
                </div>
                <div class="row">
                    <div class="col-4">Nilai Pekerjaan</div>
                    <div class="col">Rp. <?php echo number_format($s->nilai_spk, 0, '.', '.') ?></div>
                </div>
                <div class="row">
                    <div class="col-4">Bank Garansi Uang Muka</div>
                    <div class="col">Rp. <?php if ($s->bg_uang_spk != 0) echo  number_format($s->bg_uang_spk, 0, '.','.') ?></div>
                </div>
                <div class="row">
                    <div class="col-4">Jangka Waktu BG Uang Muka</div>
                    <div class="col"><?php if ($s->bg_jwaktu_spk != '0000-00-00'){
                         if($s->bg_jwaktu_spk != '1970-01-01'){echo tgl_indo($s->bg_jwaktu_spk, 'x', 9);}
                    }?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">Bank Garansi Pelaksanaan</div>
                    <div class="col">Rp. <?php if ($s->bg_pelaksanaan_spk != 0) echo number_format($s->bg_pelaksanaan_spk, 0, '.', '.') ?></div>
                </div>
                <div class="row">
                    <div class="col-4">Jangka Waktu BG Pelaksanaan x</div>
                    <div class="col"><?php if ($s->bg_jwaktu_p_spk != '0000-00-00' ) {
                        if($s->bg_jwaktu_p_spk != '1970-01-01'){ echo tgl_indo($s->bg_jwaktu_p_spk, 'x', 9);}
                    } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">Jangka Waktu</div>
                    <div class="col"><?php if ($s->mulai_spk != '0000-00-00') if($s->mulai_spk != '1970-01-01') echo tgl_indo($s->mulai_spk, 'x', 9) ?>
                        s.d <?php if ($s->selesai_spk != '0000-00-00') if($s->selesai_spk != '1970-01-01') echo tgl_indo($s->selesai_spk, 'x', 9) ?></div>
                </div>


                <?php if (count($progress)) { ?>
                    <div class="row mt-5">
                        <div class="col">
                            <h5>Progress Pekerjaan</h5>

                            <div id="kurvas" style="width: 100%; height: 400px"></div>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Detail</th>
                                    <th width="250">Tanggal</th>
                                    <th width="200">Nilai (Rp)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($progress as $p) { ?>
                                    <tr>
                                        <td><?php echo $p->detail_progress ?>
                                            <span class="bold">(<?php echo $p->persen_progress ?>%)</span>
                                        </td>
                                        <td>
                                            <p class="m-0">
                                                <span class="bold">Deadline</span>
                                                <?php if ($p->tgl_progress != "0000-00-00") echo tgl_indo($p->tgl_progress, 'x', 9) ?>
                                            </p>
                                            <p class="m-0">
                                                <span class="bold">Approval </span>
                                                <?php if ($p->approval_progress != "0000-00-00") echo tgl_indo($p->approval_progress, 'x', 9) ?>
                                            </p>
                                            <p class="m-0">
                                                <span class="bold">Bayar </span>
                                                <?php if ($p->bayar_progress != "0000-00-00") echo tgl_indo($p->bayar_progress, 'x', 9) ?>
                                            </p>
                                        </td>
                                        <td class="text-right">
                                            <?php echo number_format(($s->nilai_spk * $p->persen_progress) / 100, 0, '.', '.') ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php } ?>

            <?php } elseif (count($spk) > 1) { ?>

            <?php } else { ?>
                <a href="perancangan/spk/<?php echo $data->id_proyek ?>">Belum Ada Kontrak / SPK</a>
            <?php } ?>


        </div>
    </div>
</div>