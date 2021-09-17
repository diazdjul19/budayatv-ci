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
    <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" role="tablist"
        data-init-reponsive-tabs="dropdownfx">

        <li class="nav-item">
            <a class="<?php if ($headmenu == 'stlp') echo " active "; ?> text-primary" href="proyek/detail/<?php echo $data->id_proyek ?>">
            <span> STLP</span></a>
        </li>
        <?php if($data->approval_proyek > 1){ ?>
            <li class="nav-item">
                <a href="uang_muka/<?php echo $data->id_proyek ?>">
                    <span>Penarikan Uang Muka</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php if ($data->tahap_proyek > 1) echo "proyek/stlp2/$data->id_proyek"; else echo "proyek/stlp1/$data->id_proyek "; ?>">
                    <span>Realisasi</span>
                </a>
            </li>
        <?php } ?>
        <li class="nav-item">
            <a class="" href="proyek/rugi_laba/<?php echo $data->id_proyek ?>">
                <span> Rugi/Laba</span></a>
        </li>
    </ul>
    <?php } ?>

    <div class="tab-content">
        <div class="row">
            <?php if (isset($data)) { ?>
            <ul class="list-inline mt-2 mb-5">
                <li class="list-inline-item">
                    <a href="proyek/detail/<?php echo $data->id_proyek ?>"  class="btn btn-tag <?php if ($submenu == 'detail') echo " btn-tag-primary"; ?>  btn-tag-rounded">
                        <span>Detail</span>
                    </a>
                </li>
                <?php if (isset($data)) { ?>
                    <li class="list-inline-item">
                        <a href="proyek/stlp1/<?php echo $data->id_proyek ?>" class="btn btn-tag <?php if ($submenu == 'stlp1') echo " btn-tag-primary"; ?> btn-tag-rounded">
                            <span>SPK</span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="<?php if (isset($data)) echo "proyek/stlp2/$data->id_proyek"; else echo "proyek/stlp1/$data->id_proyek "; ?>"  class="btn btn-tag  <?php if ($submenu == 'stlp2') echo " btn-tag-primary"; ?>  btn-tag-rounded">
                            <span>BQ</span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="<?php if (isset($data)) echo "proyek/stlp3/$data->id_proyek"; else echo "proyek/stlp1/$data->id_proyek "; ?>"  class="btn btn-tag  <?php if ($submenu == 'stlp3') echo " btn-tag-primary"; ?>  btn-tag-rounded">
                            <span>Uang Muka</span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="<?php if (isset($data)) echo "proyek/stlp4/$data->id_proyek"; else echo "proyek/stlp1/$data->id_proyek "; ?>" class="btn btn-tag  <?php if ($submenu == 'stlp4') echo " btn-tag-primary"; ?>  btn-tag-rounded">
                            <span>Penagihan</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <?php } ?>
        </div>
        <div class="row">

            <?php $this->load->view($hal); ?>

        </div>
    </div>
</div>