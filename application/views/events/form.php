<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="events">Event</a></li>
                <li class="breadcrumb-item active"><?php echo $judul; ?></li>
            </ol>
            <div class="row">
                <div class="col-xl-5 col-lg-6 ">
                    <div class="card card-transparent">
                        <div class="card-block">
                            <h3>Event</h3>
                            <p>Pencatatan event atau kegiatan yang terjadi.</p>
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
                            $value = $data->nama_event;
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('nama_event', 'Nama', $value, 'text', 'form-group-default required', 'required'); ?>

                        <div class="form-group form-group-default">
                            <label for="">Kategori Event</label>
                            <select name="kategori_event" class="form-control">
                                <?php foreach ($list_kategori as $lk){?>
                                <option value="<?php echo $lk->id_ke ?>"><?php echo $lk->nama_ke ?></option>
                                <?php }?>
                            </select>
                        </div>


                        <?php if (isset($data)) {
                            $value = tgl_indo($data->mulai_event, 'angka', 9);
                        } else {
                            $value = '';
                        }; ?>
                        <?php echo render_input('mulai_event', 'Tanggal', $value, 'text', 'form-group-default required', 'required datep'); ?>

                        <?php if (isset($data)) {
                            $value = $data->ket_event;
                        } else {
                            $value = '';
                        }; ?>
                        <div class="form-group form-group-default">
                            <label for="">Keterangan</label>
                            <textarea name="ket_event" class="form-control"><?php echo $value ?></textarea>

                        </div>
                        <br>
                        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Simpan</button>
                        <a href="events" class="btn btn-default"> Batal <i class="fa fa-times"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

