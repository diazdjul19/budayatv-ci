<div class="row">
    <?php if (isset($data)) { ?>
        <ul class="list-inline mt-2 mb-5">
            <li class="list-inline-item">
                <a href="proyek/detail/<?php echo $data->id_proyek ?>"
                   class="btn btn-tag <?php if ($submenu == 'detail') echo " btn-tag-primary"; ?>  btn-tag-rounded">
                    <span>Detail</span>
                </a>
            </li>
            <?php if (cek_status_approval_proyek($data->id_proyek)) { ?>
                <li class="list-inline-item">
                    <a href="proyek/stlp1/<?php echo $data->id_proyek ?>"
                       class="btn btn-tag <?php if ($submenu == 'stlp1') echo " btn-tag-primary"; ?> btn-tag-rounded">
                        <span>STLP</span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="<?php if (isset($data)) echo "proyek/stlp2/$data->id_proyek"; else echo "proyek/stlp1/$data->id_proyek "; ?>"
                       class="btn btn-tag  <?php if ($submenu == 'stlp2') echo " btn-tag-primary"; ?>  btn-tag-rounded">
                        <span>BQ</span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="<?php if (isset($data)) echo "proyek/stlp3/$data->id_proyek"; else echo "proyek/stlp1/$data->id_proyek "; ?>"
                       class="btn btn-tag  <?php if ($submenu == 'stlp3') echo " btn-tag-primary"; ?>  btn-tag-rounded">
                        <span>Uang Muka</span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="<?php if (isset($data)) echo "proyek/stlp4/$data->id_proyek"; else echo "proyek/stlp1/$data->id_proyek "; ?>"
                       class="btn btn-tag  <?php if ($submenu == 'stlp4') echo " btn-tag-primary"; ?>  btn-tag-rounded">
                        <span>Penagihan</span>
                    </a>
                </li>
            <?php } else { ?>
                <?php if (has_permission('konfirmasi_proyek', 'view')) { ?>
                    <li class="list-inline-item">
                        <a href="proyek/konfirmasi/<?php echo $data->id_proyek ?>"
                           class="btn btn-tag  <?php if ($submenu == 'konfirmasi') echo " btn-tag-primary"; ?>  btn-tag-rounded">
                            <span>Konfirmasi Proyek</span>
                        </a>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
    <?php } ?>
</div>
<div class="row">

    <?php $this->load->view($hal); ?>

</div>
