<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
        <div class="inner">
            <h2 class="clearfix"><span class="icon-thumbnail text-white pull-left">B</span>Bantuan</h2>
            <ul class="breadcrumb">
                <li>
                    <a href="dashboard">Dashboard</a>
                </li>
                <li>
                    <a href="bantuan">Bantuan</a>
                </li>
                <li>
                    <?php echo $judul; ?>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="post" action="" role="form" class="myform" autocomplete="off" novalidate>
                        <div class="row">
                            <?php if(isset($data)){ $val = $data->menu_id; }else{ $val = '';}?>
                            <div class="col-md-4">
                                <div class="form-group form-group-default required">
                                    <label>Modul</label>
                                    <select name="menu_id" class="form-control">
                                        <?php foreach($menu_list as $ml => $v){ ?>
                                            <option value="<?php echo $v?>" <?php if($v == $val){ echo " selected";}?>><?php echo $v; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php if(isset($data)){ $val = $data->nama_bantuan; }else{ $val = '';}?>
                                <div class="form-group required">
                                    <label>Nama</label>
                                    <input type="text" name="nama_bantuan" class="form-control" value="<?php echo $val;?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php if(isset($data)){ $val = $data->isi_bantuan; }else{ $val = '';}?>
                                <div class="form-group required">
                                    <label>bantuan</label>
                                    <textarea name="isi_bantuan" cols="30" rows="10" class="form-control summernote"><?php echo $val;?></textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> Simpan</button>
                        <a href="bantuan" class="btn btn-default"> Batal <i class="fa fa-times"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

