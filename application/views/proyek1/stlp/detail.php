<div class="col">
    <h1 class="m-0 text-center bold">STLP</h1>
    <p class="text-center">Status & Time Line Project</p>
    <p class="text-center mb-5">( <?php if($data->st_selesai_proyek == 1) echo " Dalam Pengerjaan "; else echo "Sudah Selesai";?> )</p>

    <?php if (cek_status_approval_proyek($data->id_proyek)) { ?>
        <?php if (has_permission('Proyek1', 'del')) { ?>
            <a href="proyek/delete" class="btn btn-danger but-del" data-id="<?php echo $data->id_proyek ?>"><i class="fa fa-times"></i> Hapus Proyek</a>
        <?php } ?>
    <?php } ?>
    <div class="table-responsive">
        <table class="table table-condensed">
            <?php if (isset($data)) {
                if ($data->tahap_proyek > 0) { ?>
                    <tr>
                        <td width="30%">No STLP</td>
                        <td><?php echo $data->no_dokumen_proyek ?></td>
                    </tr>
                    <tr>
                        <td>No Proyek</td>
                        <td><?php echo $data->no_proyek ?></td>
                    </tr>
                <?php }
            } ?>
            <tr>
                <td>Nama Pekerjaan</td>
                <td><?php echo $data->nama_proyek ?></td>
            </tr>
            <tr>
                <td>Pemberi Kerja</td>
                <td><?php echo $data->nama_klien ?></td>
            </tr>
            <?php if (isset($data)) {
                if ($data->tahap_proyek > 0) { ?>
                    <tr>
                        <td>No SPK</td>
                        <td><?php echo $data->no_spk_proyek ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal SPK</td>
                        <td><?php echo tgl_indo($data->tgl_proyek, 'x', 9) ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Rencana Penyelesaian</td>
                        <td><?php echo tgl_indo($data->selesai_proyek, 'x', 9) ?></td>
                    </tr>
                    <tr>
                        <td>PIC Proyek</td>
                        <td><?php echo $data->pic_proyek ?></td>
                    </tr>
                    <tr>
                        <td>Group Bisnis</td>
                        <td><?php echo $data->nama_group_bisnis . " / " . $data->nama_lokasi ?></td>
                    </tr>
                    <tr>
                        <td>Masa Retensi</td>
                        <td><?php echo $data->retensi_proyek ?>
                            ( <?php echo tgl_indo(tgl_tambah($data->selesai_proyek, $data->retensi_proyek), 'x', 9) ?> )
                        </td>
                    </tr>
                    <tr>
                        <td>Nilai Proyek</td>
                        <td>Rp. <?php echo number_format($data->nilai_proyek, '0', '.', '.') ?></td>
                    </tr>
                    <tr>
                        <td>PPn (10%)</td>
                        <td>Rp. <?php echo number_format($data->ppn_proyek, '0', '.', '.') ?></td>
                    </tr>
                    <tr>
                        <td>Nilai Proyek Sebelum PPn</td>
                        <td>Rp. <?php echo number_format($data->in_ppn_proyek, '0', '.', '.') ?></td>
                    </tr>
                    <tr>
                        <td>PPh psl 4(2) (3% dari Nilai Proyek setelah PPn)</td>
                        <td>Rp. <?php echo number_format($data->pph_proyek, '0', '.', '.') ?></td>
                    </tr>
                    <tr>
                        <td>Nilai Proyek (NET)</td>
                        <td>Rp. <?php echo number_format($data->net_proyek, '0', '.', '.') ?></td>
                    </tr>
                    <?php if ($data->bq_proyek != 0) { ?>
                        <tr>
                            <td>Perkiraan Biaya Proyek</td>
                            <td>Rp. <?php echo number_format($data->bq_proyek, '0', '.', '.') ?> <a href="" class="but-bq btn btn-xs btn-primary ml-5" data-id="<?php echo $data->id_proyek ?>">Detail</a></td>
                        </tr>
                        <tr>
                            <td>Perkiraan Keuntungan</td>
                            <td>
                                Rp. <?php echo number_format(($data->net_proyek - $data->bq_proyek), '0', '.', '.') ?></td>
                        </tr>
                        <tr>
                            <td>Persentase Perkiraan Keuntungan</td>
                            <?php $per = round((($data->net_proyek - $data->bq_proyek) / $data->net_proyek) * 100, 2) ?>
                            <td><?php echo $per ?> %</td>
                        </tr>
                    <?php } ?>
                    <?php
                    $this->db->where('proyek_id_uang_muka', $data->id_proyek);
                    $this->db->order_by('tgl_uang_muka', 'asc');
                    $uang = $this->db->get('uang_muka')->result();

                    if ($uang) {
                        ?>
                        <tr>
                            <td>Uang Muka</td>
                            <td>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                        <tr>
                                            <th>Nominal</th>
                                            <th>Tanggal</th>
                                            <th>Rencana Pertanggung Jawaban</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($uang as $u) {
                                            ?>
                                            <tr>
                                                <td>Uang Muka <?php echo $no; ?> </br>
                                                    Rp <?php echo number_format($u->nominal_uang_muka, 0, ',', '.') ?></td>
                                                <td><?php echo tgl_indo($u->tgl_uang_muka, 'x', 9) ?></td>
                                                <td><?php echo tgl_indo($u->jawab_uang_muka, 'x', 9) ?></td>
                                            </tr>
                                            <?php $no++;
                                        } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>

                    <?php } ?>
                    <?php
                    $this->db->where('proyek_id_penagihan', $data->id_proyek);
                    $this->db->order_by('tipe_penagihan', 'asc');
                    $this->db->order_by('tgl_penagihan', 'asc');
                    $tagih = $this->db->get('penagihan')->result();
                    if ($tagih) {
                        ?>
                        <tr>
                            <td>Penagihan</td>
                            <td>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Progres (%)</th>
                                            <th>Nominal</th>
                                            <th>Tanggal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($tagih as $u) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php
                                                    if ($u->tipe_penagihan == 1) {
                                                        echo "Penagihan DP";
                                                    } elseif ($u->tipe_penagihan == 2) {
                                                        echo "Penagihan Prestasi $no";
                                                        $no++;
                                                    } elseif ($u->tipe_penagihan == 3) {
                                                        echo "Penagihan Final";
                                                    } else {
                                                        echo "Penagihan Retensi";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php if ($u->tipe_penagihan != 1) echo "$u->persen_penagihan %"; ?></td>
                                                <td>
                                                    Rp <?php echo number_format($u->nominal_penagihan, 0, ',', '.') ?></td>
                                                <td><?php echo tgl_indo($u->tgl_penagihan, 'x', 9) ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </table>
    </div>
</div>


<div style="overflow-y: auto; " class="modal fade slide-up disable-scroll" id="modal-bq" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content-wrapper">

            <div class="modal-content">
                <div class="p-1">
                    <h5>Detail Perkiraan Biaya Proyek</h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Uraian</th>
                                <th>Nominal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!$bq_list) { ?>
                                <tr>
                                    <td colspan="2"> Belum ada data</td>
                                </tr>
                                <?php
                            } else {
                                foreach ($bq_list as $bl) {
                                    ?>
                                    <tr>
                                        <td class="<?php if ($bl->tipe_bq != 2) echo " bold text-uppercase " ?>">
                                            <span><?php echo $bl->nama_bq_list ?></span>
                                        </td>
                                        <td class="text-right edit">
                                            <?php if ($bl->tipe_bq != 1) { ?>
                                                <span>Rp <?php echo number_format($bl->nominal_bq, 0, ',', '.') ?></span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php if ($bl->tipe_bq == 1) { ?>
                                        <?php
                                        $this->db->where('proyek_id_bq', $bl->proyek_id_bq);
                                        $this->db->where('head_bq', $bl->id_bq);
                                        $this->db->join('bq_list', 'bq.bq_list_id = bq_list.id_bq_list', 'left');
                                        $sub = $this->db->get('bq')->result();

                                        if ($sub) {
                                            foreach ($sub as $s) {
                                                ?>
                                                <tr>
                                                    <td class="pl-4">
                                                        <a href="proyek/hapus_bq/<?php echo $data->id_proyek ?>/<?php echo $s->id_bq ?>/<?php echo $s->tipe_bq ?>"
                                                           class="text-danger mr-1"><i class="fa fa-times"></i> </a>
                                                        <?php echo $s->nama_bq_list ?>
                                                    </td>
                                                    <td class="text-right">
                                                        Rp <?php echo number_format($s->nominal_bq, 0, ',', '.') ?>
                                                    </td>
                                                </tr>
                                            <?php }
                                        } ?>
                                    <?php } ?>
                                <?php }
                            } ?>
                            <tr>
                                <td class="text-right bold bg-yellow">
                                    Total
                                </td>
                                <td class="text-right bold bg-yellow p-0 pr-2">
                                    <h5>Rp <?php echo number_format($data->bq_proyek, 0, '.', '.') ?></h5>
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
