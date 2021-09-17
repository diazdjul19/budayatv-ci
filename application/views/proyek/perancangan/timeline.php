<div class="col">
    <div class="card card-default mt-4">
        <div class="card-block">
            <h3>Timeline</h3>
            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th class="text-center">Deadline</th>
                    <th class="text-center">Implementasi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Pengiriman UseReq</td>
                    <td>
                        <input type="text" class="form-control usereq-deadline" data-id="<?php echo $data->id_proyek ?>" value="<?php if($data->ud_proyek != "0000-00-00"){ echo tgl_indo($data->ud_proyek, 'angka', 9);} ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control usereq-implementasi" data-id="<?php echo $data->id_proyek ?>" value="<?php if($data->ui_proyek != "0000-00-00"){ echo tgl_indo($data->ui_proyek, 'angka', 9);} ?>">
                    </td>
                </tr>
                <tr>
                    <td>Kontrak </td>
                    <td>
                        <input type="text" class="form-control datep kontrak-deadline" data-id="<?php echo $data->id_proyek ?>" value="<?php if($data->kd_proyek != "0000-00-00"){ echo tgl_indo($data->kd_proyek, 'angka', 9);} ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control datep kontrak-implementasi" data-id="<?php echo $data->id_proyek ?>" value="<?php if($data->ki_proyek != "0000-00-00"){ echo tgl_indo($data->ki_proyek, 'angka', 9);} ?>">
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
