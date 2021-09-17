<div class="modal fade fill-in" id="modal-detail" role="dialog" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <i class="pg-close"></i>
    </button>
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-left p-b-5"><span class="semi-bold">Data</span> Tender</h5>
            </div>
            <div class="modal-body">
                <div id="content-detail"></div>
                <div class="row p-t-10">
                    <div class="col-lg-12 sm-text-center">
                        <button type="button" class="btn btn-danger fs-15" data-dismiss="modal"><i
                                class="fa fa-times m-r-10"></i> Tutup
                        </button>
                        <a href="" id="link-detail" class="btn btn-primary">Buka Tender <i
                                class="fa fa-arrow-right m-l-10"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/plugins/canvasjs/jquery.canvasjs.min.js"></script>
<script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>

<script>
    $(function () {
        $(".select2").select2();
        $('.datep').datepicker({ format: 'dd-mm-yyyy' });

        $('.inputmask').inputmask("numeric", {
            radixPoint: "-",
            groupSeparator: ".",
            digits: 0,
            autoGroup: true,
            rightAlign: false
        });


        $("[rel='tooltip']").tooltip({
            html: true,
            container: 'body'
        });

        $("[name=retensi_proyek]").on('input', function () {
            var t1 = $("[name=selesai_proyek]").val(),
                t2 = $(this).val();

            if((t1 != '' || t1 != '00-00-0000') && (t2 != '' || t2 != 0)){
                $.ajax({
                    url: 'proyek/stlp1_tgl_retensi',
                    method: 'post',
                    data:{
                        tgl1 : t1,
                        tgl2 : t2
                    },
                    success: function (data) {
                        $("[name=u_tgl_retensi_proyek]").val(data);
                    }
                });
            }
        });

        $("[name=nilai_proyek]").on('input', function () {
            var nilai1 =  $(this).val(),
                nilai = nilai1.replace(/\./g, ''),

                // ppn = (nilai * 10)/ 100,

                in_ppn = nilai / 1.1,
                ppn = in_ppn * 10 / 100,

                // in_ppn = nilai - ppn,

                pph = in_ppn * 3 / 100,

                // pph = ((nilai - ppn) * 3)/ 100,
                // net = nilai - pph;
                net = in_ppn - pph;

            console.log(nilai);


            $("[name=ppn_proyek]").val(ppn);
            $("[name=in_ppn_proyek]").val(in_ppn);
            $("[name=pph_proyek]").val(pph);
            $("[name=net_proyek]").val(net);
        });


        $.validator.addMethod("cekNoSpk", function (value, element) {
            var isSuccess = false,
                id = '<?php echo $this->uri->segment(3); ?>';

            $.ajax({
                type: 'post',
                data: {no: value, id:id},
                url: "proyek/cek_no_spk/",
                async: false,
                success: function (data) {
                    isSuccess = data == 'true' ? true : false;
                }
            });

            return isSuccess;

        }, "No SPK sudah digunakan");

        $.validator.addMethod("cekNoDok", function (value, element) {
            var isSuccess = false,
                id = '<?php echo $this->uri->segment(3); ?>';

            $.ajax({
                type: 'post',
                data: {no: value, id:id},
                url: "proyek/cek_no_dok/",
                async: false,
                success: function (data) {
                    isSuccess = data == 'true' ? true : false;
                }
            });

            return isSuccess;

        }, "No Dokumen sudah digunakan");

        $.validator.addMethod("cekNo", function (value, element) {
            var isSuccess = false,
                id = '<?php echo $this->uri->segment(3); ?>';

            $.ajax({
                type: 'post',
                data: {no: value, id:id},
                url: "proyek/cek_no/",
                async: false,
                success: function (data) {
                    isSuccess = data == 'true' ? true : false;
                }
            });

            return isSuccess;

        }, "No Proyek sudah digunakan");

        $(".myform").validate({
            rules:{
                no_spk_proyek:{
                    cekNoSpk: true
                },
                no_dokumen_proyek:{
                    cekNoDok: true
                },
                no_proyek:{
                    cekNo: true
                },
                nama_proyek:{
                    required: true
                },
                klien_id_proyek:{
                    required: true
                },
                tgl_proyek:{
                    required: true
                },
                selesai_proyek:{
                    required: true
                },
                retensi_proyek: {
                    required: true
                },
                nilai_proyek:{
                    required: true
                }
            }
        });

        $.extend(jQuery.validator.messages, {
            required: "Tidak boleh kosong"
        });

    });

</script>