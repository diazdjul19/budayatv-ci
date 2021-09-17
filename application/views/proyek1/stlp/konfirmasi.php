<div class="col">
    <table class="table">
        <thead>
        <tr>
            <th>Status</th>
            <th>Tanggal</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($list as $l){ ?>
        <tr>
            <td>
                <?php
                if($l->nilai_proyek_status == 0) {
                    echo "Proyek dibuat";
                }elseif($l->nilai_proyek_status == 1) {
                    echo "Menunggu Konfirmasi";
                }elseif($l->nilai_proyek_status == 2) {
                    echo "Revisi";
                }elseif($l->nilai_proyek_status == 3) {
                    echo "Konfirmasi Revisi";
                }else{
                    echo "Disetujui";
                }
                    ?>

            </td>
            <td><?php echo $l->ts_proyek_status ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<div class="col">
    <div class="pull-right">
        <?php if($data->approval_proyek == 1 || $data->approval_proyek == 3){ ?>
        <a href="proyek/set_revisi/<?php echo $data->id_proyek ?>" class="btn btn-danger"><i class="fa fa-times"></i> Revisi</a>
        <a href="proyek/set_setuju/<?php echo $data->id_proyek ?>" class="btn btn-primary"><i class="fa fa-check"></i> Setujui</a>
        <?php }elseif($data->approval_proyek == 9){?>
            <a href="proyek/set_revisi/<?php echo $data->id_proyek ?>" class="btn btn-danger"><i class="fa fa-times"></i> Revisi</a>
        <?php } ?>
    </div>
</div>