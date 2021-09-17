<h1 class="text-center mb-5">Penagihan Proyek </h1>

<table class="table mb-1">
    <tr>
        <td>No Dokumen</td>
        <td><?php echo $data->no_dokumen_proyek; ?></td>
        <td>Pemberi Kerja</td>
        <td><?php echo $data->nama_klien ?></td>
    </tr>
    <tr>
        <td>No Proyek</td>
        <td><?php echo $data->no_proyek; ?></td>
        <td>Nilai Proyek</td>
        <td class="bold">Rp <?php echo number_format($data->nilai_proyek, 2, ',', '.') ?></td>
    </tr>
    <tr>
        <td>No SPK</td>
        <td><?php echo $data->no_spk_proyek; ?></td>
        <td>Tanggal SPK</td>
        <td><?php echo tgl_indo($data->mulai_proyek, 'x', 9) ?></td>
    </tr>
</table>

<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th width="15%">Ren. Tagihan</th>
            <th>Realisasi Penagihan</th>
            <th>Tanda Terima Penagihan</th>
            <th width="21%">Pembayaran Penagihan</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $tgl = date('Y-m-d');
        foreach ($list as $l) {
            $cek = $progress_model->get_data($data->id_proyek, $l->id_penagihan);

            ?>
            <tr>
                <td>
                    <?php
                    if ($l->tipe_penagihan == 1) {
                        echo "Penagihan DP <br>";
                    } elseif ($l->tipe_penagihan == 2) {
                        echo "Penagihan Prestasi $no <br>";
                        $no++;
                    } elseif ($l->tipe_penagihan == 3) {
                        echo "Penagihan Final <br>";
                    } else {
                        echo "Penagihan Retensi <br>";
                    }
                    ?>
                    <?php
                    if ($cek) {
                        echo tgl_indo($cek->tgl_progress, 'x', 9) . "<br>";
                    }
                    ?>
                    <?php if ($l->tipe_penagihan != 1) echo "($l->persen_penagihan %)<br>"; ?>
                    <?php echo "<span class='bold'>" . angka_akun($l->nominal_penagihan) . "</span>"; ?>

                </td>
                <td class="realisasi-penagihan v-align-top">
                    <?php
                    $hide = 'hide';
                    if($l->status_penagihan == 1 && $l->tahap_penagihan == 0 ) {
                        $hide = '';
                    }

                    if($l->tipe_penagihan == 4 && $l->tahap_penagihan == 0){
                        $hide = '';
                    }
                    ?>

                    <?php if($l->status_penagihan == 1 && $l->tahap_penagihan >= 0 || $l->tipe_penagihan == 4){ ?>
                        <form class="form-realisasi-penagihan <?php echo $hide ?>" action="penagihan/save/<?php echo $data->id_proyek ?>" method="post">
                            <input type="hidden" name="id_penagihan" value="<?php echo $l->id_penagihan ?>">

                            <?php
                            $value = '';
                            if($l->invoice_penagihan){
                                $value = $l->invoice_penagihan;
                            }
                            ?>
                            <div class="form-group-default">
                                <label class="control-label">No Invoice</label>
                                <input type="text" value="<?php echo $value ?>" name="invoice_penagihan" class="form-control" placeholder="No Invoice" required>
                            </div>

                            <?php
                            $value = '';
                            if($l->invoice_tgl_penagihan){
                                $value = tgl_indo($l->invoice_tgl_penagihan, 'angka', 9);
                            }
                            ?>
                            <div class="form-group-default">
                                <label for="" class="control-label">Tanggal Invoice</label>
                                <input type="text" name="invoice_tgl_penagihan" class="form-control datep" placeholder="Tanggal" value="<?php echo $value ?>" required>
                            </div>
                            <div class="form-group-default">
                                <label for="" class="control-label">Jatuh Tempo Invoice</label>
                                <input type="text" name="invoice_tempo_penagihan" class="form-control datep" placeholder="Tanggal" value="<?php echo tgl_indo($l->invoice_tempo_penagihan,'angka',9) ?>" required>
                            </div>
                            <div class="form-group-default">
                                <label for="" class="control-label">Pokok</label>
                                <input type="text" name="invoice_nominal_penagihan" class="form-control inputmask" value="<?php echo angka_akun($l->invoice_nominal_penagihan)?>" required>
                            </div>

                            <?php
                            $cekbox ='';
                            $hide = 'hide';
                            if($l->invoice_ppn_nominal_penagihan){
                                $cekbox = 'checked';
                                $hide = '';
                            }?>
                            <div class="form-group pt-2">
                                <input type="checkbox" value="1" name="check_pph_penagihan" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $cekbox ?>><span class="pl-2">PPn 10%</span>
                            </div>
                            <div id="ppn_penagihan" class="<?php echo $hide ?>">
                                <div class="form-group-default">
                                    <label for="" class="control-label">PPn</label>
                                    <input type="text" name="invoice_ppn_nominal_penagihan" class="form-control inputmask text-primary" value="<?php echo $l->invoice_ppn_nominal_penagihan ?>" readonly>
                                </div>
                                <div class="form-group-default">
                                    <label for="" class="control-label">Total</label>
                                    <input type="text" name="invoice_total_nominal_penagihan" class="form-control inputmask text-primary" value="<?php echo $l->invoice_total_nominal_penagihan?>" readonly>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary btn-block">Simpan</button>
                        </form>
                    <?php } ?>

                    <?php if($l->status_penagihan == 1 && $l->tahap_penagihan > 0){ ?>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>No Invoice</td>
                                <td class="text-right edit">
                                    <span> <?php echo "$l->invoice_penagihan"; ?></span>
                                    <input type="text" class="edit--input form-control inputmask hide" data-id="<?php echo $l->id_penagihan ?>" data-jenis="1" value="<?php echo $l->invoice_penagihan ?>" im-insert="true">
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Invoice</td>
                                <td class="text-right edit"><?php echo tgl_indo($l->invoice_tgl_penagihan, 'x', 9); ?></td>
                            </tr>
                            <tr>
                                <td>Jatuh Tempo</td>
                                <td class="text-right edit"><?php echo tgl_indo($l->invoice_tempo_penagihan, 'x', 9); ?></td>
                            </tr>
                            <tr>
                                <td>Pokok Invoice</td>
                                <td class="text-right edit"><?php echo angka_akun($l->invoice_nominal_penagihan); ?></td>
                            </tr>
                            <tr>
                                <td>PPn (10%)</td>
                                <td class="text-right"><?php echo angka_akun($l->invoice_ppn_nominal_penagihan); ?></td>
                            </tr>
                            <tr>
                                <td>Total Invoice</td>
                                <td class="bold text-right"><?php echo angka_akun($l->invoice_total_nominal_penagihan); ?></td>
                            </tr>

                            </tbody>
                        </table>
                    <?php } ?>
                </td>
                <td class="v-align-top ttp">
                    <?php
                    $hide = 'hide';
                    if($l->status_penagihan == 1 && $l->tahap_penagihan == 1){
                        $hide = '';
                    }?>

                    <?php if($l->status_penagihan == 1 && $l->tahap_penagihan >= 1){ ?>
                        <form class="form-ttp <?php echo $hide?>" action="penagihan/save_tanda_terima/<?php echo $data->id_proyek ?>" method="post">
                            <input type="hidden" name="id_penagihan" value="<?php echo $l->id_penagihan ?>">
                            <div class="form-group-default">
                                <label class="control-label">No Tanda Terima</label>
                                <input type="text" value="<?php echo $l->terima_no_penagihan ?>" name="terima_no_penagihan" class="form-control" required>
                            </div>
                            <div class="form-group-default">
                                <label class="control-label">Tanggal Tanda Terima</label>
                                <input type="text" value="<?php echo tgl_indo($l->terima_tgl_penagihan,'angka',9) ?>" name="terima_tgl_penagihan" class="form-control datep" required>
                            </div>
                            <button type="submit" class="btn btn-md btn-primary btn-block">Simpan</button>
                        </form>
                    <?php } ?>

                    <?php if($l->status_penagihan == 1 && $l->tahap_penagihan > 1){ ?>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>No Tanda terima</td>
                                <td class="text-right"><?php echo "$l->terima_no_penagihan"; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Tanda Terima</td>
                                <td class="text-right"><?php echo tgl_indo($l->terima_tgl_penagihan, 'x', 9); ?></td>
                            </tr>
                            </tbody>
                        </table>
                    <?php } ?>
                </td>
                <td class="v-align-top pembayaran-penagihan">
                    <?php
                    $hide = 'hide';
                    if($l->status_penagihan == 1 && $l->tahap_penagihan == 2) {
                        $hide = '';
                    }?>

                    <?php if($l->status_penagihan == 1 && $l->tahap_penagihan >= 2){ ?>
                        <form class="<?php echo $hide ?> form-pembayaran-penagihan" action="penagihan/save_pembayaran/<?php echo $data->id_proyek ?>" method="post">
                            <input type="hidden" name="id_penagihan" value="<?php echo $l->id_penagihan ?>">
                            <?php
                            $value = '';
                            if($l->bayar_no_penagihan){
                                $value = $l->bayar_no_penagihan;
                            }
                            ?>
                            <input type="text" name="bayar_no_penagihan" class="form-control-default" placeholder="No Penerimaan Bank" value="<?php echo $value ?>">

                            <?php
                            $value = '';
                            if($l->bayar_tgl_penagihan){
                                $value = $l->bayar_tgl_penagihan;
                            }
                            ?>
                            <div class="form-group pt-2">
                                <input type="text" name="bayar_tgl_penagihan" class="form-control-default datep" placeholder="Tanggal" value="<?php echo tgl_indo($value) ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="bayar_nominal_penagihan" class="form-control-default inputmask" value="<?php echo angka_akun($l->nominal_penagihan)?>">
                            </div>

                            <?php
                            $value = 0;
                            $tutup = 'hide';
                            $cekbox = '';
                            if($l->ppn_pembayaran_penagihan){
                                $value = $l->ppn_pembayaran_penagihan;
                                $tutup = '';
                                $cekbox = 'checked';
                            }
                            ?>
                            <div class="form-group pt-2">
                                <input type="hidden" name="ppn_penagihan" value="0">
                                <input type="checkbox" value="1" name="ppn_penagihan" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $cekbox ?>><span class="pl-2">PPn</span>
                            </div>
                            <div class="form-group <?php echo $tutup ?>" id="ppn_pembayaran_penagihan">
                                <input type="text" name="ppn_pembayaran_penagihan" class="form-control-default inputmask text-black" value="<?php echo $value ?>" readonly>
                            </div>

                            <?php
                            $value = 0;
                            $tutup = 'hide';
                            $cekbox = '';

                            if($l->pph_pembayaran_penagihan){
                                $value = $l->pph_pembayaran_penagihan;
                                $tutup = '';
                                $cekbox = 'checked';
                            }

                            ?>
                            <div class="form-group pt-2">
                                <input type="hidden" name="pph_penagihan" value="0">
                                <input type="checkbox" value="1" name="pph_penagihan" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $cekbox ?>><span class="pl-2">PPh</span>
                            </div>
                            <div id="pph_pembayaran_penagihan" class="form-group <?php echo $tutup ?> pt-2">
                                <div class="form-group pt-2">
                                    <select name="pph_persen_pembayaran_penagihan" class="form-control-default">
                                        <option value=""></option>
                                        <option value="3" <?php if($l->pph_persen_pembayaran_penagihan == 3)echo 'selected'; ?>>3%</option>
                                        <option value="2" <?php if($l->pph_persen_pembayaran_penagihan == 2)echo 'selected'; ?>>2%</option>
                                    </select>
                                </div>
                                <div class="form-group pt-2">
                                    <input type="text" name="pph_pembayaran_penagihan" class="form-control-default inputmask text-black m-t-5" value="<?php echo $value ?>" readonly>
                                </div>
                            </div>

                            <?php
                            $value = 0;
                            $tutup = 'hide';
                            $cekbox = '';
                            if($l->potongan_bank_pembayaran_penagihan){
                                $value = $l->potongan_bank_pembayaran_penagihan;
                                $tutup = '';
                                $cekbox = 'checked';
                            }
                            ?>
                            <div class="form-group pt-2">
                                <input type="hidden" name="pph_penagihan" value="0">
                                <input type="checkbox" value="1" name="pbank_penagihan" data-init-plugin="switchery" data-size="small" data-color="success" ><span class="pl-2">Potongan Bank</span>
                            </div>
                            <div id="potongan_bank_pembayaran_penagihan" class="form-group <?php echo $tutup ?>">
                                <input type="text" name="potongan_bank_pembayaran_penagihan" class="form-control-default inputmask" value="<?php echo $value ?>" >
                            </div>

                            <?php
                            $value = 0;
                            $tutup = 'hide';
                            $cekbox = '';
                            if($l->potongan_lain_pembayaran_penagihan){
                                $value = $l->potongan_lain_pembayaran_penagihan;
                                $tutup = '';
                                $cekbox = 'checked';
                            }
                            ?>
                            <div class="form-group pt-2">
                                <input type="hidden" name="pph_penagihan" value="0">
                                <input type="checkbox" value="1" name="plain_penagihan" data-init-plugin="switchery" data-size="small" data-color="success" <?php echo $cekbox ?>><span class="pl-2">Potongan Lain</span>
                            </div>
                            <div id="potongan_lain_pembayaran_penagihan" class="form-group <?php echo $tutup ?>">
                                <input type="text" name="potongan_lain_pembayaran_penagihan" class="form-control-default inputmask" value="<?php echo $value ?>">
                            </div>

                            <?php
                            $value = $l->bayar_nominal_penagihan;
                            if($l->nett_pembayaran_penagihan){
                                $value = $l->nett_pembayaran_penagihan;
                            }
                            ?>
                            <label>Nett</label>
                            <div class="form-group">
                                <input type="text" name="nett_pembayaran_penagihan" class="form-control-default inputmask" value="<?php echo $value ?>">
                            </div>
                            <button type="submit" class="btn btn-md btn-primary btn-block">Simpan</button>
<!--                            <button type="button" class="btn btn-md btn-default btn-block m-t-10 but-batal">Batal</button>-->
                        </form>
                    <?php } ?>

                    <?php if($l->status_penagihan == 1 && $l->tahap_penagihan > 2){ ?>
                        <table class="table table-pembayaran">
                            <tbody>
                            <tr>
                                <td class="p-b-0">No Penerimaan Bank</td>
                            </tr>
                            <tr>
                                <td class="p-l-30 p-b-0"><?php echo "$l->bayar_no_penagihan"; ?></td>
                            </tr>
                            <tr>
                                <td class="p-b-0">Tanggal</td>
                            </tr>
                            <tr>
                                <td class="p-l-30 p-b-0"><?php echo tgl_indo($l->bayar_tgl_penagihan, 'x', 9) ?></td>
                            </tr>
                            <tr>
                                <td class="p-b-0">Nominal (Gross)</td>
                            </tr>
                            <tr>
                                <td class="p-l-30 p-b-0"><?php echo angka_akun($l->bayar_nominal_penagihan); ?></td>
                            </tr>
                            <tr>
                                <td class="p-b-0">Potongan PPN</td>
                            </tr>
                            <tr>
                                <td class="p-l-30 p-b-0"><?php echo angka_akun($l->ppn_pembayaran_penagihan) ?></td>
                            </tr>
                            <tr>
                                <td class="p-b-0">Potongan PPH</td>
                            </tr>
                            <tr>
                                <td class="p-l-30 p-b-0"><?php echo angka_akun($l->pph_pembayaran_penagihan) ?></td>
                            </tr>
                            <tr>
                                <td class="p-b-0">Potongan Bank</td>
                            </tr>
                            <tr>
                                <td class="p-l-30 p-b-0"><?php echo angka_akun($l->potongan_bank_pembayaran_penagihan) ?></td>
                            </tr>
                            <tr>
                                <td class="p-b-0">Potongan Lain</td>
                            </tr>
                            <tr>
                                <td class="p-l-30 p-b-0"><?php echo angka_akun($l->potongan_lain_pembayaran_penagihan) ?></td>
                            </tr>
                            <tr>
                                <td class="p-b-0">Nett</td>
                            </tr>
                            <tr>
                                <td class="p-l-30 p-b-0"><?php echo angka_akun($l->nett_pembayaran_penagihan) ?></td>
                            </tr>
                            <tr style="display: none;" class="hapus-pembayaran">
                                <td class="text-center">
                                    <a href="" rel="tooltip" class="btn btn-xs btn-danger but-del" data-id="<?php echo $l->id_penagihan ?>" data-original-title="Hapus"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                            </tbody>

                        </table>

                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

