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

        $(".edit").dblclick(function () {
            $(this).children("input").removeClass('hide');
            $(this).children("span").addClass('hide');
        });

        $(".edit--input").blur(function () {
            $.ajax({
               url:'proyek/stlp4_revisi',
                method:"post",
                data:{
                    val: $(this).val(),
                    id: $(this).data('id'),
                    jenis: $(this).data('jenis')
                },
                success: function () {
                    location.reload();
                }
            });
        });

        $(".edit--input").keypress(function( event ) {
            if ( event.which == 13 ) {
                $.ajax({
                    url:'proyek/stlp4_revisi',
                    method:"post",
                    data:{
                        val: $(this).val(),
                        id: $(this).data('id'),
                        jenis: $(this).data('jenis')
                    },
                    success: function () {
                        location.reload();
                    }
                });
            }
        });

        $(".edit--date")
            .datepicker({format: 'dd-mm-yyyy'})
            .on('hide', function(e) {
                $.ajax({
                    url:'proyek/stlp4_revisi',
                    method:"post",
                    data:{
                        val: $(this).val(),
                        id: $(this).data('id'),
                        jenis: $(this).data('jenis')
                    },
                    success: function () {
                        location.reload();
                    }
                });
            });

        $(".myform").validate({
            rules:{
                nominal_uang_muka:{
                    required:true
                },
                tgl_uang_muka:{
                    required:true
                },
                jawab_uang_muka:{
                    required:true
                }

            }
        });

    });

</script>