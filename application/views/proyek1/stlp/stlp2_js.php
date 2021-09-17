<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <iframe class="frame-pdf" src="<?php echo base_url()?>upload/bq/invoice_des_-_jan_20181.pdf" style="width:100%; height: 50vh; border:none" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="simpan btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/plugins/canvasjs/jquery.canvasjs.min.js"></script>
<script>
    $(function () {
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
                url:'proyek/stlp2_revisi',
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
                    url:'proyek/stlp2_revisi',
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

        $(".but-pdf").click(function (e) {
            e.preventDefault();

            var link = $(this).data('link');

            // $.ajax({
            //     url:'proyek/stlp2_revisi/'+link,
            //     success: function () {
            //         location.reload();
            //     }
            // });
            // $(".frame-pdf").attr('src', link);

            $("#myModal").modal('show');
        });
    });

</script>