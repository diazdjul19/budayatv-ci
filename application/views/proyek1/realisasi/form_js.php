<script>
    $(function () {
        $('.datep').datepicker({
            format: 'dd-mm-yyyy'
        });

        $('.inputmask').inputmask("numeric", {
            radixPoint: "-",
            groupSeparator: ".",
            digits: 0,
            autoGroup: true,
            rightAlign: false
        });


        $(".edit").dblclick(function () {
            $(this).children("input").removeClass('hide');
            $(this).children("span").addClass('hide');
        });

        $(".edit--input").blur(function () {
            $.ajax({
                url:'realisasi/revisi',
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
                    url:'realisasi/revisi',
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
                    url:'realisasi/revisi',
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
    });
</script>