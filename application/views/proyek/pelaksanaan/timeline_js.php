<script>
    $(function () {

        $(".usereq-deadline")
            .datepicker({format: 'dd-mm-yyyy'})
            .on('hide', function() {
                $.ajax({
                    url:'pelaksanaan/timeline_update',
                    method:"post",
                    data:{
                        val: $(this).val(),
                        tipe: 1,
                        id: $(this).data('id'),
                    },
                    success: function () {
                    }
                });
            });

        $(".usereq-implementasi")
            .datepicker({format: 'dd-mm-yyyy'})
            .on('hide', function() {
                $.ajax({
                    url:'pelaksanaan/timeline_update',
                    method:"post",
                    data:{
                        val: $(this).val(),
                        tipe: 2,
                        id: $(this).data('id'),
                    },
                    success: function () {
                    }
                });
            });

        $(".kontrak-deadline")
            .datepicker({format: 'dd-mm-yyyy'})
            .on('hide', function() {
                $.ajax({
                    url:'pelaksanaan/timeline_update',
                    method:"post",
                    data:{
                        val: $(this).val(),
                        tipe: 3,
                        id: $(this).data('id'),
                    },
                    success: function () {
                    }
                });
            });

        $(".kontrak-implementasi")
            .datepicker({format: 'dd-mm-yyyy'})
            .on('hide', function() {
                $.ajax({
                    url:'pelaksanaan/timeline_update',
                    method:"post",
                    data:{
                        val: $(this).val(),
                        tipe: 4,
                        id: $(this).data('id'),
                    },
                    success: function () {

                    }
                });
            });

    });

</script>