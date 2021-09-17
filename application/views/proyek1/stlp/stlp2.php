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
                    <a href="proyek/stlp3/<?php echo $data->id_proyek ?>" class="btn btn-success pull-right"> Uang Muka
                        <i class="fa fa-chevron-right ml-2"></i></a>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th colspan="2" width="65%">Uraian</th>
                                <th width="35%">Harga</th>
                            </tr>
                            </thead>
                            <tbody>
                            <form method="post" action="" role="form" class="myform mt-2" autocomplete="off" novalidate>

                                <tr>
                                    <td class="bg-master-light">
                                        <input type="text" name="nama" class="form-control">
                                    </td>
                                    <td>
                                        <input type="hidden" name="ppn_bq_list" value="0">
                                        <input type="checkbox" value="1" name="ppn_bq_list" data-init-plugin="switchery" data-size="small" data-color="success"><span class="pl-2">PPn</span>
                                    </td>
                                    <td class="bg-master-light">
                                        <input type="text" name="harga" class="form-control inputmask">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="bg-master-light"></td>
                                    <td class="bg-master-light">
                                        <button class="btn btn-primary btn-block btn-xs" type="submit"><i
                                                    class="fa fa-check mr-2"></i> Tambah
                                        </button>
                                    </td>
                                </tr>
                            </form>
                            <?php if (!$bq_list) { ?>
                                <tr>
                                    <td colspan="3"> Belum ada data</td>
                                </tr>
                                <?php
                            } else {
                                foreach ($bq_list as $bl) {
                                    ?>
                                    <tr>
                                        <td colspan="2" class="<?php if ($bl->tipe_bq != 2) echo " bold text-uppercase " ?>">
                                            <a href="proyek/hapus_bq/<?php echo $data->id_proyek ?>/<?php echo $bl->id_bq ?>/<?php echo $bl->tipe_bq ?>"
                                               class="text-danger mr-1"><i class="fa fa-times"></i> </a>
                                            <span><?php echo $bl->nama_bq_list ?></span>
                                        </td>
                                        <td class="text-right edit">
                                            <?php if ($bl->tipe_bq != 1) { ?>
                                                <span>Rp <?php echo number_format($bl->nominal_bq, 0, ',', '.') ?></span>
                                                <input type="text" class="edit--input form-control inputmask hide"
                                                       data-id="<?php echo $bl->id_bq ?>" data-jenis="2"
                                                       value="<?php echo $bl->nominal_bq ?>">
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php if ($bl->tipe_bq == 1) { ?>
                                        <form method="post" action="" role="form" class="myform mt-2" autocomplete="off"
                                              novalidate>
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
                                                    <button class="btn btn-primary btn-block btn-xs" type="submit"><i
                                                                class="fa fa-check mr-2"></i> Tambah
                                                    </button>
                                                </td>
                                            </tr>
                                        </form>
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
                                <td colspan="2" class="text-right bold bg-yellow">
                                    Total BQ
                                </td>
                                <td class="text-right bold bg-yellow">
                                    <h4>Rp <?php echo number_format($data->bq_proyek, 0, '.', '.') ?></h4>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card card-default">
                        <div class="card-block">
                            <form action="proyek/stlp2_upload" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $data->id_proyek ?>">

                                <input type="file" name="file">
                                <select name="tipe" class="form-control mt-2">
                                    <option value="1">BQ Perencanaan</option>
                                    <option value="2">BQ Realisasi</option>
                                </select>

                                <button type="submit" class="btn btn-primary btn-block mt-2">Upload</button>
                            </form>
                        </div>
                    </div>

                    <?php if(count($bq_file_list)){ ?>
                    <div class="card card-default">
                        <div class="card-block">
                           <ul class="list-group">
                               <?php foreach($bq_file_list as $bf){ ?>
                               <li class="list-group-item">
                                   <a href="proyek/stlp2/<?php echo $bf->proyek_id_bq_file ?>" target="_blank" onclick="window.open('proyek/pdf/<?php echo $bf->id_bq_file ?>','name','height=550,width=650,top=0,left=0,status=no,addressbar=no,menubar=no,scrollbars=yes')"><?php echo $bf->nama_bq_file ?></a>
                                   <p>
                                       <?php
                                       if($bf->tipe_bq_file == 1){
                                        echo "BQ Perencanaan";
                                       }else{
                                           echo "BQ Realisasi";
                                       }?>
                                   </p>
                                   <a href="proyek/pdf_hapus/<?php echo $bf->id_bq_file ?>" class="btn btn-danger"><i class="fa fa-times"></i></a>
                               </li>
                               <?php } ?>
                           </ul>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>

        </div>
    </div>
</div>
