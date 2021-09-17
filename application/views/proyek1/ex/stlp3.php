<div class="col">
    <div class="card card-primary">
        <div class="bg-primary-lighter">
            <h1 class="m-0 text-center bold">STLP</h1>
            <p class="text-center">Status & Time Line Project</p>
        </div>
        <p class="bg-primary-darker text-white"><i class="fa fa-caret-right ml-5 mr-2"></i> Uang Muka</p>

        <div class="card-block">
            <div class="row mb-2">
                <div class="col-7">
                    <h4 class="m-0">Rencana Pengambilan Uang Muka</h4>
                </div>
                <div class="col">
                    <a href="proyek/stlp4/<?php echo $data->id_proyek ?>" class="btn btn-success pull-right"> Penagihan <i class="fa fa-chevron-right ml-2"></i></a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th colspan="2">Nominal</th>
                        <th width="30%">Tanggal</th>
                        <th width="30%">Rencana Pertanggung Jawaban</th>
                    </tr>
                    </thead>
                    <tbody>
                    <form method="post" action="" role="form" class="myform mt-2" autocomplete="off" novalidate>
                        <tr>
                            <td colspan="2" class="bg-master-light">
                                <input type="text" name="nominal_uang_muka" class="form-control inputmask">
                            </td>
                            <td class="bg-master-light">
                                <input type="text" name="tgl_uang_muka" class="form-control datep">
                            </td>
                            <td class="bg-master-light">
                                <input type="text" name="jawab_uang_muka" class="form-control datep">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="bg-master-light"></td>
                            <td class="bg-master-light">
                                <button class="btn btn-primary btn-block btn-xs" type="submit"><i class="fa fa-check mr-2"></i> Tambah</button>
                            </td>
                        </tr>
                    </form>
                    <?php if(!$um_list){?>
                        <tr>
                            <td colspan="4"> Belum ada data</td>
                        </tr>
                        <?php
                    }else{
                        $no = 1;
                        foreach($um_list as $bl){
                            ?>
                            <tr>
                                <td>
                                    <a href="proyek/stlp3_hapus/<?php echo $data->id_proyek ?>/<?php echo $bl->id_uang_muka ?>" class="text-danger mr-1"><i class="fa fa-times"></i> </a>
                                    Uang Muka <?php echo $no; ?>
                                </td>
                                <td class="edit">
                                    <span>Rp <?php echo number_format($bl->nominal_uang_muka, 2, ',', '.') ?></span>
                                    <input type="text" class="edit--input form-control inputmask hide" data-id="<?php echo $bl->id_uang_muka ?>" data-jenis="1" value="<?php echo number_format($bl->nominal_uang_muka, 2, ',', '.') ?>">
                                </td>
                                <td class="edit">
                                    <span><?php echo tgl_indo($bl->tgl_uang_muka, 'x', 9) ?></span>
                                    <input type="text" class="edit--date form-control hide" data-id="<?php echo $bl->id_uang_muka ?>" data-jenis="2" value="<?php echo tgl_indo($bl->tgl_uang_muka, 'angka', 0) ?>">
                                </td>
                                <td class="edit">
                                    <span><?php echo tgl_indo($bl->jawab_uang_muka, 'x', 9) ?></span>
                                    <input type="text" class="edit--date form-control hide" data-id="<?php echo $bl->id_uang_muka ?>" data-jenis="3" value="<?php echo tgl_indo($bl->jawab_uang_muka, 'angka', 9) ?>">
                                </td>
                            </tr>
                        <?php $no++; }} ?>
                    </tbody>
                </table>
            </div>






        </div>
    </div>
</div>
