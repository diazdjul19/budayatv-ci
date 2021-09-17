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
<script>
    $(function () {
        $('.datep').datepicker({ format: 'dd-mm-yyyy' });


        $("[rel='tooltip']").tooltip({
            html: true,
            container: 'body'
        });

        $.validator.addMethod("cekNoSpk", function (value, element) {
            var isSuccess = false;

            $.ajax({
                type: 'post',
                data: {nama: value, id:''},
                url: "proyek/cek_no_spk/",
                async: false,
                success: function (data) {
                    isSuccess = data == 'true' ? true : false;
                }
            });

            return isSuccess;

        }, "No SPK sudah digunakan");

        $.validator.addMethod("cekNoDok", function (value, element) {
            var isSuccess = false;

            $.ajax({
                type: 'post',
                data: {nama: value, id:''},
                url: "proyek/cek_no_dok/",
                async: false,
                success: function (data) {
                    isSuccess = data == 'true' ? true : false;
                }
            });

            return isSuccess;

        }, "No Dokumen sudah digunakan");

        $.validator.addMethod("cekNo", function (value, element) {
            var isSuccess = false;

            $.ajax({
                type: 'post',
                data: {nama: value, id:''},
                url: "proyek/cek_no/",
                async: false,
                success: function (data) {
                    isSuccess = data == 'true' ? true : false;
                }
            });

            return isSuccess;

        }, "No Proyek sudah digunakan");

        // $(".myform").validate({
        //     rules:{
        //         no_spk_proyek:{
        //             cekNoSpk: true,
        //             required:true
        //         },
        //         no_dokumen_proyek:{
        //             cekNoDok: true,
        //             required:true
        //         },
        //         no_proyek:{
        //             cekNo: true,
        //             required:true
        //         },
        //         tgl_proyek:{
        //             required: true
        //         },
        //         selesai_proyek:{
        //             required: true
        //         }
        //     }
        // });

    });

</script>