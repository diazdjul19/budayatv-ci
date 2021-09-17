<div class="col">
    <div class="card card-default mt-4">
        <div class="card-block">
            <h3>Kontrak / SPK</h3>
            <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx">
                <?php
                $no = 1;
                if(count($spk)) {
                foreach ($spk as $sp){ ?>
                <li class="nav-item">
                    <a href="pelaksanaan/spk/<?php echo $data->id_proyek ?>/<?php echo $sp->id_spk ?>" class="<?php if(isset($s)) if($sp->id_spk == $s->id_spk) echo "active";?>">
                        <span>SPK <?php if($no > 1){ echo "Tambahan ";}?></span>
                    </a>
                </li>
                <?php
                $no++;
                } }?>
                <?php if(count($spk)){ ?>
                <li class="nav-item">
                    <a href="pelaksanaan/spk_baru/<?php echo $data->id_proyek ?>" class="<?php if(!isset($s)) echo "active";?>"><i class="fa fa-plus"></i></a>
                </li>
                <?php } ?>
            </ul>
            <div class="card card-default">
                <div class="card-block pl-0 pr-0">
                    <form class="mt-2 myform" action="" method="post">
                        <input type="hidden" name="id_spk" value="<?php if(isset($s)){ echo $s->id_spk; }?>">
                        <input type="hidden" name="tambah_spk" value="<?php echo $tambah_spk ?>">
                        <div class="row">
                            <div class="col">
                                <div class="form-group form-group-default m-0 required">
                                    <label for="">Nama kontrak</label>
                                    <input type="text" name="nama_spk" class="form-control " value="<?php if(isset($s)){ echo $s->nama_spk; }?>">
                                </div>
                                <div class="form-group form-group-default m-0">
                                    <label for="">Nama Rekanan</label>
                                    <input type="text" name="rekanan_spk" class="form-control" value="<?php if(isset($s)){ echo $s->rekanan_spk; } ?>">
                                </div>
                                <div class="form-group form-group-default m-0">
                                    <label for="">No. SP/SPK</label>
                                    <input type="text" name="no_spk" class="form-control" value="<?php if(isset($s)) { echo $s->no_spk; } ?>">
                                </div>
                                <div class="form-group form-group-default m-0">
                                    <label for="">Tanggal SP/SPK</label>
                                    <input type="text" name="tgl_spk" class="form-control datep" value="<?php if(isset($s)){ if($s->tgl_spk != '0000-00-00') if($s->tgl_spk != '1970-01-01') echo tgl_indo($s->tgl_spk, 'angka', 9); }?>">
                                </div>
                                <div class="form-group form-group-default m-0 required">
                                    <label for="">Nilai Pekerjaan</label>
                                    <input type="text" name="nilai_spk" class="form-control inputmask" value="<?php if(isset($s)) if($s->nilai_spk != '0') echo $s->nilai_spk; ?>">
                                </div>
                                <div class="form-group form-group-default m-0">
                                    <label for="">Bank Garansi Uang Muka</label>
                                    <input type="text" name="bg_uang_spk" class="form-control inputmask" value="<?php if(isset($s)) if($s->bg_uang_spk != '0') echo $s->bg_uang_spk; ?>">
                                </div>
                                <div class="form-group form-group-default m-0">
                                    <label for="">Jangka Waktu BG Uang Muka</label>
                                    <input type="text" name="bg_jwaktu_spk" class="form-control" value="<?php if(isset($s)) if($s->bg_jwaktu_spk != '0000-00-00') if($s->bg_jwaktu_spk != '1970-01-01') echo $s->bg_jwaktu_spk; ?>">
                                </div>
                                <div class="form-group form-group-default m-0">
                                    <label for="">Bank Garansi Pelaksanaan</label>
                                    <input type="text" name="bg_pelaksanaan_spk" class="form-control inputmask" value="<?php if(isset($s)) if($s->bg_pelaksanaan_spk != '0') echo $s->bg_pelaksanaan_spk; ?>">
                                </div>
                                <div class="form-group form-group-default m-0">
                                    <label for="">Jangka Waktu BG Pelaksanaan</label>
                                    <input type="text" name="bg_jwaktu_p_spk" class="form-control" value="<?php if(isset($s)) if($s->bg_jwaktu_p_spk != '0000-00-00') if($s->bg_jwaktu_p_spk != '1970-01-01') echo tgl_indo($s->bg_jwaktu_p_spk, 'angka', 9); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col pr-0">
                                <div class="form-group form-group-default m-0">
                                    <label for="">Jangka Waktu</label>
                                    <input type="text" name="mulai_spk" class="form-control datep" value="<?php if(isset($s)) if($s->mulai_spk != '0000-00-00') echo tgl_indo($s->mulai_spk, 'angka', 9); ?>">
                                </div>
                            </div>
                            <div class="col pl-0">
                                <div class="form-group form-group-default m-0">
                                    <label for="">&nbsp;</label>
                                    <input type="text" name="selesai_spk" class="form-control datep" value="<?php if(isset($s)) if($s->selesai_spk != '0000-00-00') echo tgl_indo($s->selesai_spk, 'angka', 9); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <?php if(isset($s)){ ?>
                                <a href="pelaksanaan/spk_hapus/<?php echo $data->id_proyek.'/'.$s->id_spk; ?>" class="btn btn-danger mt-3"><i class="fa fa-times mr-2"></i> Hapus</a>
                                <?php } ?>
                                <button type="submit" class="btn btn-primary pull-right mt-3"><i class="fa fa-check mr-2"></i> Simpan </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


</div>
