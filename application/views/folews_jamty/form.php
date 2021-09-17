<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="BtvJamty">Jam Tayang</a></li>
                <li class="breadcrumb-item active"><?php echo $judul; ?></li>
            </ol>
            <div class="row">
                <div class="col-xl-5 col-lg-6 ">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Jam Tayang</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
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

                        <div class="form-group ">
                            <label>HARI</label>
                            <div class="input-group">
                                
                                <select name="hari_int" class="selectpicker" data-live-search="true" data-size="5">
                                    <optgroup label="Data Hari Saat Ini">
                                        <?php if (isset($data)) {
                                            $value = $data->hari_int;
                                        } else {
                                            $value = '';
                                        }; ?>
                                        <option value="<?php echo $value ?>"><?php echo $value ?> ~ Relasi ~</option>
                                    </optgroup>  
                                    <optgroup label="Data Hari Baru">  
                                        <option value="1">Senin</option>
                                        <option value="2">Selasa</option>
                                        <option value="3">Rabu</option>
                                        <option value="4">Kamis</option>
                                        <option value="5">Jum'at</option>
                                        <option value="6">Sabtu</option>
                                        <option value="7">Minggu</option>
                                    </optgroup>                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label>TIMEZONE</label>
                            <div class="input-group">
                                <select name="id_timezone_rel" class="selectpicker" data-live-search="true" data-size="5">
                                    <optgroup label="Data Timezone Saat Ini">
                                        <?php if (isset($data)) {
                                            $value = $data->id_timezone_rel;
                                        } else {
                                            $value = '';
                                        }; ?>
                                        <option value="<?php echo $value ?>"><?php echo $value ?> ~ Relasi ~</option>
                                    </optgroup>  
                                    <optgroup label="Data Timezone Baru">  
                                        <option value="1">WIB ~ Sample Relation</option>
                                        <option value="2">WIT ~ Sample Relation</option>
                                        <option value="3">WITA ~ Sample Relation</option>
                                    </optgroup>  
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label>SET DAERAH</label>
                            <div class="input-group">
                                <select name="id_set_daerah_rel" class="selectpicker" data-live-search="true" data-size="5">
                                    <optgroup label="Data Daerah Saat Ini">
                                        <?php if (isset($data)) {
                                            $value = $data->id_set_daerah_rel;
                                        } else {
                                            $value = '';
                                        }; ?>
                                        <option value="<?php echo $value ?>"><?php echo $value ?> ~ Relasi ~</option>
                                    </optgroup>  
                                    <optgroup label="Data Daerah Baru">  
                                        <option value="1">Pancoran ~ Sample Relation</option>
                                        <option value="2">Bundaran HI ~ Sample Relation</option>
                                        <option value="3">Duren Tiga ~ Sample Relation</option>
                                    </optgroup>  
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group form-group-default">
                            <label>TIME, DARI ~ SAMPAI</label>
                            <div class="row">
                                <div class="col-6">
                                    <?php if (isset($data)) {
                                        $value = $data->dari_waktu;
                                    } else {
                                        $value = '';
                                    }; ?>
                                    <input type="time" name="dari_waktu" class="form-group-default" id='datepicker-timefrom' value="<?php echo $value ?>">
                                </div>
                                <div class="col-6">
                                    <?php if (isset($data)) {
                                        $value = $data->sampai_waktu;
                                    } else {
                                        $value = '';
                                    }; ?>
                                    <input type="time" name="sampai_waktu" class="form-group-default" id='datepicker-timeuntil' value="<?php echo $value ?>"> 
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group form-group-default">
                            <label>DATE, DARI ~ SAMPAI</label>
                            <div class="row">
                                <div class="col-6">
                                    <?php if (isset($data)) {
                                        $value = $data->dari_tanggal;
                                    } else {
                                        $value = '';
                                    }; ?>
                                    <input type="date" name="dari_tanggal" class="form-group-default" id='datepicker-datefrom' value="<?php echo $value ?>">
                                </div>
                                <div class="col-6">
                                    <?php if (isset($data)) {
                                        $value = $data->sampai_tanggal;
                                    } else {
                                        $value = '';
                                    }; ?>
                                    <input type="date" name="sampai_tanggal" class="form-group-default" id='datepicker-dateuntil' value="<?php echo $value ?>"> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label>PROGRAM ACARA</label>
                            <div class="input-group">
                                <select name="id_program_acara_rel" class="selectpicker" data-live-search="true" data-size="5">
                                    <optgroup label="Data Program Acara Saat Ini">
                                            <?php if (isset($data)) {
                                                $value = $data->id_program_acara_rel;
                                            } else {
                                                $value = '';
                                            }; ?>
                                            <option value="<?php echo $value ?>"><?php echo $value ?> ~ Relasi ~</option>
                                        </optgroup>  
                                        <optgroup label="Data Program Acara Baru">  
                                            <option value="1">Doraemon ~ Sample Relation</option>
                                            <option value="2">Ninja Hatori ~ Sample Relation</option>
                                            <option value="3">Detektif Konan ~ Sample Relation</option>
                                    </optgroup>                                    
                                </select>
                            </div>
                        </div>
                        
                        <br>
                        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Simpan</button>
                        <a href="BtvJamty" class="btn btn-default"> Batal <i class="fa fa-times"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
