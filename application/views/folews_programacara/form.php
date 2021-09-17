<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="proyek_tipe">Btv Program Acara</a></li>
                <li class="breadcrumb-item active"><?php echo $judul; ?></li>
            </ol>
            <div class="row">
                <div class="col-xl-5 col-lg-6 ">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Program Acara</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg">
    <div class="row">
        <div class="col-sm-7">
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title"><?php echo $judul; ?></div>
                </div>
                <div class="card-block">
                    <form method="post" action="" role="form" class="myform" autocomplete="off" novalidate>

                        <?php if (isset($data)) {
                            $value = $data->name_acara;
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('name_acara', 'Nama Acara', $value, 'text', 'form-group-default required', 'required'); ?>

                        <?php if (isset($data)) {
                            $value = $data->sinopsis_acara;
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('sinopsis_acara', 'Sinopsis Acara', $value, 'text', 'form-group-default'); ?>

                        <div class="form-group form-group-default">
                            <label>Cuplikan Video</label>
                            <div class="input-group">
                                <?php if (isset($data)) {
                                    $value = $data->cuplikan_video;
                                } else {
                                    $value = '';
                                }; ?>

                                <video width="100" height="70" controls style="border-radius:5%; margin:5px;">
                                    <source src="<?php echo $value ?>" type="video/mp4">
                                </video>
                                
                                <input type="file" name="cuplikan_video" id="" accept="video/mp4,video/x-m4v,video/*" class="pt-4 pb-4 pr-4">
                            </div>
                        </div>


                        <div class="form-group ">
                            <label>Kategori</label>
                            <div class="input-group">
                                <select name="id_kategori_rel" class="selectpicker" data-live-search="true" data-size="5">
                                    <optgroup label="Data Kategori Saat Ini">
                                        <?php if (isset($data)) {
                                            $value = $data->id_kategori_rel;
                                        } else {
                                            $value = '';
                                        }; ?>
                                        <option value="<?php echo $value ?>"><?php echo $value ?> ~ Relasi ~</option>
                                    </optgroup>  
                                    <optgroup label="Data Kategori Baru">  
                                        <option value="1">Budaya Masak ~ Sample Relation</option>
                                        <option value="2">Budaya Tari ~ Sample Relation</option>
                                        <option value="3">Budaya Makan ~ Sample Relation</option>
                                    </optgroup>  
                                    
                                </select>
                            </div>
                        </div>
                        

                        <br>
                        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Simpan</button>
                        <a href="BtvProgramacara" class="btn btn-default"> Batal <i class="fa fa-times"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

