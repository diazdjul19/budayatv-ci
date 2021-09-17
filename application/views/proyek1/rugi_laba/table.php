
<table class="table mb-5">
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
        <td>Rp <?php echo number_format($data->nilai_proyek, 2, ',', '.') ?></td>
    </tr>
    <tr>
        <td>No SPK</td>
        <td><?php echo $data->no_spk_proyek; ?></td>
        <td>Tanggal SPK</td>
        <td><?php echo tgl_indo($data->mulai_proyek, 'x', 9)?></td>
    </tr>
</table>


<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Uraian</th>
            <th width="20%">Rencana</th>
            <th width="20%">Realisasi</th>
            <th width="15%">Selisih</th>
            <th width="15%">(%) Persentase</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>Pendapatan Proyek</td>
                <td class="text-right">Rp <?php echo number_format($data->net_proyek, 0, '.', '.')?></td>
                <td class="text-right">Rp <?php echo number_format($pendapatan_proyek, 0, '.', '.')?></td>
<!--                jika realisasi < rencana, maka di dalam kurung-->

<!--                <td class="text-right">Rp --><?php //echo $kurung_kiri. number_format($data->net_proyek - $pendapatan_proyek,0,'.','.'). $kurung_kanan ?><!--</td>-->
                <td class="text-right">Rp <?php echo angka_akun_banding(abs($data->net_proyek - $pendapatan_proyek), 0, $data->net_proyek, $pendapatan_proyek) ?></td>
                <td class="text-right">
                    <?php echo angka_akun(((($pendapatan_proyek - $data->net_proyek)/ $data->net_proyek)* 100), 2)?> %
                </td>
            </tr>
            <tr>
                <td>Biaya Proyek</td>
                <td class="text-right">Rp <?php echo number_format($data->bq_proyek - $ppn_bq, 0, '.', '.')?></td>
                <td class="text-right">Rp <?php echo number_format($data->bq_real_proyek, 0, '.', '.')?></td>
                
                <?php
                $selisih_biaya_proyek = (($data->bq_proyek - $ppn_bq) - $data->bq_real_proyek);
                if($selisih_biaya_proyek < 0){
                    $selisih_biaya_proyek = substr($selisih_biaya_proyek, 1);
                }

                ?>
                <td class="text-right">Rp <?php echo angka_akun_banding($selisih_biaya_proyek, 0, $data->bq_real_proyek, $data->bq_proyek - $ppn_bq) ?></td>

                <?php
                $persen_biaya_proyek = 0;
                $bq_proyek = 0;
                if($data->bq_proyek){
                    $bq_proyek = $data->bq_proyek - $ppn_bq;
                    $persen_biaya_proyek = abs((($data->bq_real_proyek - $bq_proyek)/ $bq_proyek)* 100);
                }?>
                <td class="text-right">
<!--                    --><?php //echo angka_akun($persen_biaya_proyek, 2)?><!-- %-->
                    <?php echo angka_akun_banding($persen_biaya_proyek, 2, $data->bq_real_proyek, $data->bq_proyek - $ppn_bq)?> %
                </td>
            </tr>
            <tr>
                <td class="bg-yellow">
                    <h5>Keuntungan</h5>
                </td>
                <td class="bg-yellow text-right">
                    <h5 class="m-0">Rp <?php echo angka_akun($data->net_proyek - $bq_proyek)?></h5>
                </td>
                <td class="bg-yellow text-right">
                    <h5 class="m-0">Rp <?php echo angka_akun($pendapatan_proyek - $data->bq_real_proyek)?></h5>
                </td>
                <td class="text-right bg-yellow">Rp
                    <?php
//                        if($selisih_biaya_proyek > 0){
                        if(($data->net_proyek - $bq_proyek) - ($pendapatan_proyek - $data->bq_real_proyek) > 0){
                            echo angka_akun_banding(($data->net_proyek - $pendapatan_proyek) - (($data->bq_proyek - $ppn_bq) - $data->bq_real_proyek),0, $data->net_proyek - ($data->bq_proyek - $ppn_bq), $pendapatan_proyek - $data->bq_real_proyek);
                        }else{
                            echo angka_akun_banding(($data->net_proyek - $pendapatan_proyek) + (($data->bq_proyek - $ppn_bq) - $data->bq_real_proyek), 0, $data->net_proyek - ($data->bq_proyek - $ppn_bq), $pendapatan_proyek - $data->bq_real_proyek);
                        }
                    ?>
                </td>
                <td class="text-right bg-yellow">
                    <h5>
                        <?php
                            if( ((($pendapatan_proyek - $data->net_proyek)/ $data->net_proyek)* 100) == 0 && ($data->bq_proyek - $ppn_bq) == 0){
                                echo 0;
                            }elseif(((($pendapatan_proyek - $data->net_proyek)/ $data->net_proyek)* 100) > 0 && $data->bq_proyek - $ppn_bq > $data->bq_real_proyek ){
                                echo angka_akun( ((($pendapatan_proyek - $data->net_proyek)/ $data->net_proyek)* 100) -  ((($data->bq_real_proyek - ($data->bq_proyek - $ppn_bq))/ ($data->bq_proyek - $ppn_bq))* 100),2);
                            }else{
//                                echo ((($data->bq_real_proyek - ($data->bq_proyek - $ppn_bq))/ ($data->bq_proyek - $ppn_bq))* 100);
                                echo angka_akun( ((($pendapatan_proyek - $data->net_proyek)/ $data->net_proyek)* 100) +  (((($data->bq_proyek - $ppn_bq) - $data->bq_real_proyek)/ ($data->bq_proyek - $ppn_bq))* 100),2);
                            }

//                            if($pendapatan_proyek - $data->net_proyek < 0 && ($data->bq_real_proyek - ($data->bq_proyek - $ppn_bq)) > 0 || $pendapatan_proyek - $data->net_proyek > 0 && ($data->bq_real_proyek - ($data->bq_proyek - $ppn_bq)) > 0){
//                                echo angka_akun( ((($pendapatan_proyek - $data->net_proyek)/ $data->net_proyek)* 100) -  ((($data->bq_real_proyek - ($data->bq_proyek - $ppn_bq))/ ($data->bq_proyek - $ppn_bq))* 100),2)."xxxx";
//                            }else{
//                                echo angka_akun( ((($pendapatan_proyek - $data->net_proyek)/ $data->net_proyek)* 100) +  ((($data->bq_real_proyek - ($data->bq_proyek - $ppn_bq))/ ($data->bq_proyek - $ppn_bq))* 100),2);
//                            }

//                            elseif ($data->bq_proyek){
//                                echo angka_akun( ((($pendapatan_proyek - $data->net_proyek)/ $data->net_proyek)* 100) +  ((($data->bq_real_proyek - ($data->bq_proyek - $ppn_bq))/ ($data->bq_proyek - $ppn_bq))* 100),2);
//                            }else{
//                                echo 0;
//                            }
                        ?> %
                    </h5>
                </td>
            </tr>
        </tbody>
    </table>

    <?php if($data->st_selesai_proyek == 1){ ?>
    <a href="proyek/selesai/<?php echo $data->id_proyek ?>" class="btn btn-danger mt-5">Proyek Selesai</a>
    <?php } else{ ?>
        <a href="proyek/belum_selesai/<?php echo $data->id_proyek ?>" class="btn btn-primary mt-5">Proyek Belum Selesai</a>
    <?php } ?>
</div>