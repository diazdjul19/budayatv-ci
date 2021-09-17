<div class="col">
    <div class="card card-primary">
        <div class="bg-primary-lighter">
            <h1 class="m-0 text-center bold">STLP</h1>
            <p class="text-center">Status & Time Line Project</p>
        </div>
        <p class="bg-primary-darker text-white"><i class="fa fa-caret-right ml-5 mr-2"></i> Penagihan</p>

        <div class="card-block">
            <div class="row mb-2">
                <div class="col-7">
                    <h4 class="m-0">Jadwal Penagihan</h4>
                </div>
                <div class="col">
                    <a href="proyek/detail/<?php echo $data->id_proyek ?>" class="btn btn-primary pull-right"> STLP Detail <i class="fa fa-chevron-right ml-2"></i></a>
                    <br>
                    <?php if($data->approval_proyek == 0){?>
                    <a href="proyek/set_menunggu_konfirmasi/<?php echo $data->id_proyek ?>" class="btn btn-success pull-right mt-2"> Selesai & Menggunggu Konfirmasi <i class="fa fa-chevron-right ml-2"></i></a>
                    <?php }elseif($data->approval_proyek == 2){?>
                        <a href="proyek/set_menunggu_konfirmasi_revisi/<?php echo $data->id_proyek ?>" class="btn btn-success pull-right mt-2">Konfirmasi Revisi<i class="fa fa-chevron-right ml-2"></i></a>
                    <?php } ?>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-sm">
                    <tbody>
                    <?php
                    $this->db->where('proyek_id_penagihan', $data->id_proyek);
                    $this->db->where('tipe_penagihan', 1);
                    $dt1 = $this->db->get('penagihan')->row();

                    if(!$dt1){
                    ?>
                    <form method="post" action="" role="form" class="myform mt-2" autocomplete="off" novalidate>
                        <input type="hidden" name="tipe_penagihan" value="1">
                        <tr>
                            <td colspan="3">Penagihan DP</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="text" placeholder="Nominal" name="nominal_penagihan" class="form-control inputmask">
                            </td>
                            <td>
                                <input type="text" placeholder="Tanggal" name="tgl_penagihan" class="form-control datep">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td>
                                <button class="btn btn-primary btn-block btn-xs" type="submit"><i class="fa fa-check mr-2"></i> Tambah</button>
                            </td>
                        </tr>
                    </form>
                    <?php }else{ ?>
                        <tr>
                            <td colspan="3" class="bold">
                                <a href="proyek/stlp4_hapus/<?php echo $data->id_proyek ?>/<?php echo $dt1->id_penagihan ?>" class="text-danger mr-1"><i class="fa fa-times"></i> </a>
                                Penagihan DP
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="edit">
                                <span>Rp <?php echo number_format($dt1->nominal_penagihan, 2, ',', '.') ?></span>
                                <input type="text" class="edit--input form-control inputmask hide" data-id="<?php echo $dt1->id_penagihan ?>" data-jenis="2" value="<?php echo $dt1->nominal_penagihan ?>">
                            </td>
                            <td class="edit">
                                <span><?php echo tgl_indo($dt1->tgl_penagihan, 'x', 9) ?></span>
                                <input type="text" class="edit--date form-control hide" data-id="<?php echo $dt1->id_penagihan ?>" data-jenis="3" value="<?php echo tgl_indo($dt1->tgl_penagihan, 'angka', 9) ?>">
                            </td>
                        </tr>
                    <?php }  ?>
                    <form method="post" action="" role="form" class="myform mt-2" autocomplete="off" novalidate>
                        <input type="hidden" name="tipe_penagihan" value="2">

                        <tr>
                            <td colspan="3">Penagihan Prestasi</td>
                        </tr>
                        <tr>
                            <td width="20%">
                                <input type="text" placeholder="Persentase" name="persen_penagihan" class="form-control inputmask">
                            </td>
                            <td>
                                <input type="text" placeholder="Nominal" name="nominal_penagihan" class="form-control inputmask">
                            </td>
                            <td>
                                <input type="text" placeholder="Tanggal" name="tgl_penagihan" class="form-control datep">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td>
                                <button class="btn btn-primary btn-block btn-xs" type="submit"><i class="fa fa-check mr-2"></i> Tambah</button>
                            </td>
                        </tr>
                    </form>
                    <?php
                        $this->db->where('proyek_id_penagihan', $data->id_proyek);
                        $this->db->where('tipe_penagihan', 2);
                        $this->db->order_by('tgl_penagihan', 'asc');
                        $dt2 = $this->db->get('penagihan')->result();

                        $no = 1;
                        foreach($dt2 as $d){
                        ?>
                        <tr>
                            <td colspan="3" class="bold edit-td">
                                <a href="proyek/stlp4_hapus/<?php echo $data->id_proyek ?>/<?php echo $d->id_penagihan ?>" class="text-danger mr-1"><i class="fa fa-times"></i> </a>
                                Penagihan Prestasi <?php echo $no; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="edit">
                                <span><?php echo $d->persen_penagihan ?>%</span>
                                <input type="text" class="edit--input form-control inputmask hide" data-id="<?php echo $d->id_penagihan ?>" data-jenis="1" value="<?php echo $d->persen_penagihan ?>">
                            </td>
                            <td class="edit">
                                <span>Rp <?php echo number_format($d->nominal_penagihan, 2, ',', '.') ?></span>
                                <input type="text" class="edit--input form-control inputmask hide" data-id="<?php echo $d->id_penagihan ?>" data-jenis="2" value="<?php echo $d->nominal_penagihan ?>">
                            </td>
                            <td class="edit">
                                <span><?php echo tgl_indo($d->tgl_penagihan, 'x', 9) ?></span>
                                <input type="text" class="edit--date form-control hide" data-id="<?php echo $d->id_penagihan ?>" data-jenis="3" value="<?php echo tgl_indo($d->tgl_penagihan, 'angka', 9) ?>">
                            </td>
                        </tr>
                    <?php $no++; }  ?>
                    <?php
                    $this->db->where('proyek_id_penagihan', $data->id_proyek);
                    $this->db->where('tipe_penagihan', 3);
                    $dt3 = $this->db->get('penagihan')->row();

                    if(!$dt3){
                    ?>
                    <form method="post" action="" role="form" class="myform mt-2" autocomplete="off" novalidate>
                        <input type="hidden" name="tipe_penagihan" value="3">

                        <tr>
                            <td colspan="3">Penagihan Final</td>
                        </tr>
                        <tr>
                            <td width="20%">
                                <input type="text" placeholder="Persentase" name="persen_penagihan" class="form-control inputmask">
                            </td>
                            <td>
                                <input type="text" placeholder="Nominal" name="nominal_penagihan" class="form-control inputmask">
                            </td>
                            <td>
                                <input type="text" placeholder="Tanggal" name="tgl_penagihan" class="form-control datep">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td>
                                <button class="btn btn-primary btn-block btn-xs" type="submit"><i class="fa fa-check mr-2"></i> Tambah</button>
                            </td>
                        </tr>
                    </form>
                    <?php }else{ ?>
                        <tr>
                            <td colspan="3" class="bold">
                                <a href="proyek/stlp4_hapus/<?php echo $data->id_proyek ?>/<?php echo $dt3->id_penagihan ?>" class="text-danger mr-1"><i class="fa fa-times"></i> </a>
                                Penagihan Final
                            </td>
                        </tr>
                        <tr>
                            <td class="edit">
                                <span><?php echo $dt3->persen_penagihan ?>%</span>
                                <input type="text" class="edit--input form-control inputmask hide" data-id="<?php echo $dt3->id_penagihan ?>" data-jenis="1" value="<?php echo $dt3->persen_penagihan ?>">
                            </td>
                            <td class="edit">
                                <span>Rp <?php echo number_format($dt3->nominal_penagihan, 2, ',', '.') ?></span>
                                <input type="text" class="edit--input form-control inputmask hide" data-id="<?php echo $dt3->id_penagihan ?>" data-jenis="2" value="<?php echo $dt3->nominal_penagihan ?>">
                            </td>
                            <td class="edit">
                                <span><?php echo tgl_indo($dt3->tgl_penagihan, 'x', 9) ?></span>
                                <input type="text" class="edit--date form-control hide" data-id="<?php echo $dt3->id_penagihan ?>" data-jenis="3" value="<?php echo tgl_indo($dt3->tgl_penagihan, 'angka', 9) ?>">
                            </td>
                        </tr>
                    <?php }  ?>
                    <?php
                    $this->db->where('proyek_id_penagihan', $data->id_proyek);
                    $this->db->where('tipe_penagihan', 4);
                    $dt4 = $this->db->get('penagihan')->row();

                    if(!$dt4){
                    ?>
                    <form method="post" action="" role="form" class="myform mt-2" autocomplete="off" novalidate>
                        <input type="hidden" name="tipe_penagihan" value="4">

                        <tr>
                            <td colspan="3">Penagihan Retensi</td>
                        </tr>
                        <tr>
                            <td width="20%">
                                <input type="text" placeholder="Persentase" name="persen_penagihan" class="form-control inputmask">
                            </td>
                            <td>
                                <input type="text" placeholder="Nominal" name="nominal_penagihan" class="form-control inputmask">
                            </td>
                            <td>
                                <input type="text" placeholder="Tanggal" name="tgl_penagihan" class="form-control datep">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td>
                                <button class="btn btn-primary btn-block btn-xs" type="submit"><i class="fa fa-check mr-2"></i> Tambah</button>
                            </td>
                        </tr>
                    </form>
                    <?php }else{ ?>
                        <tr>
                            <td colspan="3" class="bold">
                                <a href="proyek/stlp4_hapus/<?php echo $data->id_proyek ?>/<?php echo $dt4->id_penagihan ?>" class="text-danger mr-1"><i class="fa fa-times"></i> </a>
                                Penagihan Retensi
                            </td>
                        </tr>
                        <tr>
                            <td class="edit">
                                <span><?php echo $dt4->persen_penagihan ?>%</span>
                                <input type="text" class="edit--input form-control inputmask hide" data-id="<?php echo $dt4->id_penagihan ?>" data-jenis="1" value="<?php echo $dt4->persen_penagihan ?>">
                            </td>
                            <td class="edit">
                                <span>Rp <?php echo number_format($dt4->nominal_penagihan, 2, ',', '.') ?></span>
                                <input type="text" class="edit--input form-control inputmask hide" data-id="<?php echo $dt4->id_penagihan ?>" data-jenis="2" value="<?php echo $dt4->nominal_penagihan ?>">
                            </td>
                            <td class="edit">
                                <span><?php echo tgl_indo($dt4->tgl_penagihan, 'x', 9) ?></span>
                                <input type="text" class="edit--date form-control hide" data-id="<?php echo $dt4->id_penagihan ?>" data-jenis="3" value="<?php echo tgl_indo($dt4->tgl_penagihan, 'x', 9) ?>">
                            </td>
                        </tr>
                    <?php }  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
