<div class="container-fluid container-fixed-lg">
    <div class="card card-default m-t-20">
        <div class="card-block">
            <div class="inner">
                <div class="row">
                    <div class="col">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="proyek">Proyek</a></li>
                            <li class="breadcrumb-item active">Detail STLP</li>
                        </ol>
                    </div>

                    <div class="col">
                        <a href="proyek" class="btn btn-primary pull-right"><i
                                class="fa fa-chevron-circle-left m-r-10"></i> Kembali</a>
                    </div>
                </div>

            </div>
            <?php if (isset($data)) { ?>
                <h3 class="text-uppercase"><?php echo $data->nama_proyek ?></h3>
            <?php } ?>
        </div>
    </div>
    <?php if (isset($data)) { ?>
        <ul class="nav nav-tabs nav-tabs-fillup" role="tablist" data-init-reponsive-tabs="dropdownfx">
            <li class="nav-item">
                <a class="<?php if ($headmenu == 'stlp') echo " active bold"; ?>" href="proyek/detail/<?php echo $data->id_proyek ?>">
                    <span> STLP</span></a>
            </li>
            <?php if($data->approval_proyek == 9){ ?>
                <li class="nav-item">
                    <a class="<?php if ($headmenu == 'uang_muka') echo " active "; ?>"  href="uang_muka/proyek/<?php echo $data->id_proyek ?>">
                        <span>Penarikan Uang Muka</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="<?php if ($headmenu == 'realisasi') echo " active "; ?>" href="realisasi/proyek/<?php echo $data->id_proyek ?>">
                        <span>Pertanggung Jawaban Uang Muka</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="<?php if ($headmenu == 'progress') echo " active "; ?>" href="progress/proyek/<?php echo $data->id_proyek ?>">
                        <span>Progres</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="<?php if ($headmenu == 'penagihan') echo " active "; ?>" href="penagihan/proyek/<?php echo $data->id_proyek ?>">
                        <span>Penagihan</span>
                    </a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a class="<?php if ($headmenu == 'rugi_laba') echo " active "; ?>" href="proyek/rugi_laba/<?php echo $data->id_proyek ?>">
                    <span> Laba Rugi</span></a>
            </li>
        </ul>
    <?php } ?>

    <div class="tab-content">
            <?php $this->load->view($subpage); ?>
    </div>
</div>