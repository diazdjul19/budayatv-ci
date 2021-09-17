<div class="col">
    <div class="card card-primary">
        <div class="bg-primary-lighter">
            <h1 class="m-0 text-center bold">STLP</h1>
            <p class="text-center">Status & Time Line Project</p>
        </div>
        <p class="bg-primary-darker text-white"><i class="fa fa-caret-right ml-5 mr-2"></i> BQ</p>

        <div class="card-block">
            <div class="row mb-2">
                <div class="col-7">
                    <h4 class="m-0">Perkiraan Biaya Proyek (BQ)</h4>
                </div>
                <div class="col">
                    <a href="proyek/stlp3/<?php echo $data->id_proyek ?>" class="btn btn-success pull-right"> Uang Muka <i class="fa fa-chevron-right ml-2"></i></a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th width="65%">Uraian</th>
                        <th width="35%">Harga</th>
                    </tr>
                    </thead>
                    <tbody>
                    <form method="post" action="" role="form" class="myform mt-2" autocomplete="off" novalidate>

                    <tr>
                        <td class="bg-master-light">
                            <input type="text" name="nama" class="form-control">
                        </td>
                        <td class="bg-master-light">
                            <input type="text" name="harga" class="form-control inputmask">
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-master-light"></td>
                        <td class="bg-master-light">
                            <button class="btn btn-primary btn-block btn-xs" type="submit"><i class="fa fa-check mr-2"></i> Tambah</button>
                        </td>
                    </tr>
                    </form>
                    <?php if(!$bq_list){?>
                    <tr>
                        <td colspan="2"> Belum ada data</td>
                    </tr>
                    <?php
                    }else{
                        foreach($bq_list as $bl){
                        ?>
                        <tr>
                            <td class="<?php if($bl->tipe_bq != 2) echo " bold text-uppercase " ?>">
                                <a href="proyek/hapus_bq/<?php echo $data->id_proyek ?>/<?php echo $bl->id_bq ?>/<?php echo $bl->tipe_bq ?>" class="text-danger mr-1"><i class="fa fa-times"></i> </a>
                                <span><?php echo $bl->nama_bq_list ?></span>
                            </td>
                            <td class="text-right edit">
                                <?php if($bl->tipe_bq != 1){ ?>
                                <span>Rp <?php echo number_format($bl->nominal_bq, 2, ',', '.') ?></span>
                                <input type="text" class="edit--input form-control inputmask hide" data-id="<?php echo $bl->id_bq ?>" data-jenis="2" value="<?php echo $bl->nominal_bq ?>">
                                <?php } ?>
                            </td>
                        </tr>
                            <?php if($bl->tipe_bq == 1){ ?>
                                <form method="post" action="" role="form" class="myform mt-2" autocomplete="off" novalidate>
                                <input type="hidden" name="head" value="<?php echo $bl->id_bq ?>">
                                <tr>
                                    <td class="bg-master-lightest">
                                        <input type="text" name="nama" class="form-control">
                                    </td>
                                    <td class="bg-master-lightest">
                                        <input type="text" name="harga" class="form-control inputmask">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bg-master-lightest"></td>
                                    <td class="bg-master-lightest">
                                        <button class="btn btn-primary btn-block btn-xs" type="submit"><i class="fa fa-check mr-2"></i> Tambah</button>
                                    </td>
                                </tr>
                                </form>
                                <?php
                                $this->db->where('proyek_id_bq', $bl->proyek_id_bq);
                                $this->db->where('head_bq', $bl->id_bq);
                                $this->db->join('bq_list', 'bq.bq_list_id = bq_list.id_bq_list', 'left');
                                $sub = $this->db->get('bq')->result();

                                if($sub){
                                    foreach ($sub as $s){
                                ?>
                                        <tr>
                                            <td class="pl-4">
                                                <a href="proyek/hapus_bq/<?php echo $data->id_proyek ?>/<?php echo $s->id_bq ?>/<?php echo $s->tipe_bq ?>" class="text-danger mr-1"><i class="fa fa-times"></i> </a>
                                                <?php echo $s->nama_bq_list ?>
                                            </td>
                                            <td class="text-right">
                                                    Rp <?php echo number_format($s->nominal_bq, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                <?php } } ?>
                            <?php } ?>
                    <?php }} ?>
                    <tr>
                        <td class="text-right bold bg-yellow">
                            Total BQ
                        </td>
                        <td class="text-right bold bg-yellow">
                            <h4>Rp <?php echo number_format($data->bq_proyek, 2, '.', '.')?></h4>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>


           



        </div>
    </div>
</div>
