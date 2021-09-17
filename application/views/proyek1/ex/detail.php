<div class="col">
    <h1 class="m-0 text-center bold">STLP</h1>
    <p class="text-center">Status & Time Line Project</p>

    <div class="table-responsive">
        <table class="table table-condensed">
            <?php if (isset($data)) {
                if ($data->tahap_proyek > 0) { ?>
                    <tr>
                        <td width="30%">No Dokumen</td>
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
                        <td>NO SPK</td>
                        <td><?php echo $data->no_spk_proyek ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal SPK</td>
                        <td><?php echo tgl_indo($data->tgl_proyek, 'x', 9) ?></td>
                    </tr>
                    <tr>
                        <td>Tgl Penyelesaian</td>
                        <td><?php echo tgl_indo($data->selesai_proyek, 'x', 9) ?></td>
                    </tr>
                    <tr>
                        <td>PIC Proyek</td>
                        <td><?php echo $data->pic_proyek ?></td>
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
                    <?php if ($data->bq_proyek != 0) { ?>
                        <tr>
                            <td>Perkiraan Biaya Proyek (BQ)</td>
                            <td>Rp. <?php echo number_format($data->bq_proyek, '2', '.', '.') ?></td>
                        </tr>
                        <tr>
                            <td>Perkiraan Keuntungan</td>
                            <td>
                                Rp. <?php echo number_format(($data->nilai_proyek - $data->bq_proyek), '2', '.', '.') ?></td>
                        </tr>
                        <tr>
                            <td>Persentase Perkiraan Keuntungan</td>
                            <?php $per = round((($data->nilai_proyek - $data->bq_proyek) / $data->nilai_proyek) * 100, 2) ?>
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
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nominal</th>
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
                                                    Rp <?php echo number_format($u->nominal_uang_muka, 2, ',', '.') ?></td>
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
                            <td></td>
                        </tr>
                        <tr>
                        <td colspan="2">
                        <div class="table-responsive">
                        <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Persen</th>
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
                                <td>Rp <?php echo number_format($u->nominal_penagihan, 2, ',', '.') ?></td>
                                <td><?php echo tgl_indo($u->tgl_penagihan, 'x', 9) ?></td>
                            </tr>
                        <?php }
                    } ?>
                    </tbody>
                    </table>
                    </div>
                    </td>
                    </tr>
                <?php }
            } ?>
        </table>
    </div>
</div>
